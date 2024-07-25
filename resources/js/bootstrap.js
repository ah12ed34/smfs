import 'bootstrap';

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// import Pusher from 'pusher-js';
// window.Pusher = Pusher;

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: import.meta.env.VITE_PUSHER_APP_KEY,
//     cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER ?? 'mt1',
//     wsHost: import.meta.env.VITE_PUSHER_HOST ?? `ws-${import.meta.env.VITE_PUSHER_APP_CLUSTER}.pusher.com`,
//     wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
//     wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
//     forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
//     enabledTransports: ['ws', 'wss'],
// });
import {  io } from 'socket.io-client';
window.io = io;
// import { socketIOClient } from 'socket.io-client';
// window.socketIOClient = socketIOClient;

// jQuery
// import { $, jQuery } from 'jquery';
// window.$ = $;
// window.jQuery = jQuery;

// // Popper.js
// import Popper from 'popper.js';
// window.Popper = Popper;

// import { Livewire } from '../../vendor/livewire/livewire/dist/livewire.esm';
// import Alpine from 'alpinejs';
// import Clipboard from '@ryangjchandler/alpine-clipboard';

// Alpine.plugin(Clipboard);

// window.Alpine = Alpine;
// window.Livewire = Livewire;

// Livewire.start();
// Alpine.start();


// let port = '3000';
//             let url = 'https://server-v02x.onrender.com/';
//             let socket = io(url);
//             console.log(socket);
//             socket.on('connect', function() {
//                 console.log('Connected to server');
//             });
// import 'bootstrap/dist/css/bootstrap.min.css';
// import 'bootstrap/dist/js/bootstrap.bundle.min.js';
// import 'bootstrap-icons/font/bootstrap-icons.css';
