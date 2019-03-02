<template>
    <form method="post" @submit.prevent="register">
        <div class="form-group" :class="{'has-error': errors.has('name')}">
            <label for="name" class="control-label">用户名:</label>
            <input v-model="name"
                   v-validate="'required|min:4'"
                   class="form-control"
                   data-vv-as="用户名"
                   id="name" type="text" placeholder="用户名唯一英文或数字组合" name="name" required="required"
                   autofocus="autofocus">
            <span class="help-block">{{ errors.first('name') }}</span>
        </div>
        <div class="form-group user-register-tooltip" :class="{'has-error': errors.has('email')}">
            <label for="email" class="control-label">邮箱:</label>
            <input v-model="email"
                   v-validate="'required|email'"
                   data-vv-as="邮箱"
                   id="email" type="email" name="email" placeholder="请不要随意填测试邮箱" value="" required="required"
                   class="form-control">
            <span class="help-block">{{ errors.first('email') }}</span>
        </div>
        <div class="form-group" :class="{'has-error': errors.has('password')}">
            <label for="password" class="control-label">密码:</label>
            <input v-model="password"
                   v-validate="'required|min:6'"
                   data-vv-as="密码"
                   name="password"
                   type="password"
                   id="password"
                   placeholder="密码至少6位"
                   class="form-control"
                   ref="password">
            <span class="help-block">{{ errors.first('password') }}</span>
        </div>
        <div class="form-group" :class="{'has-error': errors.has('password_confirmation')}">
            <label for="password_confirmation" class="control-label">确认密码:</label>
            <input id="password_confirmation"
                   v-validate="'required|min:6|confirmed:password'"
                   data-vv-as="确认密码"
                   name="password_confirmation"
                   type="password"
                   placeholder="两次密码必须一致"
                   class="form-control">
            <span class="help-block">{{ errors.first('password_confirmation') }}</span>
        </div>
        <input name="code" type="hidden" value="">
        <div class="form-group buttons">
            <p>
                注册时请您一定要阅读
                <a href="/agreement" target="_blank" rel="noreferrer noopener"
                   style="text-align: left;">ITJZ服务条款和版权声明 </a>
            </p>
            <button type="submit" class="btn btn-primary btnBlack" style="font-weight: bold;">
                马 上 注 册
            </button>
        </div>
    </form>
</template>

<script>
    export default {
        name: "RegisterForm",
        data() {
            return {
                name: '',
                email: '',
                password: ''
            }
        },
        methods: {
            register() {
                //验证是否提交空表单
                this.$validator.validateAll().then(result => {
                    if (result) {
                        let formData = {
                            name: this.name,
                            email: this.email,
                            password: this.password
                        };
                        axios.post('/api/register', formData).then(response => {
                            this.$router.push({name: 'confirm', params: {email: this.email}});
                        }, error => {
                            console.log(error.data);
                        });
                    } else {
                        alert('表单不能为空');
                    }
                });
            }
        }
    }
</script>