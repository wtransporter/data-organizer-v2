<template>
    <new-tag v-if="cancreate"
        :candidate_id="id"
        @tag-created="create">
    </new-tag>
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

    props: ['candidatetags', 'creating', 'candidate_id'],

    data() {
        return {
            tags: this.candidatetags,
            cancreate: false,
            id: this.candidate_id,
        }
    },

    created() {
        this.cancreate = this.creating;
    },

    methods: {
        remove(index) {
            this.tags.splice(index, 1);
        },

        create(data) {
            this.tags.push(data.data);
        }
    },
}
</script>