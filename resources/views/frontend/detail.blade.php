<x-frontend>

	@php

		$id = $item->id;
		$codeno = $item->codeno;
		$name = $item->name;

		$unitprice = $item->price;
		$discount = $item->discount;

		$photos = json_decode($item->photo);
		$singlePhoto = $photos[0];


		$description = $item->description;
		$brand = $item->brand->name;

	@endphp


	<!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg subtitle">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2> {{ $item->codeno }} </h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="{{ asset($singlePhoto) }}" alt="">
                        </div>
                        <div class="product__details__pic__slider owl-carousel">

							@foreach($photos as $photo)
                            	<img data-imgbigurl="{{ asset($photo) }}"
                                src="{{ asset($photo) }}" alt="">
                            @endforeach
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3> {{ $item->name  }}</h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 reviews)</span>
                        </div>
                        <div class="product__details__price">
                        	@if($discount)
                            	<span> {{ $discount }} Ks  </span>
                            	<del class="text-muted" style="font-size: 18px;">
                            		{{ $unitprice }} Ks
                            	</del>
                            @else
                            	<span>{{ $unitprice }} Ks</span>
                            @endif

                        </div>
                        <p> {!! $description !!} </p>
                        <a href="javascript:void(0)" data-id="{{ $id }}" data-name="{{ $name }}" data-codeno="{{ $codeno }}" data-unitiprice="{{ $unitprice }}" data-discount="{{ $discount }}" data-photo="{{ $photo }}" class="primary-btn addtocartBtn">ADD TO CARD</a>
                        <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                        <ul>
                            <li><b>Brand : </b> <span> {{ $brand }} </span></li>
                            
                            <li><b>Share on</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->


</x-frontend>