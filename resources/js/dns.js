require('./bootstrap');
window.Vue = require('vue');

Vue.component('navbar', require('./components/Navbar.vue').default);
Vue.component('zones', require('./components/Zones.vue').default);

const app = new Vue({
    el: '#dns',
});
