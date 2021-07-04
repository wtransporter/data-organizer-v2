<template>
    <div v-if="projects.length > 0">
        <li v-for="(project, index) in projects" :key="project.id">
            <div class="flex justify-between items-center space-x-2">
                <h5 class="text-xl font-semibold">{{ project.title }}</h5>
                <div class="flex">
                    <a :href="candidate.id+'/projects/'+project.id+'/edit'" class="text-blue-700 hover:text-blue-500 w-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                    </a>
                    <span @click="remove(index, project.id)" class="text-red-700 hover:text-red-500 w-4 ml-2 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </span>
                </div>
            </div>
            <label class="italic text-sm block mt-2 underline">
                Description
            </label>
            <p class="py-2">{{ project.description }}</p>
            <label class="italic text-sm block mt-2">
                Technologies used
            </label>
            <small v-for="technology in project.technologies" :key="technology.id" class="px-2 bg-blue-500 text-white rounded-full mr-2">
                {{ technology.title }}
            </small>
            <hr class="my-2">
        </li>
    </div>
    <span v-else class="italic text-red-600 text-sm">
        No experience yet
    </span>
</template>

<script>
export default {

    props: ['allprojects', 'candidate'],

    data() {
        return {
            projects: this.allprojects,
        }
    },

    methods: {
        remove(index, id) {
            axios.delete(this.candidate.id+'/projects/'+id);
            this.projects.splice(index, 1);
        }
    }

}
</script>

<style>

</style>