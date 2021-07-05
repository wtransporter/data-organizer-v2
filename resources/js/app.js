import { createApp } from 'vue';
require('./bootstrap');
import BaseButton from './components/ui/BaseButton.vue';
import ModalDialog from './components/ui/ModalDialog.vue';

let app = createApp({});

app.component('base-button', BaseButton);
app.component('modal-dialog', ModalDialog);
app.component(
    'candidates',
    require('./components/candidate-resources/Candidates.vue').default
);
app.component('paginator', require('./components/ui/Paginator.vue').default);
app.component(
    'candidate',
    require('./components/candidate-resources/Candidate.vue').default
);
app.component(
    'technologies',
    require('./components/technology-resources/Technologies.vue').default
);
app.component(
    'technology',
    require('./components/technology-resources/Technology.vue').default
);
app.component(
    'new-technology',
    require('./components/technology-resources/NewTechnology.vue').default
);
app.component(
    'projects',
    require('./components/project-resources/Projects.vue').default
);
app.component(
    'project',
    require('./components/project-resources/Project.vue').default
);
app.component('tags', require('./components/tag-resources/Tags.vue').default);
app.component(
    'single-tag',
    require('./components/tag-resources/SingleTag.vue').default
);
app.component(
    'new-tag',
    require('./components/tag-resources/NewTag.vue').default
);
app.component('image-form', require('./components/ImageForm.vue').default);
app.component(
    'document-form',
    require('./components/DocumentForm.vue').default
);

app.mount('#app');
