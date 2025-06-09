importScripts('https://www.gstatic.com/firebasejs/10.12.2/firebase-app-compat.js');
importScripts('https://www.gstatic.com/firebasejs/10.12.2/firebase-messaging-compat.js');

firebase.initializeApp({
    apiKey: "AIzaSyA9h_diPE-IT2ebh_JVRKt7egulEnbBFZQ",
    authDomain: "tredo-16837.firebaseapp.com",
    projectId: "tredo-16837",
    storageBucket: "tredo-16837.firebasestorage.app",
    messagingSenderId: "993434627757",
    appId: "1:993434627757:web:763d1bd21726aeec98e024",
    measurementId: "G-HRPLHF859L"
});

const messaging = firebase.messaging();

// Это можно использовать при получении пуша
messaging.onBackgroundMessage((payload) => {
    console.log('📨 Получено сообщение в фоне:', payload);

    const { title, body } = payload.notification;

    self.registration.showNotification(title, {
        body,
        icon: '/firebase-logo.png' // иконка по желанию
    });
});
