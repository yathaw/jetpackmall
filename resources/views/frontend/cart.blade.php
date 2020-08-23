<x-frontend>

	@if(Auth::check())
    	@php

		    $deliveryTownship = Auth::user()->township->name;
		    $deliveryPrice = Auth::user()->township->price;

	    @endphp


	@endif

	<!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg subtitle">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container shoppingcart_div">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <textarea class="form-control mb-5" placeholder="Note" rows="4" cols="50" id="note"></textarea>
                    <a href="{{ route('index') }}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li> Subtotal <span class="shoppingcartTotal"></span></li>
                            <li> Delivery <small> ( {{ $deliveryTownship }} ) </small> 
                            	<span> {{ number_format($deliveryPrice) }} Ks </span>
                            </li>

                            <li>Total <span class="totality"></span></li>
                        </ul>
                        <a href="javascript:void(0)" class="primary-btn checkoutBtn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container noneshoppingcart_div">
        	<div class="row">
        		<div class="col-12 text-center">
        			<img src="{{ asset('no-shopping-cart.png') }}" class="img-fluid d-inline-block" style="width: 80px; height: 80px; object-fit: cover;">
        			<h3 class="d-inline-block mx-2"> There are no items in this cart </h3>
        		</div>
        		<div class="col-12 text-center mt-3">
        			<a href="{{ route('index') }}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
        		</div>
        	</div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->


</x-frontend>