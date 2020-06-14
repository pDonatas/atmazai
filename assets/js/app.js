import Vue from 'vue';
import VueRouter from "vue-router";

Vue.use(VueRouter)

import App from '../components/App';

const router = new VueRouter({
    mode: 'history',
    router: [
        {
            path: '/',
            name: 'home',
            component: App
        }
    ]
})

new Vue({
    router,
    render: h => h(App)
}).$mount('#app');