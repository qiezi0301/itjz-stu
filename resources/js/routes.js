import VueRouter from 'vue-router';
import beforeEach from './beforeEach'

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
        meta:{requiresAuth: true}
    },
    {
        path: '/learn',
        name: 'learn',
        components: require('./components/pages/learn'),
        meta:{}
    },
    {
        path: '/createSeries',
        name: 'createSeries',
        components: require('./components/pages/CreateSeries'),
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
        components: require('./components/user/ProfileWrapper'),
        children: [
            {
                path: '',
                name: 'profile',
                components: require('./components/user/Profile'),
                meta: {requiresAuth: true}
            },
            {
                path: '/edit-profile',
                name: 'profile.editProfile',
                components: require('./components/user/EditProfile'),
                meta: {requiresAuth: true}
            },
            {
                path: '/edit-password',
                name: 'profile.editPassword',
                components: require('./components/password/EditPassword'),
                meta: {requiresAuth: true}
            }
        ],
        meta:{requiresAuth: true}
    }
];

const router = new VueRouter({
    mode: 'history',
    routes
});

router.beforeEach(beforeEach);

export default router