<x-backend>
	
	<main class="app-content">
        <div class="app-title">
            <div>
                <h1> <i class="icofont-list"></i> Subcategory Form </h1>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <a href="{{ route('backside.subcategory.index') }}" class="btn btn-outline-primary">
                    <i class="icofont-double-left icofont-1x"></i>
                </a>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <form action="{{ route('backside.subcategory.store') }}" method="POST">

                        @csrf
                            
                            <div class="form-group row">
                                <label for="name_id" class="col-sm-2 col-form-label"> Name </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name_id" name="name">
                                    <div class="text-danger form-control-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="photo_id" class="col-sm-2 col-form-label"> Category </label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="categoryid">
                                        <option> Choose Category </option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}"> {{ $category->name }} </option>
                                        @endforeach
                                    </select>
                                    <div class="text-danger form-control-feedback">
                                        {{ $errors->first('categoryid') }}
                                    </div>
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

</x-backend>