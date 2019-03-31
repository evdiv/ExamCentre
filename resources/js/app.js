
require('./bootstrap');

window.Vue = require('vue');

import store from './store/store';
import StripeCheckout from './components/CheckoutComponent.vue';
import StripeForm from './components/StripeFormComponent.vue';
import Recorder from './components/RecorderComponent.vue';  


//It works only in this way
Vue.component('Reviews', require('./components/CarouselComponent.vue'));

const app = new Vue({
    el: '#app',
    components: { StripeCheckout, StripeForm, Recorder},
    store
});
