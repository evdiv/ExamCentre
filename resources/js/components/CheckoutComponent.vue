<template>
    <div>
        <p class="alert alert-success" v-if="status">{{ status }}</p>
        <p class="alert alert-danger" v-if="errors">{{ errors }}</p>

        <form action="/payment" method="POST">
            <button type="submit" @click.prevent="buy">Buy</button>
        </form>
    </div>
</template>

<script>
    export default {
        props: ['subscription'],

        data() {
            return {
               stripeEmail: '',
               stripeToken: '' ,
               status: false,
               errors: false
            }
        },

        created() {
            this.stripe = StripeCheckout.configure({
      
                key: 'pk_test_wSFoTlDs7VAqxbDCxnmj6MkF',
                image: 'https://stripe.com/img/documentation/checkout/marketplace.png',
                locale: 'auto',
                email: 'vakuka@gmail.com',
                allowRememberMe: false, 
                zipCode: false,

                token: (token) => {
                    this.stripeEmail = token.email;
                    this.stripeToken = token.id;

                    axios.post('/payment', { 
                        stripeEmail: this.stripeEmail,
                        stripeToken: this.stripeToken,
                        subscriptionId: this.subscription.id
                    })
                    .then((response) => {
                        this.status = response.data.status;
                    })
                    .catch((error) => {
                        this.errors = error.response.data.errors;
                    });
                }
            });
        },

        methods: {
            buy() {
                this.stripe.open({
                    name: this.subscription.title,
                    description: this.subscription.description,
                    amount: (this.subscription.price * 100)
                });
            }
        }

    }
</script>
