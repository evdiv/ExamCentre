<template>

    <div class="row justify-content-center">
        <div class="col-md-7"> 
            <div class="card text-white bg-info shadow">
                <div class="card-header text-center">
                    <h4 class="my-0 font-weight-normal">{{ subscription.title }}</h4>
                </div>

                <div class="card-body text-center">
                    <h1 class="card-title pricing-card-title">
                        ${{ subscription.price }}<small> USD</small>
                    </h1>

                    Please give us your payment details:
                    <StripeElements class='stripe-card'
                      stripe='pk_test_wSFoTlDs7VAqxbDCxnmj6MkF'
                      :subscription = 'subscription' 
                      :options='stripeOptions'
                      @change='complete = $event.complete' />
                </div>
            </div>
        </div>

        <div class="col-md-7 text-center" style="margin-top: 30px; margin-bottom: 30px;">
            <h2>OR</h2>
        </div>

        <div class="col-md-7">
             <button class='btn btn-block btn-lg btn-primary'><i class="fab fa-cc-paypal fa-lg"></i>&nbsp; Pay with PayPal</button>
        </div>

    </div>             
</template>

<script>

import StripeElements from './StripeElementsComponent'

export default {
    props: ['subscription'],
    data () {
        return {
            stripeOptions: {
                // see https://stripe.com/docs/stripe.js#element-options for details
                style: {
                    base: {
                        fontFamily: 'Verdana',
                        fontSize: '16px'
                    }
                }
            }
        }
    },

    components: { StripeElements },

}
</script>