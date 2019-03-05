<template>
    <div class="page">
        <navbar></navbar>
        <top-menu></top-menu>
        <transition name="fade" mode="out-in">
            <router-view></router-view>
        </transition>
        <foot></foot>
    </div>
</template>

<script>
    import TopMenu from './common/TopMenu';
    import Navbar from './common/Navbar';
    import Foot from './common/Footer'
    import jwtToken from './../helpers/jwt';
    import Cookie from 'js-cookie';
    export default {
        name: "App",
        created() {
            if (jwtToken.getToken()) {
                this.$store.dispatch('setAuthUser');
            }else if (Cookie.get('auth_id')) {
                this.$store.dispatch('refreshToken');
            }
        },
        components:{
            TopMenu,
            Navbar,
            Foot
        }
    }
</script>