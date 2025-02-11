@extends('Frontend.master')
@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
               <div class="row">
               
                   <div class="product-sec1">
                     @foreach ($category as $cate)
						<div class="col-xs-4 product-men">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item">
									<img src="images/k1.jpg" alt="">
									<div class="men-cart-pro">
										<div class="inner-men-cart-pro">
											<a href="single.html" class="link-product-add-cart">{{ $cate->name }}</a>
										</div>
									</div>
									<span class="product-new-top"> 
                                    @if ($cate->popular =1)
                                       Popular
                                        @else   
                                       Simple
                                    @endif

                                   </span>
								</div>
								<div class="item-info-product ">
									<h4>
										<a href="single.html">{{ $cate->name }}</a>
									</h4>
									<div class="info-product-price">
										<span class="item_price">$950.00</span>
										<del>$1020.00</del>
									</div>
									<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
										<form action="#" method="post">
											<fieldset>
												{{-- <input type="hidden" name="cmd" value="_cart">
												<input type="hidden" name="add" value="1">
												<input type="hidden" name="business" value=" ">
												<input type="hidden" name="item_name" value="Zeeba Basmati Rice - 5 KG">
												<input type="hidden" name="amount" value="950.00">
												<input type="hidden" name="discount_amount" value="1.00">
												<input type="hidden" name="currency_code" value="USD">
												<input type="hidden" name="return" value=" ">
												<input type="hidden" name="cancel_return" value=" "> --}}
                                                <a href="{{ url('view-category/'.$cate->slug) }}">
												<input type="button" value="View all product" class="button">
                                                </a>
											</fieldset>
										</form>
									</div>

								</div>
							</div>
						</div>	
                          @endforeach 			
						<div class="clearfix"></div>
                       
					</div>
              
               </div>
            </div>
        </div>
    </div>
</div>
<h1></h1>


@endsection
