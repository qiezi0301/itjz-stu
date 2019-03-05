import jwtToken from './../../helpers/jwt';
import * as types from "../mutation-type";

export default{
    actions : {
        loginRequest({dispatch}, formData) {
            return axios.post('/api/login', formData).then((response) => {
                dispatch('loginSuccess', response.data);
            });
        },
        loginSuccess({dispatch}, tokenResponse) {
            //将access_token保存到localStorage中
            jwtToken.setToken(tokenResponse.token);
            jwtToken.setAuthId(tokenResponse.auth_id);
            dispatch('setAuthUser');
        },
        logoutRequest({dispatch}){
            return axios.post('/api/logout').then(response => {
                jwtToken.removeToken();
                dispatch('unsetAuthUser');
            });
        }
    }
}