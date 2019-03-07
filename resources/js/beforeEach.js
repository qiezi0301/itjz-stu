import jwtToken from './helpers/jwt';

const beforeEach = (to, from, next) => {
    if (to.meta.requiresAuth) {
        if (jwtToken.getToken()) {
            return next();
        } else {
            return next({'name': 'login'});
        }
    }
    if (to.meta.requiresGuest) {
        if (jwtToken.getToken()) {
            return next({'name': 'home'});
        } else {
            return next();
        }
    }
    next();
};

export default beforeEach
