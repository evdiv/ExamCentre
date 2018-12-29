<template>
    <div>
        <p class="alert alert-success" v-if="status">{{ status }}</p>
        <p class="alert alert-danger" v-if="errors">{{ errors }}</p>

        <div class='credit-card-inputs' v-if="!sending">
            <div class="form-group row">
                <div class="col-md-12">
                    <card-number class='form-control card-number'
                        ref='cardNumber'
                        :stripe='stripe'
                        :options='options'
                        @change='number = $event.complete'
                    />
                </div>
            </div>    
 
             <div class="form-group row">
                <div class="col-md-8">
                    <card-expiry class='form-control card-expiry'
                        ref='cardExpiry'
                        :stripe='stripe'
                        :options='options'
                        @change='expiry = $event.complete'
                    />
                </div>    

                <div class="col-md-4">
                    <card-cvc class='form-control card-cvc'
                        ref='cardCvc'
                        :stripe='stripe'
                        :options='options'
                        @change='cvc = $event.complete'
                    />
                </div>
            </div>        
        </div>
        <div v-else class="text-center" style="padding-top: 20px; padding-bottom: 20px;">
            <i class="fas fa-spinner fa-spin fa-3x"></i>
        </div>

        <button class='btn btn-block btn-lg' :class="btnClass" @click='pay' :disabled='!complete'>
            <i class="far fa-credit-card"></i>&nbsp; Pay with credit card</button>
    </div>
</template>

<script>
import { createToken, CardNumber, CardExpiry, CardCvc } from 'vue-stripe-elements-plus'

export default {
    props: [ 'stripe', 'options', 'subscription' ],

    data () {
        return {
            complete: false,
            number: false,
            expiry: false,
            cvc: false,
            status: false,
            errors: false,
            sending: false
        }
    },

    computed: {
        btnClass: function() {
            return {
                'btn-success': this.complete,
                'btn-light': !this.complete
            }
        }
    },

    methods: {
        update () {
            this.complete = this.number && this.expiry && this.cvc

            if (this.number) {
                if (!this.expiry) {
                    this.$refs.cardExpiry.focus()
                } else if (!this.cvc) {
                    this.$refs.cardCvc.focus()
                }
            } else if (this.expiry) {
                if (!this.cvc) {
                    this.$refs.cardCvc.focus()
                } else if (!this.number) {
                    this.$refs.cardNumber.focus()
                }
            }
        },
        pay () {
            createToken().then(data => {

                this.sending = true;

                axios.post('/payment', { 
                    stripeToken: data.token.id,
                    subscriptionId: this.subscription.id
                })
                .then((response) => {
                    this.status = response.data.status;
                    this.sending = false;
                    if(this.status == 'success') {
                        window.location.href = '/lessons';
                    }
                })
                .catch((error) => {
                    this.sending = false;
                    this.errors = error.response.data.errors;
                });
            });
        }
    },

    components: { createToken, CardNumber, CardExpiry, CardCvc },

    watch: {
        number () { this.update() },
        expiry () { this.update() },
        cvc () { this.update() }
    }
}
</script>

<style>

</style>