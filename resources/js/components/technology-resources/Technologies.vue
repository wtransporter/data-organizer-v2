<template>
    <div class="bg-white p-4 rounded">
        <table class="table-auto">
            <thead>
                <tr>
                    <th class="px-4 py-2 border w-64">Title</th>
                    <th class="px-4 py-2 border">Action</th>
                </tr>
            </thead>
            <tbody>
                <technology v-for="(technology, index) in technologies" v-bind:key="technology.id" 
                    :technology="technology" @deleted="remove(index)"></technology>
            </tbody>
        </table>
    </div>
</template>

<script>

import Technology from './Technology.vue';

export default {
    components: { Technology },

    data() {
        return {
            technologies: [],
        }
    },

    created() {
        this.fetch();
    },

    methods: {
        fetch() {
            axios.get('technologies').then(this.refresh);
        },

        refresh({data}) {
            this.technologies = data;
        },

        remove(index) {
            this.technologies.splice(index, 1);
        }
    }
}
</script>