// import './bootstrap'
// import './sidebar'

import.meta.glob([
    '../images/**',
    '../svg/**',
   ]);

import {  io } from 'socket.io-client';
window.io = io;
