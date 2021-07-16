<template>
    <li>
        <modal-dialog v-if="confirmDelete" title="Confirm ?" @close="cancelAction">
            <template #default>
                Are you sure you want to delete this item ?
            </template>
            <template #actions>
                <base-button @click="confirmAction" class="bg-red-500 hover:bg-red-800">Delete</base-button>
                <base-button @click="cancelAction">Cancel</base-button>
            </template>
        </modal-dialog>
        <div class="flex justify-between items-center space-x-2">
            <h5 class="text-xl font-semibold">{{ title }}</h5>
            <div class="flex">
                <a :href="candidate_id+'/projects/'+id+'/edit'" class="text-blue-700 hover:text-blue-500 w-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                    </svg>
                </a>
                <span @click="canDelete" class="text-red-700 hover:text-red-500 w-4 ml-2 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </span>
            </div>
        </div>
        <label class="italic text-sm block mt-2 underline">
            Description
        </label>
        <p class="py-2">{{ description }}</p>
        <label class="italic text-sm block mt-2">
            Technologies used
        </label>
        <small v-for="technology in technologies" :key="technology.id" class="px-2 bg-blue-500 text-white rounded-full mr-2">
            {{ technology.title }}
        </small>
        <hr class="my-2">
    </li>
</template>

<script>
export default {

    props: {
        id: Number,
        title: String,
        description: String,
        technologies: Object,
        candidate_id: Number
    },
    emits: ['deleted'],

    data() {
        return {
            confirmDelete: false
        }
    },

    methods: {
        destroy() {
            axios.delete(this.candidate_id+'/projects/'+this.id);
            this.$emit('deleted');
        },

        canDelete() {
            this.confirmDelete = true;
        },

        confirmAction() {
            this.destroy();
            this.confirmDelete = false;
        },

        cancelAction() {
            this.confirmDelete= false;
        }
    }
}
</script>