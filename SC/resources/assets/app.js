// import './vendor/js/helpers.js';
// import './vendor/js/template-customizer.js';
// import './js/config.js';
// import './vendor/libs/apex-charts/apexcharts.js';
// import './js/main.js';
// import './js/dashboards-analytics.js';
// import './helpers';
// import './template-customizer';
// import './config';
// import './apexcharts';
// import './main';
// import './dashboards-analytics';
// Instead of
// import { someFunction } from './largeModule';
// Use dynamic import 

import { helpers } from 'assets';
import { templatecustomizer } from 'assets';
import { apexcharts } from 'assets';
import { config } from 'assets';
import { main } from 'assets';
import { dashboardsanalytics } from 'assets';

// const helpers =
// import ('./vendor/js');
// const templatecustomizer =
//     import ('./vendor/js/template-customizer');
// const apexcharts =
//     import ('./vendor/libs/apex-charts/apexcharts');
// const Moduleconfig =
//     import ('./js/config');
// const Modulemain =
//     import ('./js/main');
// const dashboardsanalytics =
//     import ('./js/dashboards-analytics');


// export default {
//     build: {
//         rollupOptions: {
//             output: {
//                 manualChunks(id) {
//                     if (id.includes('helpers')) {
//                         return 'assets';
//                     }
//                     if (id.includes('template-customizer')) {
//                         return 'assets';
//                     }
//                     if (id.includes('apexcharts')) {
//                         return 'assets';
//                     }
//                     if (id.includes('config')) {
//                         return 'assets';
//                     }
//                     if (id.includes('main')) {
//                         return 'assets';
//                     }
//                     if (id.includes('dashboards-analytics')) {
//                         return 'assets';
//                     }

//                 }

//             }
//         }
//     }
// }