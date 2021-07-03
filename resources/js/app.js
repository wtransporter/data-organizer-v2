import { createApp } from 'vue';
require('./bootstrap');
import BaseButton from './components/ui/BaseButton.vue';

let app = createApp({});

app.component('base-button', BaseButton);
app.component(
    'example-component',
    require('./components/ExampleComponent.vue').default
);
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

app.mount('#app');
