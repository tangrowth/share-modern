import firebase from "firebase";

if (!firebase.apps.length) {
  firebase.initializeApp({
    apiKey: "AIzaSyCDXcx6fNNw3pe-gP0XGF6xlKFPY6VpHgU",
    authDomain: "share-5eccb.firebaseapp.com",
    projectId: "share-5eccb",
    storageBucket: "share-5eccb.appspot.com",
    messagingSenderId: "576367263168",
    appId: "1:576367263168:web:642ec5f5e50a95d726dc25",
    measurementId: "G-3L3MXE7RDZ",
  });
}

export default firebase;