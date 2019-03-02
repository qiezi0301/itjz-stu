<template>
    <form method="post" @submit.prevent="login">
        <input type="hidden" name="_token" value="kSJVZLKYLJQ1JfqjYQIZwCohYOy0kYzJiqMdpI5d">
        <div class="form-group">
            <label for="email" class="control-label">邮箱:</label>
            <input v-model="email" id="email" name="email" type="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="password" class="control-label">密码:</label>
            <input v-model="password" id="password" name="password" type="password" class="form-control">
        </div>
        <div class="form-group buttons">
            <button type="submit" class="btn btn-primary btnBlack" style="font-weight: bold;">
                马 上 登 录
            </button>
            <a href="/password/reset" class="text-muted">忘 记 密 码?</a>
        </div>
    </form>
</template>

<script>
    import JWTToken from './../../helpers/jwt';
    export default {
        name: "LoginForm",
        data() {
            return {
                email: '',
                password: ''
            }
        },
        methods: {
            login() {
                let formData = {
                    client_id: '2',
                    client_secret: '3iQT5O3qV2SxhlbKLF0c2FuBGs6KMxjMue2pWDAX',
                    grant_type: 'password',
                    scope: '',
                    username: this.email,
                    password: this.password
                };
                axios.post('/oauth/token', formData).then(response => {
                    //将access_token保存到localStorage中
                    JWTToken.setToken(response.data.access_token);
                    console.log(response.data);
                });
            }
        }
    }
</script>