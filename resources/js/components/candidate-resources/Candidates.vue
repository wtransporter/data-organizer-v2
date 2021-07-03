<template>
    <div class="overflow-hidden grid md:grid-cols-3 lg:grid-cols-4 md:gap-2">
        <div v-bind:key="candidate.id" v-for="(candidate) in candidates" :candidate="candidate"
            class="p-4 sm:px-8 bg-white border-b border-gray-200 rounded">
            <div class="flex justify-between items-center">
                <h5 class="text-xl">
                    <a href="" class="text-blue-800 hover:underline">
                        {{ candidate.name }}
                    </a>
                </h5>
                <div class="flex justify-between items-center space-x-2">
                    <a href="" class="text-blue-700 hover:text-blue-500 w-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                    </a>
                    <a wire:click.prevent="delete({{ candidate.id }})" href="#" class="text-red-700 hover:text-red-500 w-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="mt-6 text-gray-500">
                <address>{{ candidate.address }}</address>
                <span>{{ candidate.phone }}</span>
            </div>
        </div>
    </div>
    <div class="mt-4">
        <paginator :dataSet="dataSet" @changed="fetch"></paginator>
    </div>
</template>

<script>
import Paginator from '../ui/Paginator.vue';
export default {

    components: { Paginator },

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
        }
    }
}
</script>