<template>
    <div class="overflow-hidden grid md:grid-cols-3 lg:grid-cols-4 md:gap-2">
        <candidate v-bind:key="candidate.id" v-for="(candidate, index) in candidates" 
            :candidate="candidate" @deleted="remove(index)"></candidate>
    </div>
    <div class="mt-4">
        <paginator :dataSet="dataSet" @changed="fetch"></paginator>
    </div>
</template>

<script>

import Paginator from '../ui/Paginator.vue';
import Candidate from './Candidate.vue';

export default {

    components: { Paginator, Candidate },

    data() {
        return {
            candidates: [],
            dataSet: false,
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
        },

        remove(index) {
            this.candidates.splice(index, 1);
        }
    }
}
</script>