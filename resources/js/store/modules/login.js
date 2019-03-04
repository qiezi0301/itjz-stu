import jwtToken from './../../helpers/jwt';
import * as types from "../mutation-type";

export default{
    actions : {
        loginRequest({dispatch}, formData) {
            return axios.post('/api/login', formData).then((response) => {
                console.log(response.data);
                //将access_token保存到localStorage中
                jwtToken.setToken(response.data.token);
                dispatch('setAuthUser');
            });
        },
        logoutRequest({dispatch}){
            return axios.post('/api/logout').then(response => {
                jwtToken.removeToken();
                dispatch('unsetAuthUser');
            });
        }
    }
}