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
    user: null,
    onSignedIn: function(func) {
        firebase.auth().onAuthStateChanged(function(user) {
            if (user) {
                func(user);
            }
        });
    },
    onSignedOut: function(func) {
        firebase.auth().onAuthStateChanged(function(user) {
            if (user === null) {
                func();
            }
        });
    },
    onSignedInChanged: function(func) {
        firebase.auth().onAuthStateChanged(func)
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