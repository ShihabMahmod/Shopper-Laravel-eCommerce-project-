@include('user.base.header');
@include('user.base.slider');
@include('user.base.banner');

			<!--On Sale-->
			<div class="wrap-show-advance-info-box style-1 has-countdown">
				<h3 class="title-box">On Sale</h3>
				<div class="wrap-countdown mercado-countdown" data-expire="2020/12/12 12:34:56"></div>
				<div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>

					@foreach($products as $saleProduct)
					@if($saleProduct->product_sale_price)
					<div class="product product-style-2 equal-elem ">
						<div class="product-thumnail">
							<a href="/product-details/{{$saleProduct->id}}" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
								<figure><img src="{{asset($saleProduct->product_image)}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
							</a>
							<div class="group-flash">
								<span class="flash-item sale-label">sale</span>
							</div>
							<div class="wrap-btn">
								<a href="#" class="function-link">quick view</a>
							</div>
						</div>
						<div class="product-info">
							<a href="#" class="product-name"><span>{{$saleProduct->product_name}}</span></a>
							<div class="wrap-price"><ins><p class="product-price">{{$saleProduct->product_sale_price}}</p></ins> <del><p class="product-price">{{$saleProduct->product_reguler_price}}</p></del></div>
							<div class="wrap-price"><span class="product-price"></span></div>
						</div>
					</div>
					@endif
					@endforeach

				</div>
			</div>

			<!--Latest Products-->
			<div class="wrap-show-advance-info-box style-1">
				<h3 class="title-box">Latest Products</h3>
				<div class="wrap-top-banner">
					<a href="#" class="link-banner banner-effect-2">
						<figure><img src="assets/images/digital-electronic-banner.jpg" width="1170" height="240" alt=""></figure>
					</a>
				</div>
				<div class="wrap-products">
					<div class="wrap-product-tab tab-style-1">						
						<div class="tab-contents">
							<div class="tab-content-item active" id="digital_1a">
								<div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >
	
									@foreach($products as $product)
									<div class="product product-style-2 equal-elem ">
										<div class="product-thumnail">
											<a href="/product-details/{{$product->id}}" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
												<figure><img src="{{asset($product->product_image)}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
											</a>
											<div class="group-flash">
												@if($product->product_sale_price)
													<span class="flash-item sale-label">sale</span>
												@endif	
											</div>
											<div class="wrap-btn">
												<a href="#" class="function-link">quick view</a>
											</div>
										</div>
										<div class="product-info">
											<a href="#" class="product-name"><span>{{$product->product_name}}</span></a>
											<div class="wrap-price"><ins><p class="product-price">৳{{$product->product_reguler_price}}</p></ins> <del> 
												@if($product->product_sale_price > 0)
												  	<p class="product-price">৳{{$product->product_sale_price}}</p>
												@endif
											</del></div>
										</div>
									</div>
									@endforeach
									
								</div>
							</div>							
						</div>
					</div>
				</div>
			</div>

			<!--Product Categories-->
			<div class="wrap-show-advance-info-box style-1">
				<h3 class="title-box">Product Categories</h3>
				<div class="wrap-top-banner">
					<a href="#" class="link-banner banner-effect-2">
						<figure><img src="assets/images/fashion-accesories-banner.jpg" width="1170" height="240" alt=""></figure>
					</a>
				</div>
				<div class="wrap-products">
					<div class="wrap-product-tab tab-style-1">
						<div class="tab-control">
							<a href="#fashion_1a" class="tab-control-item active">Smartphone</a>
							<a href="#fashion_1b" class="tab-control-item">Watch</a>
							<a href="#fashion_1c" class="tab-control-item">Laptop</a>
							<a href="#fashion_1d" class="tab-control-item">Camera</a>
						</div>
						<div class="tab-contents">

							<div class="tab-content-item active" id="fashion_1a">
								<div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >

								@foreach($mobileTabs as $product)

									<div class="product product-style-2 equal-elem ">
										<div class="product-thumnail">
											<a href="/product-details/{{$product->id}}" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
												<figure><img src="{{asset($product->product_image)}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
											</a>
											<div class="group-flash">
												<span class="flash-item sale-label">sale</span>
											</div>
											<div class="wrap-btn">
												<a href="#" class="function-link">quick view</a>
											</div>
										</div>
										<div class="product-info">
											<a href="#" class="product-name"><span>{{$product->product_name}} </span></a>
											<div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
										</div>
									</div>
									@endforeach			


								</div>
							</div>

							<div class="tab-content-item" id="fashion_1b">
								<div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>

									@foreach($watchTabs as $watch)
									<div class="product product-style-2 equal-elem ">
										<div class="product-thumnail">
											<a href="/product-details/{{$watch->id}}" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
												<figure><img src="{{$watch->product_image}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
											</a>
											<div class="group-flash">
												<span class="flash-item bestseller-label">Bestseller</span>
											</div>
											<div class="wrap-btn">
												<a href="#" class="function-link">quick view</a>
											</div>
										</div>
										<div class="product-info">
											<a href="#" class="product-name"><span>{{$watch->product_name}}</span></a>
											<div class="wrap-price"><span class="product-price">{{$watch->product_price}}</span></div>
										</div>
									</div>
									@endforeach
								</div>
							</div>

							<div class="tab-content-item" id="fashion_1c">
								<div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>

									@foreach($laptopTabs as $laptop)
									<div class="product product-style-2 equal-elem ">
										<div class="product-thumnail">
											<a href="/product-details/{{$laptop->id}}" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
												<figure><img src="{{asset($laptop->product_image)}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
											</a>
											<div class="group-flash">
												<span class="flash-item new-label">new</span>
											</div>
											<div class="wrap-btn">
												<a href="#" class="function-link">quick view</a>
											</div>
										</div>
										<div class="product-info">
											<a href="#" class="product-name"><span>{{$laptop->product_name}}</span></a>
											<div class="wrap-price"><ins><p class="product-price">{{$laptop->product_reguler_price}}</p></ins> <del><p class="product-price">{{$laptop->product_sale_price}}</p></del></div>
										</div>
									</div>
									@endforeach
								</div>
							</div>

							<div class="tab-content-item" id="fashion_1d">
								<div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>

									@foreach($cameraTabs as $camera)
									<div class="product product-style-2 equal-elem ">
										<div class="product-thumnail">
											<a href="/product-details/{{$camera->id}}" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
												<figure><img src="{{asset($camera->product_image)}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
											</a>
											<div class="group-flash">
												<span class="flash-item sale-label">sale</span>
											</div>
											<div class="wrap-btn">
												<a href="#" class="function-link">quic view</a>
											</div>
										</div>
										<div class="product-info">
											<a href="#" class="product-name"><span>{{$camera->product_name}}</span></a>
											<div class="product-rating">
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>
											</div>
											<div class="wrap-price"><ins><p class="product-price">{{$camera->product_reguler_price}}</p></ins> <del><p class="product-price">{{$camera->produt_sale_price}}</p></del></div>
										</div>
									</div>
									@endforeach
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>			

		</div>

	</main>

	
			<!--End function info-->
@include('user.base.footer');