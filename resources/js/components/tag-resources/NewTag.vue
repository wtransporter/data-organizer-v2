<template>
    <div class="max-w-md">
        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center justify-items-start my-2">
            <input v-model="title" type="text" 
                id="title" name="title" placeholder="Title" class="border outline-none border-blue-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full mr-2 p-1"/>
            <div class="my-2 sm:my-0">
                <base-button @click.prevent="store">
                    Submit
                </base-button>
            </div>
        </div>
    </div>
</template>

<script>
export default {

    props: ['candidate_id'],

    data() {
        return {
            title: ''
        }
    },

    methods: {
        store() {
            let newTag = { 
                candidate_id: this.candidate_id,
                title: this.title 
            };

            axios.post('/tags', newTag)
            .then(this.refresh)
            .catch(error => {
                flash(error.response.data.errors.title[0]);
            });

            this.title = '';
        },

        refresh({data}) {
            this.$emit('tag-created', data);
        }
    }
}
</script>