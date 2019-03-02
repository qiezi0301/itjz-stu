import VueRouter from 'vue-router';

let routes = [
    {
        path: '/',
        components: require('./components/pages/Home')
    },
    {
        path: '/series/:id',
        name: 'series',
        components: require('./components/lessons/Index')
    },
    {
        path: '/lessons/:id',
        name: 'lessons',
        components: require('./components/lessons/Lesson')
    },
    {
        path: '/lessons',
        name: 'lessons',
        components: require('./components/lessons/Lessons')
    },
    {
        path: '/learn',
        name: 'learn',
        components: require('./components/pages/learn')
    },
    {
        path: '/create',
        name: 'create',
        components: require('./components/pages/Create')
    },
    {
        path: '/register',
        name: 'register',
        components: require('./components/register/Register')
    },
    {
        path: '/confirm',
        name: 'confirm',
        components: require('./components/confirm/Email')
    },
    {
        path: '/login',
        name: 'login',
        components: require('./components/login/Login')
    },
    {
        path: '/chapters',
        name: 'chapters',
        components: require('./components/pages/Chapters')
    }
];

export default new VueRouter({
    mode: 'history',
    routes
})