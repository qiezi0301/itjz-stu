<template>
    <div class="page">
        <navbar></navbar>
        <!--<top-menu></top-menu>-->
        <notification></notification>
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
    import Notification from './common/Notification'
    import jwtToken from './../helpers/jwt';
    export default {
        name: "App",
        created() {
            if (jwtToken.getToken()) {
                this.$store.dispatch('setAuthUser');
            }
        },
        components:{
            TopMenu,
            Navbar,
            Foot,
            Notification
        }
    }
</script>