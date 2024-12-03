import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import Echo from 'laravel-echo';
window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: '283664f8e9f0d19273', 
    cluster: 'ap1',
    forceTLS: true,
    auth: {
        headers: {
            'Authorization': 'Bearer ' + document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    }
});
