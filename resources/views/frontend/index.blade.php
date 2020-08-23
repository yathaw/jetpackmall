<x-frontend>

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                	@foreach($categories as $category)
	                    <div class="col-lg-3">
	                        <div class="categories__item set-bg" data-setbg="{{ asset($category->photo) }}">
	                            <h5><a href="#">{{ $category->name }}</a></h5>
	                        </div>
	                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Banner Begin -->
    <div class="banner mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 brandTwo">
                    <div class="row">
                        <div class="col-4">
                            <img src="{{ asset($data[2][1]->logo) }}" class="img-fluid py-5 brandLogo">
                        </div>
                        <div class="col-8">
                            <h2 class="my-5"> {{ $data[2][1]->name }} </h2>
                            <a href="{{ route('brand',$data[2][1]->id) }}" class="primary-btn">SHOP NOW</a>
                            
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 brandThree">
                    <div class="row">
                        <div class="col-4">
                            <img src="{{ asset($data[2][2]->logo) }}" class="img-fluid py-5 brandLogo">
                        </div>
                        <div class="col-8">
                            <h2 class="my-5"> {{ $data[2][2]->name }} </h2>
                            <a href="{{ route('brand',$data[2][2]->id) }}" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Latest Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                            	@foreach($latestitems as $latestitem)
								
								@php

									$photos = json_decode($latestitem->photo);

									$photo = $photos[0];

									$latest_unitprice = $latestitem->price;
									$latest_discountprice = $latestitem->discount;

								@endphp

                                <a href="{{ route('detail',$latestitem->id) }}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset($photo) }}" alt="" style="width: 150px;height: 150px; object-fit: cover;">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6> {{ Str::limit($latestitem->name, 20) }} </h6>
                                        @if($latest_discountprice)
                                        	<span> {{ $latest_discountprice }} Ks  </span>
                                        	<del class="text-muted">
                                        		{{ $latest_unitprice }} Ks
                                        	</del>
                                        @else
                                        	<span>{{ $latest_unitprice }} Ks</span>
                                        @endif
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Rated Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                            	@foreach($topitems as $topitem)
                            	@php

									$photos = json_decode($topitem->photo);

									$photo = $photos[0];

									$top_unitprice = $topitem->price;
									$top_discountprice = $topitem->discount;
								@endphp

                                <a href="{{ route('detail',$topitem->id) }}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset($photo) }}" alt="" style="width: 150px;height: 150px; object-fit: cover;">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6> {{ Str::limit($topitem->name, 20) }} </h6>
                                        @if($top_discountprice)
                                        	<span> {{ $top_discountprice }} Ks  </span>
                                        	<del class="text-muted">
                                        		{{ $top_unitprice }} Ks
                                        	</del>
                                        @else
                                        	<span>{{ $top_unitprice }} Ks</span>
                                        @endif
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4> Discount Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                            	@foreach($discountitems as $discountitem)
                            	@php

									$photos = json_decode($discountitem->photo);

									$photo = $photos[0];

									$discount_unitprice = $discountitem->price;
									$discount_discountprice = $discountitem->discount;
								@endphp

                                <a href="{{ route('detail',$discountitem->id) }}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset($photo) }}" alt="" style="width: 150px;height: 150px; object-fit: cover;">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6> {{ Str::limit($discountitem->name, 20) }} </h6>
                                        @if($discount_discountprice)
                                        	<span> {{ $discount_discountprice }} Ks  </span>
                                        	<del class="text-muted">
                                        		{{ $discount_unitprice }} Ks
                                        	</del>
                                        @else
                                        	<span>{{ $discount_unitprice }} Ks</span>
                                        @endif
                                    </div>
                                </a>

                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->
</x-frontend>