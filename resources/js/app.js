
require('./bootstrap');

window.Vue = require('vue');

Vue.component('stripe-checkout', require('./components/CheckoutComponent.vue'));
Vue.component('stripe-form', require('./components/StripeFormComponent.vue'));
Vue.component('recorder', require('./components/RecorderComponent.vue'));
Vue.component('reviews', require('./components/CarouselComponent.vue'));

const app = new Vue({
    el: '#app'
});
