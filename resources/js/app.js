import { createApp } from 'vue';
import app from './App.vue';
import store from './store';

createApp(app)
.use(store)
.mount('#app');
