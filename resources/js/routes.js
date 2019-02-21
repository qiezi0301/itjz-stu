import VueRouter from 'vue-router';

let routes = [
    {
        path: '/',
        components: require('./components/pages/Home')
    },
    {
        path: '/series/:id',
        name: 'series',
        components: require('./components/pages/Serie')
    },
    {
        path: '/lessons/:id',
        name: 'lessons',
        components: require('./components/pages/Lesson')
    }
];

export default new VueRouter({
    mode: 'history',
    routes
})