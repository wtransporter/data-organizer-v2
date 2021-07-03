import { createApp } from 'vue';
require('./bootstrap');

let app = createApp({});

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

app.mount('#app');
