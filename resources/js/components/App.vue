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
    export default {
        name: "App",
        components:{
            TopMenu,
            Navbar,
            Foot
        }
    }
</script>