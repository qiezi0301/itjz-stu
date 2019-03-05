import * as types from './../mutation-type';
import jwtToken from './../../helpers/jwt';

export default {
    state: {
        authenticated: false,
        name: null,
        email: null
    },
    mutations: {
        [types.SET_AUTH_USER](state, payload) {
            state.authenticated = true;
            state.name = payload.user.name;
            state.email = payload.user.email;
        },
        [types.UNSET_AUTH_USER](state) {
            state.authenticated = false;
            state.name = null;
            state.email = null;
        }
    },
    actions: {
        setAuthUser({commit, dispatch}) {
            return axios.get('/api/user').then(response => {
                commit({
                    type: types.SET_AUTH_USER,
                    user: response.data
                })
            }).catch(error => {
                //当access_token过期时通过refreshToken重新获取access_token
                console.log('获取用户的 error=' + error.response);
                dispatch('refreshToken')
            });
        },
        unsetAuthUser({commit}) {
            commit({type: types.UNSET_AUTH_USER});
        },
        refreshToken({commit, dispatch}) {
            return axios.post('/api/token/refresh').then(response =>{
                dispatch('loginSuccess',response.data);
            }).catch(error => {
                //重新获取token一旦失败就执行退出操作
                console.log('重新获取用户失败,退出登录 error=' + error);
                dispatch('logoutRequest');
            })
        }
    }
};