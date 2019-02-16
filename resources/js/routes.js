import VueRouter from 'vue-router';

let routes = [
    {
        path: '/',
        components: require('./components/Home')
    }
];

export default new VueRouter({
    mode: 'history',
    routes
})