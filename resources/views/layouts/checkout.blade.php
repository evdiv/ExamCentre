<form method="POST">
    @csrf

    <input type="hidden" name="order_type_id" value="1">

    <!-- Here will be a payment form -->

    <div class="col-md-6 offset-md-3">
        <button type="submit" class="btn btn-block btn-lg btn-primary">Subscribe</button>
    </div>

</form>