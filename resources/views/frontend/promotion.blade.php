<x-frontend>
	
	<!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg subtitle">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2> Promotion </h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Sort By</span>
                                    <select>
                                        <option value="0"> A - Z </option>
                                        <option value="0"> Z - A </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6><span>{{ $count_result }}</span> Products found</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @if($discountitems->count() > 0)


                    	@foreach($discountitems as $discountitem)
                    		@php
                    			$id = $discountitem->id;
                    			$codeno = $discountitem->codeno;
                    			$name = $discountitem->name;

                    			$unitprice = $discountitem->price;
								$discount = $discountitem->discount;

								$photos = json_decode($discountitem->photo);

								$photo = $photos[0];

							@endphp

	                        <div class="col-lg-4 col-md-6 col-sm-6">
	                            <div class="product__item">
	                                <div class="product__item__pic set-bg" data-setbg="{{ asset($photo) }}">
	                                    <ul class="product__item__pic__hover">
	                                        <li>
                                                <a href="{{ route('detail',$id) }}"><i class="fa fa-eye"></i></a>
                                            </li>
	                                        
	                                        <li>
                                                <a href="javascript:void(0)" class="addtocartBtn" data-id="{{ $id }}" data-name="{{ $name }}" data-codeno="{{ $codeno }}" data-unitiprice="{{ $unitprice }}" data-discount="{{ $discount }}" data-photo="{{ $photo }}">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </a>
                                            </li>
	                                    </ul>
	                                </div>
	                                <div class="product__discount__item__text">
	                                    <h5>
                                            <a href="{{ route('detail',$id) }}">
                                                {{ Str::limit($name, 20) }}
                                            </a>
                                        </h5>
	                                    <div class="product__item__price">
	                                    	{{ $discount }} Ks
	                                    	<span> {{ $unitprice }} Ks </span>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
                        @endforeach

                        @else

                            <div class="col-12">
                                <img src="{{ asset('no_products_found.png') }}" class="img-fluid">
                            </div>
                        @endif
                    </div>
                    
                    {!! $discountitems->links() !!}
                        
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

</x-frontend>