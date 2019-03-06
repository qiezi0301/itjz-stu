export default {
    actions : {
        updatePasswordRequest({dispatch}, formData) {
            return axios.post('/api/user/password/update',formData).then(response =>{
                dispatch('showNotification',{level:'success', msg: '更新密码成功'})
            }).catch(error =>{
                dispatch('showNotification',{level:'error:'+error, msg: '更新密码失败'})
            })
        }
    }
}