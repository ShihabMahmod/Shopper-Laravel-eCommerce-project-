@include('user.base.header');
    <!--main area-->
	<main id="main" class="main-site">
                 @php
                  $productDetails['product_images'] = explode("|",$productDetails->product_images);
                  $productDetails['product_color']  = explode(",",$productDetails->product_color);
                  $productDetails['product_size']  = explode(",",$productDetails->product_size);
                 @endphp

<div class="container">

    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="#" class="link">home</a></li>
            <li class="item-link"><span>detail</span></li>
        </ul>
    </div>
    <div class="row">

        <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
            <div class="wrap-product-detail">
                <div class="detail-media">
                    <div class="product-gallery">
                      <ul class="slides">
                

                    @if($productDetails->product_images)
                    @foreach($productDetails->product_images as $images)
                        <li data-thumb="{{asset('/image/'.$images)}}">
                            <img src="{{asset('/image/'.$images)}}" alt="product thumbnail" />
                        </li>
                    @endforeach
                    @else
                        <li data-thumb="{{asset($productDetails->product_image)}}">
                            <img src="{{asset($productDetails->product_image)}}" alt="product thumbnail" />
                        </li>
                    @endif    

                      </ul>
                    </div>
                </div>
                <form action="{{url('/add-cart/'.$productDetails->id)}}" method="POST">
                @csrf
                <div class="detail-info">
                    <div class="product-rating">
                        @for($i =1; $i<= $agv_rating; $i++)
                             <i class="fa fa-star checked" aria-hidden="true"></i>
                        @endfor

                        @for( $j = $agv_rating+1; $j <= 5; $j++)
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        @endfor
                        <a href="#" class="count-review">({{$noReview}}) Review</a>
                    </div>
                    <h2 class="product-name">{{$productDetails->product_name}}</h2>
                    <div class="short-desc">
                        <ul>
                            <li>Color : 
                                @foreach($productDetails->product_color as $color)
                                        {{$color}}
                                        {{"|"}}
                                @endforeach
                            </li>
                            <li>Braand : {{$productDetails->brand_name}}</li>
                            <li>Category : {{$productDetails->category_name}}</li>
                        </ul>
                    </div>
                    <div class="wrap-social">
                        <a class="link-socail" href="#"><img src="{{asset('assets/images/social-list.png')}}" alt=""></a>
                    </div>
                    <div class="wrap-price"><span class="product-price">৳ {{$productDetails->product_reguler_price}}</span></div>
                    <div class="stock-info in-stock">
                        <p class="availability">Availability: 
                            @if($productDetails->product_quantity > 0)
                                <b>In Stock</b>
                            @else
                                <b>Out Of Stock</b>
                            @endif    
                        </p>
                    </div>
                    
                   <!-- @if($productDetails->product_size)
                   <div class="widget mercado-widget filter-widget">
						<h2 class="widget-title">Size</h2>
						<div class="widget-content">
							<ul class="list-style inline-round ">
                            @foreach($productDetails->product_size as $size)
                                <li class="list-item"><a class="filter-link active" href="#">{{$size}}</a></li>
                            @endforeach
							</ul>
						</div>
					</div>
                   @endif -->
                    
                    <div style="margin-bottom:20px" class="quantity">
                            	<span>Quantity:</span>
								<div class="quantity-input">
									<input type="text" name="product-quatity" value="1" data-max="120" pattern="[0-9]*" >
									
									<a class="btn btn-reduce" href="#"></a>
									<a class="btn btn-increase" href="#"></a>
								</div>
					</div>
                    <span >Select color & size :</span>
                    <div style="margin-top:20px;">
                           
                           <select  style="width:130px" name="product_color">
                            @foreach($productDetails->product_color as $color)
                                <option vlaue="{{$color}}" >{{$color}}</option>
                            @endforeach
                                
                           </select>  
                           <select style="width:130px" name="product_size">
                           @foreach($productDetails->product_size as $size)
                                <option value="{{$size}}" >{{$size}}</option>
                            @endforeach
                           </select>     
                    </div>
                    <div class="wrap-butons">
                        <button style class="btn add-to-cart">Add to Cart</button>
                        <div class="wrap-btn">
                            <a href="#" class="btn btn-compare">Add Compare</a>
                            <a href="{{url('/add-wishlist/'.$productDetails->id)}}" class="btn btn-wishlist">Add Wishlist</a>
                        </div>
                    </div>
                </div>
                </form>
                <div class="advance-info">
                    <div class="tab-control normal">
                        <a href="#description" class="tab-control-item active">Short Description</a>
                        <a href="#add_infomation" class="tab-control-item">Long Description</a>
                        <a href="#review" class="tab-control-item">Reviews & Comments</a>
                    </div>
                    <div class="tab-contents">
                        <div class="tab-content-item active" id="description">
                            <p>{{$productDetails->product_short_description}}</p>
                        </div>
                        <div class="tab-content-item " id="add_infomation">
                            <p>{{$productDetails->product_logn_description}}</p>
                        </div>
                        <div class="tab-content-item " id="review">
                            
                            <div class="wrap-review-form">
                                
                                <div id="comments">
                                    <ol class="commentlist">
                                        <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1" id="li-comment-20">
                                            @foreach($review as $reviews)
                                            <div id="comment-20" class="comment_container"> 
                                                <img alt="" src="{{asset($reviews->image)}}" height="80" width="80">
                                                <div class="comment-text">
                                                    <div class="product-rating">
                                                    @for($i =1; $i<= $reviews->rating; $i++)
                                                       <i class="fa fa-star" aria-hidden="true" style="color:gold"></i>
                                                     @endfor

                                                    @for( $j = $reviews->rating+1; $j <= 5; $j++)
                                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                                    @endfor
                                                    </div>
                                                    <p class="meta"> 
                                                        <strong class="woocommerce-review__author">{{$reviews->name}}</strong> 
                                                        <span class="woocommerce-review__dash">–</span>
                                                        <time class="woocommerce-review__published-date" datetime="2008-02-14 20:00" >{{$reviews->created_at}}</time>
                                                    </p>
                                                    <div class="description">
                                                        <p>{{$reviews->comment}}</p>
                                                    </div>
                                                    <p><button style="background:#FFFFFF;border:none" onClick="replyDiv()">Reply</button></p>
                                                    

                                                    <div id="replyDIV" class="comment-respond" hidden > 

                                                        <form action="{{url('/comment-submited/'.$productDetails->id)}}" method="POST" class="comment-form" novalidate="">
                                                            @csrf
                                                            <p class="comment-form-comment">
                                                                <input type="text" name="parent_id" value="{{$reviews->id}}" hidden />
                                                                <label for="comment">Relpy <span class="required">*</span>
                                                                </label>
                                                                <textarea id="comment" name="comment" cols="45" rows="4"></textarea>
                                                            </p>
                                                            <p class="form-submit">
                                                                <input style="background:#FF2832;border:none;color:white" name="submit" type="submit" id="submit" class="submit" value="Submit">
                                                            </p>
                                                        </form>

                                                        </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </li>
                                    </ol>
                                </div><!-- #comments -->

                                <div id="review_form_wrapper">
                                    <div id="review_form">
                                        <div id="respond" class="comment-respond"> 

                                            <form action="{{url('/comment-submited/'.$productDetails->id)}}" method="POST" class="comment-form" novalidate="">
                                                @csrf
                                                <div class="comment-form-rating">
                                                    <span>Your rating</span>
                                                    <p class="stars">
                                                        
                                                        <label for="rated-1"></label>
                                                        <input type="radio" id="rated-1" name="rating" value="1">
                                                        <label for="rated-2"></label>
                                                        <input type="radio" id="rated-2" name="rating" value="2">
                                                        <label for="rated-3"></label>
                                                        <input type="radio" id="rated-3" name="rating" value="3">
                                                        <label for="rated-4"></label>
                                                        <input type="radio" id="rated-4" name="rating" value="4">
                                                        <label for="rated-5"></label>
                                                        <input type="radio" id="rated-5" name="rating" value="5" checked="checked">
                                                    </p>
                                                </div>
                                                <p class="comment-form-comment">
                                                    <label for="comment">Comments <span class="required">*</span>
                                                    </label>
                                                    <textarea id="comment" name="comment" cols="45" rows="6"></textarea>
                                                </p>
                                                <p class="form-submit">
                                                    <input name="submit" type="submit" id="submit" class="submit" value="Submit">
                                                </p>
                                            </form>

                                        </div><!-- .comment-respond-->
                                    </div><!-- #review_form -->
                                </div><!-- #review_form_wrapper -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end main products area-->

        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
            <div class="widget widget-our-services ">
                <div class="widget-content">
                    <ul class="our-services">

                        <li class="service">
                            <a class="link-to-service" href="#">
                                <i class="fa fa-truck" aria-hidden="true"></i>
                                <div class="right-content">
                                    <b class="title">Free Shipping</b>
                                    <span class="subtitle">On Oder Over $99</span>
                                    <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                                </div>
                            </a>
                        </li>

                        <li class="service">
                            <a class="link-to-service" href="#">
                                <i class="fa fa-gift" aria-hidden="true"></i>
                                <div class="right-content">
                                    <b class="title">Special Offer</b>
                                    <span class="subtitle">Get a gift!</span>
                                    <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                                </div>
                            </a>
                        </li>

                        <li class="service">
                            <a class="link-to-service" href="#">
                                <i class="fa fa-reply" aria-hidden="true"></i>
                                <div class="right-content">
                                    <b class="title">Order Return</b>
                                    <span class="subtitle">Return within 7 days</span>
                                    <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div><!-- Categories widget-->

            <div class="widget mercado-widget widget-product">
                <h2 class="widget-title">Popular Products</h2>
                <div class="widget-content">
                    <ul class="products">
                       @foreach($populer_product as $products)
                        <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="{{url('/product-details/'.$products->id)}}" >
                                            <figure><img src="{{asset($products->product_image)}}" alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>{{$products->product_name}}</span></a>
                                        <div class="wrap-price"><span class="product-price">{{$products->product_sale_price}}</span></div>
                                    </div>
                                </div>
                            </li>
                       @endforeach

                    </ul>
                </div>
            </div>

        </div><!--end sitebar-->

        <div class="single-advance-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="wrap-show-advance-info-box style-1 box-in-site">
                <h3 class="title-box">Related Products</h3>
                <div class="wrap-products">
                    <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >

                       @foreach($releted_category as $releted_category)
                       <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="{{url('product-details/'.$releted_category->id)}}" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{asset($releted_category->product_image)}}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item new-label">new</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>{{$releted_category->product_name}}</span></a>
                                <div class="wrap-price"><ins><p class="product-price">{{$releted_category->product_reguler_price}}</p></ins> <del><p class="product-price">{{$releted_category->product_sale_price}}</p></del></div>
                            </div>
                        </div>
                       @endforeach
                    </div>
                </div><!--End wrap-products-->
            </div>
        </div>

    </div><!--end row-->

</div><!--end container-->
<script>
function replyDiv() {
  var x = document.getElementById("replyDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>
</main>
@include('user.base.footer')
