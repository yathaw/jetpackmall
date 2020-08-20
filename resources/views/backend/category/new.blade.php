<x-backend>
	
	<main class="app-content">
        <div class="app-title">
            <div>
                <h1> <i class="icofont-list"></i> Category Form </h1>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <a href="{{ route('backside.category.index') }}" class="btn btn-outline-primary">
                    <i class="icofont-double-left icofont-1x"></i>
                </a>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <form action="{{ route('backside.category.store') }}" method="POST" enctype="multipart/form-data">

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
                                <label for="photo_id" class="col-sm-2 col-form-label"> Photo </label>
                                    <div class="col-sm-10">
                                        <input type="file" id="photo_id" name="photo">
                                        <div class="text-danger form-control-feedback">
                                            {{ $errors->first('photo') }}
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