import VueRouter from 'vue-router';

let routes = [
    {
        path: '/',
        components: require('./components/pages/Home')
    }
];

export default new VueRouter({
    mode: 'history',
    routes
})