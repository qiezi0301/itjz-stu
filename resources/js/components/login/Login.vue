<template>
    <div>
        <div id="form" class="login">
            <login-form></login-form>
        </div>
        <div id="context-switch">
            <div class="t-pico">
                没有帐户？</div>
            <div class="switch">
                <router-link to="/register">马上注册</router-link>
            </div>
        </div>
    </div>
</template>

<script>
    import LoginForm from './LoginForm';
    export default {
        name: "Login",
        components:{
            LoginForm
        }
    }
</script>

<style scoped>

</style>