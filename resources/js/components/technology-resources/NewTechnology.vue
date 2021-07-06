<template>
    <div class="max-w-md">
        <h5 class="text-xl font-semibold px-1">
            Insert new technology
        </h5>
        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center justify-items-start my-2">
            <input v-model="title" type="text" 
                id="title" name="title" placeholder="Title" class="border outline-none border-blue-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full mr-2 p-1"/>
            <div class="my-2 sm:my-0">
                <base-button @click="store">
                    Submit
                </base-button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            title: ''
        }
    },

    methods: {
        store() {
            axios.post('/technologies', { title: this.title })
            .then(this.refresh)
            .catch(error => {
                flash(error.response.data.errors.title[0]);
            });

            this.title = '';
        },

        refresh({data}) {
            this.$emit('created', data);
            flash(data.message);
        }
    }
}
</script>