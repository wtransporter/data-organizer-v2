<template>
    <div class="mb-4">
        <span v-if="message" class="italic text-sm text-green-700">
            {{ message }}
        </span>
        <form @submit.prevent action="POST" enctype="multipart/form-data">
            <div>
                <img v-if="avatar" :src="avatar ?? '/img/no-image.png'" class="w-32">
                <img v-else :src="candidate.avatar" alt="Avatar"
                    class="w-56">
            </div>

            <input class="w-full py-2 text-gray-700 focus:outline-none focus:shadow-outline" 
                id="avatar" name="avatar" type="file" accept="image/*" @change="onChange">
        </form>
    </div>
</template>

<script>
    export default {
        props: ['candidate'],

        data() {
            return {
                avatar: '',
                message: ''
            };
        },

        methods: {
            onChange(e) {
                if (! e.target.files.length > 0) return;

                let file = e.target.files[0];

                let reader = new FileReader();

                reader.readAsDataURL(file);
                
                reader.onload = e => {
                    this.avatar = e.target.result;
                };

                this.persist(file);
            },

            persist(file) {
                
                let data = new FormData();

                data.append('avatar', file);

                axios.post(`/candidates/${this.candidate.id}/avatar`, data).then(() => {
                    this.message = 'Image uploaded';
                });
            }
        }
    }
</script>
