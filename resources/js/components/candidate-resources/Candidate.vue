<template>
    <div class="p-4 sm:px-8 bg-white border-b border-gray-200 rounded">
        <div class="flex justify-between items-center">
            <h5 class="text-xl">
                <a :href="'candidates/'+candidate.id" class="text-blue-800 hover:underline" v-text="name"></a>
            </h5>
            <div class="flex justify-between items-center space-x-2">
                <a :href="'candidates/'+candidate.id+'/edit'" class="text-blue-700 hover:text-blue-500 w-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                    </svg>
                </a>
                <a @click.prevent="destroy" href="#" class="text-red-700 hover:text-red-500 w-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </a>
            </div>
        </div>
        <div class="mt-6 text-gray-500">
            <address v-text="address"></address>
            <span v-text="phone"></span>
        </div>
        <div class="mt-2 text-gray-500">
            <small v-for="(technology) in candidate.technologies" v-bind:key="technology.id"
                class="px-2 bg-blue-500 text-white rounded-full mr-2">
                {{ technology.title }}
            </small>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        candidate: Object
    },

    data() {
        return {
            name: this.candidate.name,
            address: this.candidate.address,
            phone: this.candidate.phone
        }
    },

    methods: {
        destroy() {
            axios.delete('/candidates/' + this.candidate.id);

            this.$emit('deleted');
        }
    }
}
</script>