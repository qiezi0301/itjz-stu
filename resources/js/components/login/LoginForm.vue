<template>
    <form method="post" @submit.prevent="login" novalidate="novalidate">
        <div class="form-group" :class="{'has-error': errors.has('email')}">
            <label for="email" class="control-label">邮箱:</label>
            <input v-model="email"
                   v-validate="'required|email'"
                   data-vv-as="邮箱"
                   required="required"
                   id="email" name="email" type="email" class="form-control">
            <span class="help-block">{{ errors.first('email') }}</span>
        </div>
        <div class="form-group" :class="{'has-error': errors.has('password')}">
            <label for="password" class="control-label">密码:</label>
            <input v-model="password"
                   v-validate="'required|min:6'"
                   data-vv-as="密码"
                   required="required"
                   id="password" name="password" type="password" class="form-control">
            <span class="help-block">{{ errors.first('password') }}</span>
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
    import jwtToken from './../../helpers/jwt';
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
                //验证是否提交空表单
                this.$validator.validateAll().then(result => {
                    if (result) {
                        let formData = {
                            email: this.email,
                            password: this.password
                        };
                        this.$store.dispatch('loginRequest', formData).then(response =>{
                            this.$router.push({name: 'profile'});
                        });
                    }else {
                        alert('表单不能为空');
                    }
                });

            }
        }
    }
</script>