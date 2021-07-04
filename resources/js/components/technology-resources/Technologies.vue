<template>
    <div class="bg-white p-4 rounded">
        <new-technology @created="create"></new-technology>
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
import NewTechnology from './NewTechnology.vue';
import Technology from './Technology.vue';

export default {
    components: { Technology, NewTechnology },

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
            axios.get('v1/technologies').then(this.refresh);
        },

        refresh({data}) {
            this.technologies = data;
        },

        remove(index) {
            this.technologies.splice(index, 1);
        },

        create(data) {
            this.technologies.push(data.data);
        }
    }
}
</script>