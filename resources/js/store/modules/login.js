import jwtToken from './../../helpers/jwt';
import localforage from "localforage";

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

            localforage.setItem('APP_USER_TOKEN', tokenResponse.token);
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