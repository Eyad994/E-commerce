const firebaseConfig = {
    apiKey: "AIzaSyDFaBfnGtc0kyuqllN_sMEaHvmBNvhfUi8",
    authDomain: "laravel-21db2.firebaseapp.com",
    databaseURL: "https://laravel-21db2.firebaseio.com",
    projectId: "laravel-21db2",
    storageBucket: "laravel-21db2.appspot.com",
    messagingSenderId: "55495310845",
    appId: "1:55495310845:web:41bfff7b8fb10f9f82ed94",
    measurementId: "G-JZ69R6TFRN"
};

firebase.initializeApp(firebaseConfig);

const messaging = firebase.messaging();
messaging
    .requestPermission()
    .then(function () {
        console.log("Notificiation permission granted.");
        return messaging.getToken()
    }).then(function (token) {

    console.log(token);
    $('#device_token').val(token);

    }).catch(function (err) {
    console.log("Unable to get permission to notify.", err);
});

messaging.onMessage((payload) => {
    console.log(payload);
    $('.number-alert').empty().html(payload.data['gcm.notification.badge']);
    $('.number-message').empty().html('You have '+payload.data['gcm.notification.badge']+' messages');
});
