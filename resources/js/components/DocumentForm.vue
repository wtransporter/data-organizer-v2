<template>
    <div class="flex flex-col md:flex-row justify-between">
        <div class="mb-4">
            <span v-if="current" class="text-sm italic text-red-600">
                <a :href="'/storage/' + current" class="cursor-pointer text-blue-600 hover:underline">
                    Get document
                </a>
            </span>
            <span v-else class="text-sm italic text-red-600">No attachments yet</span>
        </div>
        <div class="mb-4">
            <span v-if="message" class="italic text-sm text-green-700">
                {{ message }}
            </span>
            <span class="block text-gray-700">
                Upload document
            </span>
            <form @submit.prevent action="POST" enctype="multipart/form-data">
                <input class="w-full py-2 text-gray-700 focus:outline-none focus:shadow-outline" 
                    id="document" name="document" type="file" accept="application/msword, application/vnd.ms-excel, text/plain, application/pdf" @change="onChange">
            </form>
        </div>
    </div>


</template>

<script>
    export default {
        props: ['candidate'],

        data() {
            return {
                document: '',
                message: '',
                current: this.candidate.document
            };
        },

        methods: {
            onChange(e) {
                if (! e.target.files.length > 0) return;

                let file = e.target.files[0];

                let reader = new FileReader();

                reader.readAsDataURL(file);
                
                reader.onload = e => {
                    this.document = e.target.result;
                };

                this.persist(file);
            },

            persist(file) {
                
                let formData = new FormData();

                formData.append('document', file);

                var then = this;

                axios.post(`/candidates/${this.candidate.id}/document`, formData, {
                        headers:{
                            'Content-Type':'application/json'
                        }
                    })
                .then((response) => {
                    then.current = response.data.document;
                    then.message = "Document uploaded";
                    flash(this.message);
                });
            },
        }
    }
</script>
