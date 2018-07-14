import firebase from 'firebase';
import 'firebase/auth';

firebase.initializeApp({
    apiKey: "AIzaSyBM3pU0LD61ZrheIrxESy4FUHvO7SEgW08",
    authDomain: "spending-api.firebaseapp.com",
    databaseURL: "https://spending-api.firebaseio.com",
    projectId: "spending-api",
    storageBucket: "spending-api.appspot.com",
    messagingSenderId: "882234971205"
});

firebase.auth().onAuthStateChanged(function(user) {
    // Save user in window scope
    window.firebasehandler.user = user;
});

window.firebase = function() {
    return firebase;
};

window.firebasehandler = {
    // User data
    user: null,
    auth_token: null,

    // Timeout after 30s
    timeout: (ms = 30000) => {
        return new Promise((resolve, reject) => setTimeout(() => ('Timeout error (30s)'), 30000));
    },
    getAuthToken: () => {
        return new Promise((resolve, reject) => {
            window.firebasehandler.onSignedIn().then((user) => {
                return user.getIdToken().then(token => {
                    window.firebasehandler.auth_token = token;
                    resolve(token)
                });
            });

            // Timeout after 30s
            window.firebasehandler.timeout().then(e => reject(e));
        });
    },
    onSignedIn: () => {
        return new Promise((resolve, reject) => {
            firebase.auth().onAuthStateChanged(function(user) {
                if (user) {
                    resolve(user);
                }
            });

            // Timeout after 30s
            window.firebasehandler.timeout().then(e => reject(e));
        });
    },
    onSignedOut: () => {
        return new Promise((resolve, reject) => {
            firebase.auth().onAuthStateChanged(function(user) {
                if (user === null) {
                    resolve('User not signed in.');
                }
            });

            // Timeout after 30s
            window.firebasehandler.timeout().then(e => reject(e));
        });
    },
    onSignedInChanged: (func) => {
        return firebase.auth().onAuthStateChanged(func);
    },
    isSignedIn: function() {
        return this.user;
    },
    signInWithGoogle: function() {
        var provider = new firebase.auth.GoogleAuthProvider();
        provider.addScope('https://www.googleapis.com/auth/userinfo.email	');
        provider.addScope('https://www.googleapis.com/auth/userinfo.profile')
        firebase.auth().signInWithPopup(provider);
    },
    signInWithFacebook: function() {
        var provider = new firebase.auth.FacebookAuthProvider();
        provider.addScope('email');
        firebase.auth().signInWithPopup(provider);
    },
    signInWithTwitter: function() {
        var provider = new firebase.auth.TwitterAuthProvider();
        firebase.auth().signInWithPopup(provider);
    },
    signInWithGithub: function() {
        var provider = new firebase.auth.GithubAuthProvider();
        firebase.auth().signInWithPopup(provider);
    },
    signOut: function() {
        firebase.auth().signOut();
    }
}

export default {
    name: 'FirebaseHandler'
}
// Global references for user since it's going to be used everywhere

window.user = null;