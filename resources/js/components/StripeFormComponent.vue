<template>

    <div class="row justify-content-center">
        <div class="col-md-7"> 
            <div class="card text-white bg-info shadow">
                <div class="card-header text-center">
                    <h2>{{ product.title }}</h2>
                </div>

                <div class="card-body text-center">
                    <h1 class="card-title pricing-card-title">
                        ${{ product.price }}<small> USD</small>
                    </h1>

                    Please give us your payment details:
                    <StripeElements class='stripe-card'
                      stripe='pk_test_wSFoTlDs7VAqxbDCxnmj6MkF'
                      :product = 'product' 
                      :options='stripeOptions'
                      @change='complete = $event.complete' />
                </div>
            </div>
        </div>

        <div class="col-md-7 text-center" style="margin-top: 30px; margin-bottom: 30px;">
            <h2>OR</h2>
        </div>

        <div class="col-md-7">
            <slot name="paypal"></slot>
        </div>

    </div>             
</template>

<script>

import StripeElements from './StripeElementsComponent'

export default {
    props: ['product'],
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