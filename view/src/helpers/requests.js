import axios from 'axios';

// This is a global helper since it's stateless and im lazy. 
var request = {
    name: 'Wrapper importy for global helpers'
};

// Base config
request.build = (method, url, data) => {
    return axios({
        baseURL: 'https://spending-api/api',
        url: url,
        timeout: 10000,
        method: method,
        mode: 'no-cors',
        headers: {
            'X-Auth-Token': window.firebasehandler.auth_token,
            'X-User-Email': (window.firebasehandler.user === null) ? null : window.firebasehandler.user.email
        },
        data: data
    }).then(result => {
        // Global error handling
        return new Promise(function(resolve, reject) {
            // If status 401 has been returned, relog
            if (result.status == 401) {
                window.vue.router.push({ path: '/sign-out' });
                reject('Your token was invalid, you\' ve been signed out.');
            }
            resolve(result);
        });
    });
};

request.get = (url, data = {}) => {
    console.log('POST', url, data);
    return request.build('GET', url, data);
}

request.post = (url, data = {}) => {
    console.log('POST', url, data);
    return request.build('GET', url, data);
}


export default request;