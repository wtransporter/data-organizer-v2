<template>
    <modal-dialog v-if="confirmDelete" title="Confirm ?" @close="cancelAction">
        <template #default>
            Are you sure you want to delete this item ?
        </template>
        <template #actions>
            <base-button @click="confirmAction" class="bg-red-500 hover:bg-red-800">Delete</base-button>
            <base-button @click="cancelAction">Cancel</base-button>
        </template>
    </modal-dialog>
    <modal-dialog v-if="confirmEdit" title="Update technology" @close="cancelAction">
        <template #default>
            <input v-model="updatedTitle" type="text" 
            id="title" name="title" placeholder="Title" class="border outline-none border-blue-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full mr-2 p-1"/>
        </template>
        <template #actions>
        <base-button @click="confirmEditing" class="bg-blue-500 hover:bg-blue-800">Submit</base-button>
        <base-button @click="cancelEditing">Cancel</base-button>
        </template>
    </modal-dialog>
    <tr>
        <td class="border px-4 py-2" v-text="title"></td>
        <td class="border px-4 py-2">
            <div class="flex items-center">
                <div class="w-4 mr-2">
                    <span @click="canEdit" class="text-blue-700 hover:text-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                    </span>
                </div>
                <div class="w-4">
                    <span @click="canDelete" class="text-red-700 hover:text-red-500 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </span>
                </div>
            </div>
        </td>
    </tr>
</template>

<script>
export default {
    props: ['technology'],

    emits: ['deleted'],

    data() {
        return {
            title: this.technology.title,
            confirmDelete: false,
            confirmEdit: false,
            updatedTitle: ''
        }
    },

    methods: {
        destroy() {
            axios.delete('/technologies/' + this.technology.id);

            this.$emit('deleted');
        },

        canDelete() {
            this.confirmDelete = true;
        },

        canEdit() {
            this.updatedTitle = this.title;
            this.confirmEdit = true;
        },

        confirmEditing() {
            axios.post('/technologies/' + this.technology.id, {
                title: this.updatedTitle,
                _method: 'patch'
            }).then(this.setData);
        },

        setData() {
            this.title = this.updatedTitle;
            this.confirmEdit = false;
        },

        confirmAction() {
            this.confirmDelete = false;
            this.destroy();
        },

        cancelAction() {
            this.confirmDelete = false;
        },
        
        cancelEditing() {
            this.confirmEdit = false;
        }
    }
}
</script>