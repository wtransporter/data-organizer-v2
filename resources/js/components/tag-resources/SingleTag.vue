<template>
    <span class="bg-blue-400 px-2 text-white text-sm rounded-md my-2 mr-1">
        {{ title }}
        <span @click="destroy" class="ml-1 text-blue-700 hover:text-white cursor-pointer">x</span>
    </span>
</template>

<script>
export default {

    props: {
        title: String,
        id: Number
    },

    emits: ['deleted'],

    methods: {
        destroy() {
            axios.delete('/tags/'+this.id);
            this.$emit('deleted');
        }
    }
}
</script>