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

			@foreach($mycart as $cart)
			<div class="wrap-iten-in-cart">
					<h3 class="box-title">Products Name</h3>
					<ul class="products-cart">
						<li class="pr-cart-item">
							<div class="product-image">
								<figure><img src="{{asset($cart->product_image)}}" alt=""></figure>
							</div>
							<div class="product-name">
								<a class="link-to-product" href="{{url('/product-details/'.$cart->product_id)}}">{{$cart->product_name}}</a>
							</div>
							@if($cart->product_color)
							<div class="price-field produtc-price"><p class="price">{{$cart->product_color}}</p></div>
							@endif
							@if($cart->product_size)
							<div class="price-field produtc-price"><p class="price">{{$cart->product_size}}</p>inc</div>
							@endif
							<div class="price-field produtc-price"><p class="price">{{$cart->product_price}}</p></div>
							<div class="quantity">
								<div class="quantity-input">
									<input type="text" name="product-quatity" value="{{$cart->product_quantity}}" data-max="120" pattern="[0-9]*" >									
									<a class="btn btn-increase" href="#"></a>
									<a class="btn btn-reduce" href="#"></a>
								</div>
							</div>
							<div class="price-field sub-total"><p class="price">৳ {{$cart->product_price*$cart->product_quantity}}</p></div>
							<div class="delete">
								<a href="delete-from-cart/{{$cart->id}}"><i class="fa fa-2x fa-trash" aria-hidden="true"></i></a>
							</div>
						</li>
																	
					</ul>
				</div>
			@endforeach

				<div class="summary">
					<div class="order-summary">
						<h4 class="title-box">Order Summary</h4>
						<p class="summary-info"><span class="title">Subtotal</span><b class="index">৳ {{$total_price}}</b></p>
						<p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b></p>
						<p class="summary-info total-info "><span class="title">Total</span><b class="index">৳ {{$total_price}}</b></p>
					</div>
					<div class="checkout-info">
						<label class="checkbox-field">
							<input class="frm-input " name="have-code" id="have-code" value="" type="checkbox"><span>I have promo code</span>
						</label>
						<a class="btn btn-checkout" href="{{url('/checkout')}}">Check out</a>
						<a class="link-to-shop" href="shop.html">Continue Shopping<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
					</div>
					<div class="update-clear">
						<a class="btn btn-clear" href="/delete-cart-all">Clear Shopping Cart</a>
						<a class="btn btn-update" href="#">Update Shopping Cart</a>
					</div>
				</div>

				<div class="wrap-show-advance-info-box style-1 box-in-site">
					<h3 class="title-box">Most Viewed Products</h3>
					<div class="wrap-products">
						<div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >
							@foreach($most_view as $products)
							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="{{asset($products->product_image)}}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item new-label">new</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>{{$products->product_name}}</span></a>
									<div class="wrap-price"><span class="product-price">{{$products->sale_price}}</span></div>
								</div>
							</div>
							@endforeach
						</div>
					</div><!--End wrap-products-->
				</div>

			</div><!--end main content area-->
		</div><!--end container-->

	</main>
@include('user.base.footer');    