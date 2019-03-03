import VueRouter from 'vue-router';
import Store from './store/index';
import jwtToken from './helpers/jwt';

let routes = [
    {
        path: '/',
        name: 'home',
        components: require('./components/pages/Home'),
        meta:{}
    },
    {
        path: '/series/:id',
        name: 'series',
        components: require('./components/lessons/Index'),
        meta:{}
    },
    {
        path: '/lessons/:id',
        name: 'lessons',
        components: require('./components/lessons/Lesson'),
        meta:{}
    },
    {
        path: '/learn',
        name: 'learn',
        components: require('./components/pages/learn'),
        meta:{}
    },
    {
        path: '/create',
        name: 'create',
        components: require('./components/pages/Create'),
        meta:{}
    },
    {
        path: '/register',
        name: 'register',
        components: require('./components/register/Register'),
        meta:{requiresGuest: true}
    },
    {
        path: '/confirm',
        name: 'confirm',
        components: require('./components/confirm/Email'),
        meta:{}
    },
    {
        path: '/login',
        name: 'login',
        components: require('./components/login/Login'),
        meta:{requiresGuest: true}
    },
    {
        path: '/chapters',
        name: 'chapters',
        components: require('./components/pages/Chapters'),
        meta:{}
    },
    {
        path: '/profile',
        name: 'profile',
        components: require('./components/user/Profile'),
        meta:{requiresAuth: true}
    }
];

const router = new VueRouter({
    mode: 'history',
    routes
});

router.beforeEach((to, from, next) => {
    if (to.meta.requiresAuth) {
        if (Store.getters.get_authenticated || jwtToken.getToken()) {
            return next();
        } else {
            return next({'name': 'login'});
        }
    }
    if (to.meta.requiresGuest) {
        if (Store.getters.get_authenticated || jwtToken.getToken()) {
            return next({'name': 'home'});
        } else {
            return next();
        }
    }
    next();
});

export default router