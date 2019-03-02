<template>
    <div>
        <div id="form" class="login">
            <register-form></register-form>
        </div>
        <div id="context-switch">
            <div class="t-pico">
                已经拥有帐户？</div>
            <div class="switch">
                <router-link to="/login">登录</router-link>
            </div>
        </div>
    </div>
</template>

<script>
    import RegisterForm from './RegisterForm'
    export default {
        name: "Register",
        components:{
            RegisterForm
        }
    }
</script>