<style>
	/* Success Alert */
.alert-success {
    background-color: #4CAF50;
    color: white;
    padding: 10px;
    border-radius: 4px;
    margin-bottom: 10px;
}

/* Error Alert */
.alert-error {
    background-color: #f44336;
    color: white;
    padding: 10px;
    border-radius: 4px;
    margin-bottom: 10px;
}

/* Info Alert */
.alert-info {
    background-color: #2196F3;
    color: white;
    padding: 20px;
    border-radius: 4px;
    margin-bottom: 10px;}

	/* Define styles for the quantity-input class */
.quantity-input {
    width: 100px; /* Set the width of the input field */
    padding: 5px; /* Add some padding around the input */
    border: 1px solid #ccc; /* Add a border */
    border-radius: 5px; /* Add rounded corners */
    outline: none; /* Remove the default input focus outline */
    font-size: 16px; /* Set the font size */
}

/* Add hover and focus styles for the input */
.quantity-input:hover,
.quantity-input:focus {
    border-color: #007bff; /* Change the border color on hover and focus */
}



</style>
 @extends('Frontend.master')
@section('content')
<div class="py-5">
	<div class="cotainer-fluid mt-3">
    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span class="fa fa-times"></span>
        </button>
    </div>
    @endif
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <!-- Success message or content goes here -->
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span class="fa fa-times"></span>
        </button>
    </div>
    @endif
</div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">               
                    <div class="product-sec1">
                        @foreach ($products as $product)
                        <div class="col-xs-4 product-men">
                            <div class="men-pro-item simpleCart_shelfItem">
                                <div class="men-thumb-item">
                                    @if (!empty($product->images) && is_array($product->images))
                                        <img src="{{ asset('images/' . $product->images[0]) }}" alt="" width="120px" height="120px">
                                    @endif
                                    <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                            <a href="{{ url('detail_product/'.$product->id) }}" class="link-product-add-cart">{{ $product->name }}</a>
                                        </div>
                                    </div>
                                    <span class="product-new-top"> 
                                        @if ($product->trending == 1)
                                            Popular
                                        @else   
                                            Simple
                                        @endif
                                    </span>
                                </div>
                                <div class="item-info-product">
                                    <h4>
                                        <a href="single.html">{{ $product->category->name }}</a>
                                    </h4>
                                    <div class="info-product-price">
                                        <span class="item_price">${{ $product->selling_price }}</span>
                                        <del>${{ $product->selling_price+20 }}</del>
                                    </div>
                                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                        <form action="{{ route('addcart.index', ['id' => $product->id]) }}" method="POST">
                                            @csrf
                                            <input type="number" name="qty" min="1" class="quantity-input"> <!-- Quantity input -->
                                            <input type="submit" name="submit" value="Add to cart" class="button" style="margin-top: 20px;">
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
