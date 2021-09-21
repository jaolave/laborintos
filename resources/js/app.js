require('./bootstrap');
window.Vue = require('vue').default;
Vue.component('apods-component', require('./components/ApodsComponent.vue').default);
const app = new Vue({
    el: '#app',
});
