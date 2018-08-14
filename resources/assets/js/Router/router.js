import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);


const routes = [
    { path: '/login', component: Login }
];


const router = new VueRouter({
    routes // `routes: routes` の短縮表記
});

export default router;
