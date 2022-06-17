/*require('./bootstrap');
import { useRouter, useRoute } from 'vue-router'
import router from './router'


import { createApp, h } from "vue";
import Hello from "./components/Hello.vue";

const app = createApp({
    
    components: {
        Hello,
    },
    render: () => h(Hello),
}).mount("#app");

*/

import {createApp} from 'vue'



import App from './App.vue';
import Vue from 'vue';
import axios from 'axios';
import router from './router';
import bootstrap from './bootstrap';




const app = createApp(App)
app.use(bootstrap)
app.config.globalProperties.$axios = axios;
app.use(router)
app.mount('#app')



