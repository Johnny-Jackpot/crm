import './bootstrap';
import { createApp } from 'vue';
import Dashboard from './components/Dashboard.vue';

createApp({})
    .component('Dashboard', Dashboard)
    .mount('#app')
