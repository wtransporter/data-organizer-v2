<template>
    <div v-if="tags.length > 0" class="flex flex-wrap">
        <single-tag v-for="(tag, index) in tags" 
            :key="tag.id"
            :id="tag.id"
            :title="tag.title"
            @deleted="remove(index)">
        </single-tag>
    </div>
    <span v-else class="text-sm text-blue-800 italic">
        No tags yet
    </span>
</template>

<script>
export default {

    props: ['candidatetags'],

    data() {
        return {
            tags: this.candidatetags,
        }
    },

    methods: {
        remove(index) {
            this.tags.splice(index, 1);
        }
    }
}
</script>