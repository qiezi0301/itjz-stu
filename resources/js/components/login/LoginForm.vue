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
        <div class="form-group" :class="{'has-error': errors.has('password') || bag.has('password')}">
            <label for="password" class="control-label">密码:</label>
            <input v-model="password"
                   v-validate="'required|min:6'"
                   data-vv-as="密码"
                   required="required"
                   id="password" name="password" type="password" class="form-control">
            <span class="help-block">{{ errors.first('password') }}</span>
            <span class="help-block" v-if="mismatchError">{{ bag.first('password') }}</span>
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
    import { ErrorBag } from 'vee-validate';
    export default {
        name: "LoginForm",
        data() {
            return {
                email: '',
                password: '',
                bag : new ErrorBag()
            }
        },
        computed: {
            mismatchError(){
                //当两个条件都满足时执行
                return this.bag.has('password') && !this.errors.has('password')
            }
        },
        watch: {
            //检查重新输入时清除`邮箱和密码不相符`的提示
            password() {
                if (this.bag.has('password')) {
                    this.bag.remove('password');
                }
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
                        }).catch(error =>{
                            //处理登录密码不正确提示
                            if (error.response.status === 421) {
                                this.bag.add({
                                    field: 'password',
                                    msg: '邮箱或密码不相符或邮箱未认证'
                                });
                            }
                            console.log(error.response);
                        });
                    }else {
                        alert('表单不能为空');
                    }
                });
            }
        }
    }
</script>