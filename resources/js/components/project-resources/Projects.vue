<template>
    <div v-if="projects.length > 0">
        <project v-for="(project, index) in projects" 
            :key="project.id"
            :id="project.id"
            :title="project.title"
            :description="project.description"
            :technologies="project.technologies"
            :candidate_id="candidate.id"
            @deleted="remove(index)">
        </project>
    </div>
    <span v-else class="italic text-red-600 text-sm">
        No experience yet
    </span>
</template>

<script>

import Project from './Project.vue';

export default {
    components: { Project },

    props: ['allprojects', 'candidate'],

    data() {
        return {
            projects: this.allprojects,
        }
    },

    methods: {
        remove(index) {
            this.projects.splice(index, 1);
        }
    }

}
</script>