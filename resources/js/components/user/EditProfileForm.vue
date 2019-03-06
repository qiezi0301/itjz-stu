<template>
    <form @submit.prevent="updateProfile">
        <div class="form-group row mt20">
            <label for="name" class="col-md-3 col-form-label text-md-right">用户名</label>
            <div class="col-md-7">
                <input v-model="name"
                       v-validate="'required'"
                       :class="{'is-invalid': errors.has('name')}"
                       data-vv-as="邮箱"
                       id="name" type="text" class="form-control" name="name" required>
                <span v-show="errors.has('name')" class="help invalid-feedback">{{ errors.first('name') }}</span>
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-3 col-form-label text-md-right">邮箱</label>
            <div class="col-md-7">
                <input v-model="email"
                       v-validate="'required|email'"
                       :class="{'is-invalid': errors.has('email')}"
                       data-vv-as="邮箱"
                       id="email" type="email" class="form-control" name="email" required>
                <span v-show="errors.has('email')" class="help invalid-feedback">{{ errors.first('email') }}</span>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-7 offset-md-3">
                <button type="submit" class="btn btn-primary">
                    更新用户资料
                </button>
            </div>
        </div>
    </form>
</template>

<script>
    import * as types from './../../store/mutation-type';
    export default {
        name: 'edit-profile-form',
        computed: {
            name: {
                get(){
                    return this.$store.state.AuthUser.name;
                },
                set(value) {
                    this.$store.commit({
                        type: types.UPDATE_PROFILE_NAME,
                        value: value
                    })
                }
            },
            email: {
                get(){
                    return this.$store.state.AuthUser.email;
                },
                set(value) {
                    this.$store.commit({
                        type: types.UPDATE_PROFILE_EMAIL,
                        value: value
                    })
                }
            },
        },
        methods: {
            updateProfile() {
                const formData = {
                    name: this.name,
                    email: this.email
                };
                this.$store.dispatch('updateProfileRequest',formData).then(response =>{
                    this.$router.push({name: 'profile'})
                }).catch(error =>{

                });
            }
        }
    }
</script>