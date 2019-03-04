import * as types from './../mutation-type';
import jwtToken from './../../helpers/jwt';

export default {
    state: {
        authenticated: false,
        name: null,
        email: null
    },
    getters: {
        get_authenticated: state => {
            return state.authenticated;
        },
        get_name: state => {
            return state.name;
        },
        get_email: state => {
            return state.email;
        }
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
                },(response) =>{
                    alert(response);
                    console.error(response);
                });
            });
        },
        unsetAuthUser({commit}) {
            commit({type: types.UNSET_AUTH_USER});
        }
    }
};