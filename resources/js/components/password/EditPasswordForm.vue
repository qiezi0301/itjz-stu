<template>
    <form @submit.prevent="updatePassword">
        <div class="form-group row mt20">
            <label for="password" class="col-md-3 col-form-label text-md-right">新密码</label>
            <div class="col-md-7">
                <input v-model="password"
                       v-validate="'required|min:6'"
                       data-vv-as="密码"
                       :class="{'is-invalid': errors.has('password')}"
                       id="password" type="password" class="form-control" name="password" ref="password" required>
                <span v-show="errors.has('password')" class="help invalid-feedback">{{ errors.first('password') }}</span>
            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm" class="col-md-3 col-form-label text-md-right">确认密码</label>
            <div class="col-md-7">
                <input id="password-confirm"
                       v-validate="'required|min:6|confirmed:password'"
                       data-vv-as="确认密码"
                       :class="{'is-invalid': errors.has('password_confirmation')}"
                       type="password" class="form-control" name="password_confirmation" required>
                <span v-show="errors.has('password_confirmation')" class="help invalid-feedback">{{ errors.first('password_confirmation') }}</span>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-7 offset-md-3">
                <button type="submit" class="btn btn-primary">
                    更新密码
                </button>
            </div>
        </div>
    </form>
</template>

<script>
    export default {
        data() {
            return {
                password: '',
                password_confirmation: ''
            }
        },
        methods: {
            updatePassword() {
                //所有的验证规则通过后才执行
                this.$validator.validateAll().then(result => {
                    if (result) {
                        let formData = {
                            password: this.password
                        };
                        this.$store.dispatch('updatePasswordRequest', formData).then(response => {
                            // this.$router.push({name: 'profile'})
                            console.log('Success');
                        }).catch(error => {
                            //
                        })
                    }
                    //
                });
            }
        }
    }
</script>