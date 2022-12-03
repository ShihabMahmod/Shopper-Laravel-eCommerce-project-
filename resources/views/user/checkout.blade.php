@include('user.base.header');

<main id="main" class="main-site">

<div class="container">

    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="#" class="link">home</a></li>
            <li class="item-link"><span>login</span></li>
        </ul>
    </div>
    <div class=" main-content-area">
        <div class="wrap-address-billing">
            <h3 class="box-title">Billing Address</h3>
            <form action="{{url('/shipping-info-save')}}" method="POST" name="frm-billing" >
             @csrf
                <p class="row-in-form">
                    <label for="fname">first name<span>*</span></label>
                    <input id="first_name" type="text" id="first_name" name="first_name" value="{{$customer->first_name}}" placeholder="Your name" required>
                </p>
                <p class="row-in-form">
                    <label for="lname">last name<span>*</span></label>
                    <input id="lname" type="text" id="last_name" name="last_name" value="{{$customer->last_name}}" placeholder="Your last name">
                </p>
                <p class="row-in-form">
                    <label for="email">Email Addreess:</label>
                    <input id="email" type="email" id="email" name="email" value="{{$customer->email}}" placeholder="Type your email">
                </p>
                <p class="row-in-form">
                    <label for="phone">Phone number<span>*</span></label>
                    <input id="phone" type="number" id="phone" name="phone" value="{{$customer->phone}}" placeholder="10 digits format">
                </p>
                <p class="row-in-form">
                    <label for="add">Address:</label>
                    <input id="add" type="text" id="address" name="address" value="{{$customer->address}}" placeholder="Street at apartment number">
                </p>

                <p class="row-in-form">
                    <label for="zip-code">Postcode / ZIP:</label>
                    <input id="zip-code" type="number" id="zip_code" name="zip" value="{{$customer->zip}}" placeholder="Your postal code">
                </p>
                <p class="row-in-form">
                    <label for="city">Town / City<span>*</span></label>
                    <input id="city" type="text" id="city" name="city" value="{{$customer->first_name}}" placeholder="City name">
                </p>
                <p class="row-in-form fill-wife">
                    <label class="checkbox-field">
                        <input name="create-account" id="create-account" value="forever" type="checkbox">
                        <span>Create an account?</span>
                    </label>
                    <label class="checkbox-field">
                        <input name="different-add" id="different-add" value="forever" type="checkbox">
                        <span>Ship to a different address?</span>
                    </label>
                </p>
            
        </div>
        <div class="summary summary-checkout">
            <div class="summary-item payment-method">
                <h4 class="title-box">Payment Method</h4>
                <p class="summary-info"><span class="title">Check / Money order</span></p>
                <p class="summary-info"><span class="title">Credit Cart (saved)</span></p>
                <div class="choose-payment-methods">
                    <label class="payment-method">
                        <input name="payment-method" id="payment-method-bank" value="bank" type="radio">
                        <span>Cash on delivery</span>
                        <span class="payment-desc">But the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable
                            
                        
                    </label>
                    <label class="payment-method">
                        <input name="payment-method" id="payment-method-visa" value="visa" type="radio">
                        <span>visa</span>
                        <span class="payment-desc">There are many variations of passages of Lorem Ipsum available</span>
                    </label>
                    <label class="payment-method">
                        <input name="payment-method" id="payment-method-paypal" value="paypal" type="radio">
                        <span>Paypal</span>
                        <span class="payment-desc">You can pay with your credit</span>
                        <span class="payment-desc">card if you don't have a paypal account</span>
                    </label>
                </div>
                <!-- <p class="summary-info grand-total"><span>Grand Total</span> <span class="grand-total-price">৳ {{$total_price}}</span></p>
                <button style="background:red;" class="btn btn-primary btn-lg btn-block" id="sslczPayBtn"
                        token="if you have any token validation"
                        postdata="your javascript arrays or objects which requires in backend"
                        order="If you already have the transaction generated for current order"
                        endpoint="{{ url('/pay-via-ajax') }}"> Pay Now
                </button> -->
                <button class="btn btn-medium" type="submit">Place order now</button></span>
            </div>
            <div class="summary-item shipping-method">
                <h4 class="title-box f-title">Total Amount</h4>
                <p class="summary-info"><span class="title">৳ {{$total_price}}</span></p>
                <p class="summary-info"><span class="title">Shipping : free</span></p>
                <h4 class="title-box">Discount Codes</h4>
                <p class="row-in-form">
                    <label for="coupon-code">Enter Your Coupon code:</label>
                    <input id="coupon-code" type="text" name="coupon-code" value="" placeholder="">	
                </p>
                <a href="#" class="btn btn-small">Apply</a>
            </div>
        </div>
        </form>

    </div><!--end main content area-->
</div><!--end container-->

</main>
<!--main area-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>


<!-- If you want to use the popup integration, -->
<script>
    var obj = {};
    obj.cus_name = $('#customer_name').val();
    obj.cus_phone = $('#mobile').val();
    obj.cus_email = $('#email').val();
    obj.cus_addr1 = $('#address').val();
    obj.amount = $('#total_amount').val();

    $('#sslczPayBtn').prop('postdata', obj);

    (function (window, document) {
        var loader = function () {
            var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
            // script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR LIVE
            script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR SANDBOX
            tag.parentNode.insertBefore(script, tag);
        };

        window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
    })(window, document);
</script>
