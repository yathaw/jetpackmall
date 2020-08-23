<x-frontend>
	
	<!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg subtitle">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2> {{ $subcategory->name }} </h2>
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
                <div class="col-lg-4 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Department</h4>
                            <ul class="list-group">
                            	@foreach($subcategories as $subcategory
                            		)
                                
                                <li class="list-group-item {{ Request::segment(2) ==$subcategory->id ? 'active' :'' }}">
                                	<a href="{{ route('subcategory',$subcategory->id) }}"> {{ $subcategory->name }} </a>
                                </li>


                                @endforeach
                            </ul>
                        </div>

                        <div class="sidebar__item">
                            <div class="latest-product__text">
                                <h4>Latest Products</h4>
                                <div class="latest-product__slider owl-carousel">
                                    <div class="latest-prdouct__slider__item">
                                    	@foreach($latestitems as $latestitem)

                                    	@php
				                            $id = $latestitem->id;
				                            $codeno = $latestitem->codeno;
				                            $name = $latestitem->name;

				                            $latest_unitprice = $latestitem->price;
				                            $latest_discount = $latestitem->discount;

				                            $photos = json_decode($latestitem->photo);
				                            $subcategory = $latestitem->subcategory->name;

				                            $photo = $photos[0];

				                        @endphp


                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="{{ asset($photo) }}" alt="" style="width: 150px;height: 150px; object-fit: cover;">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6> {{ Str::limit($name, 20) }} </h6>
                                                @if($latest_discount)
		                                        	<span> {{ $latest_discount }} Ks  </span>
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
                    </div>
                </div>
                <div class="col-lg-8 col-md-7">
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
                                    <h6><span> {{ $count_result }}</span> Products found</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        
                        @if($subcategoryitems->count() > 0)

                    	@foreach($subcategoryitems as $subcategoryitem)
                        @php
                            $id = $subcategoryitem->id;
                            $codeno = $subcategoryitem->codeno;
                            $name = $subcategoryitem->name;

                            $unitprice = $subcategoryitem->price;
                            $discount = $subcategoryitem->discount;

                            $photos = json_decode($subcategoryitem->photo);
                            $subcategory = $subcategoryitem->subcategory->name;

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
                                            <a href="javascript:void(0)" class="addtocartBtn" data-id="{{ $id }}" data-name="{{ $name }}" data-codeno="{{ $codeno }}" data-unitiprice="{{ $unitprice }}" data-discount="{{ $discount }}" data-photo="{{ $photo }}"><i class="fa fa-shopping-cart"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product__discount__item__text">
                                    <h5>
                                    	<a href="{{ route('detail',$id) }}"> 
                                    		{{ Str::limit($name, 20) }}
                                    	</a>
                                    </h5>
                                    @if($discount)
	                                    <div class="product__item__price">
	                                        {{ $discount }} Ks
	                                        <span> {{ $unitprice }} Ks </span>
	                                    </div>
	                                @else
	                                    <div class="product__item__price">
	                                        {{ $unitprice }} Ks
	                                    </div>
	                                @endif
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
                    
                    {!! $subcategoryitems->links() !!}

                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

</x-frontend>