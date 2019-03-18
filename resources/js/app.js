
require('./bootstrap');

window.Vue = require('vue');

import store from './store/store';
import StripeCheckout from './components/CheckoutComponent.vue';
import StripeForm from './components/StripeFormComponent.vue';
import Recorder from './components/RecorderComponent.vue'; 
import Reviews from './components/CarouselComponent.vue';  

// Vue.component('stripe-checkout', require('./components/CheckoutComponent.vue'));
// Vue.component('stripe-form', require('./components/StripeFormComponent.vue'));
// Vue.component('recorder', require('./components/RecorderComponent.vue'));
// Vue.component('reviews', require('./components/CarouselComponent.vue'));

const app = new Vue({
    el: '#app',
    components: { StripeCheckout, StripeForm, Recorder, Reviews },
    store
});
