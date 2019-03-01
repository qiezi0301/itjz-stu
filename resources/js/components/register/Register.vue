<template>
    <div>
        <div id="form" class="login">
            <register-form></register-form>
        </div>
        <div id="context-switch">
            <div class="t-pico">
                已经拥有帐户？</div>
            <div class="switch">
                <a id="switch-link" href="/user/login?redirect_url=https://www.codecasts.com">登录</a>
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