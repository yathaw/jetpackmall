<x-backend>
    @php
        $id = $item->id;
        $name = $item->name;
        $codeno = $item->codeno;
        $oldphoto = $item->photo;
        $unitprice = $item->price;
        $discount = $item->discount;
        $description = $item->description;
        $subcategory_id = $item->subcategory_id;
        $brand_id = $item->brand_id;

    @endphp

    <main class="app-content">
        <div class="app-title">
            <div>
                <h1> <i class="icofont-list"></i> Edit Item </h1>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <a href="{{ route('backside.item.index') }}" class="btn btn-outline-primary">
                    <i class="icofont-double-left icofont-1x"></i>
                </a>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <form action="{{ route('backside.item.update',$id) }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            @method('PUT')

                            <input type="hidden" name="oldphoto" value="{{$item->photo}}">
                            <input type="hidden" name="codeno" value="{{ $codeno }}">

                            
                            <div class="form-group row">
                                <label for="photo_id" class="col-sm-2 col-form-label"> Photo </label>
                                <div class="col-sm-10">
                                    <div class="input-images"></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name_id" class="col-sm-2 col-form-label"> Name </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name_id" name="name" value="{{ $name }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name_id" class="col-sm-2 col-form-label"> Price </label>
                                <div class="col-sm-10">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="unitprice-tab" data-toggle="tab" href="#unitpriceTab" role="tab" aria-controls="unitpriceTab" aria-selected="true"> Unit Price </a>
                                        </li>
                                      
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="discount-tab" data-toggle="tab" href="#discountTab" role="tab" aria-controls="discountTab" aria-selected="false"> Discount </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content mt-3" id="myTabContent">
                                        <div class="tab-pane fade show active" id="unitpriceTab" role="tabpanel" aria-labelledby="unitprice-tab">
                                            <input type="number" name="unitprice" class="form-control" value="{{ $unitprice }}">
                                        </div>
                                        
                                        <div class="tab-pane fade" id="discountTab" role="tabpanel" aria-labelledby="discount-tab">
                                            <input type="number" name="discount" class="form-control" value="{{ $discount }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="i_description" class="col-sm-2 col-form-label"> Description </label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="i_description" name="description"> {{ $description }} </textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="photo_id" class="col-sm-2 col-form-label"> Brand </label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="brandid">
                                        <option> Choose Brand </option>
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}" @if($brand_id == $brand->id) {{'selected'}} @endif> {{ $brand->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="photo_id" class="col-sm-2 col-form-label"> Subcategory </label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="subcategoryid">
                                        <option> Choose Subcategory </option>
                                        @foreach($subcategories as $subcategory)
                                            <option value="{{ $subcategory->id }}" @if($subcategory_id == $subcategory->id) {{'selected'}} @endif> {{ $subcategory->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="icofont-save"></i>
                                        Save
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

@section('script_content')

    <script type="text/javascript">
        $(document).ready(function() {

            $('#i_description').summernote();

            var images = JSON.parse('{!! $item->photo !!}');
            var public_path = "{{asset('/')}}";

            console.log(images);
            var imgpre_arr=[];


            for (i = 0; i < images.length; i++) 
            {
                var imgpre_obj={};

                imgpre_obj.id = i;
                imgpre_obj.src = public_path+images[i];

                imgpre_arr.push(imgpre_obj);

            }


            $('.input-images').imageUploader({
               preloaded: imgpre_arr,
               preloadedInputName: 'oldPhoto',
            });

        });
    </script>
@endsection

</x-backend>