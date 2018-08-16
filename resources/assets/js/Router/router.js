import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Parallex from '../components/Parallex';
import Login from '../components/login/Login';
import Logout from '../components/login/Logout';
import SignUp from '../components/signup/SignUp';
import Forum from '../components/forum/Forum';
import Read from '../components/forum/Read';
import Create from '../components/forum/Create';
import CreateCategory from '../components/category/CreateCategory';

const routes = [
    { path: '/', component: Parallex },
    { path: '/login', component: Login },
    { path: '/logout', component: Logout },
    { path: '/signup', component: SignUp },

    { path: '/category', component: CreateCategory },
    
    { path: '/forum', component: Forum, name:'forum'},
    { path: '/ask', component: Create },
    { path: '/question/:slug', component: Read, name:'read'},
];

const router = new VueRouter({
    routes, // `routes: routes` の短縮表記
    hashbang: false, // urlの#を消す
    mode: 'history'
});

export default router;
