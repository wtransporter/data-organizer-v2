<template>
    <form @submit.prevent method="POST" class="flex items-center my-2">
        <input v-model="search" class="border outline-none border-blue-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm max-w-2xl mr-2 p-1" 
            id="search" name="search" type="text">
    <base-button @click="filter" class="mr-2">Search</base-button>
    <base-button @click="fetch">Reset</base-button>
    </form>
    <div class="overflow-hidden grid md:grid-cols-3 lg:grid-cols-4 md:gap-2">
        <candidate v-bind:key="candidate.id" v-for="(candidate, index) in candidates" 
            :candidate="candidate" @deleted="remove(index)"></candidate>
    </div>
    <div class="mt-4">
        <paginator :dataSet="dataSet" @changed="fetch"></paginator>
    </div>
</template>

<script>
import BaseButton from '../ui/BaseButton.vue';

import Paginator from '../ui/Paginator.vue';
import Candidate from './Candidate.vue';

export default {

    components: { Paginator, Candidate, BaseButton },

    data() {
        return {
            candidates: [],
            dataSet: false,
            search: ''
        }
    },

    created() {
        this.fetch()
    },

    methods: {
        fetch(page) {
            axios.get(this.url(page)).then(this.refresh);
        },

        url(page) {
            if (! page) {
                let query = location.search.match(/page=(\d+)/);

                page =  query ? query[1] : 1;
            }

            return `${location.pathname}?page=`+page;
        },

        refresh({data}) {
            this.dataSet = data;
            this.candidates = data.data;
            this.search = '';
        },

        remove(index) {
            this.candidates.splice(index, 1);
        },

        filter() {
            axios.post('candidates/filter', { search: this.search }).then(this.refresh);
        }
    }
}
</script>