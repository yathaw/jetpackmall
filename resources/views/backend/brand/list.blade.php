<x-backend>
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1> <i class="icofont-list"></i> Brand </h1>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <a href="{{ route('backside.brand.create') }}" class="btn btn-outline-primary">
                    <i class="icofont-plus icofont-1x"></i>
                </a>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        
                        @if(session("successMsg") != NULL )
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong> SUCCESS!</strong> 
                                {{ session("successMsg") }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                        @endif

                        <div class="table-responsive">
                            <table class="table table-hover table-bordered table-striped" id="sampleTable">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>


                                @php $i=1; @endphp

                                @foreach($brands as $row)

                                @php

                                    $id = $row->id;
                                    $name = $row->name;
                                    $logo = $row->logo;

                                @endphp


                                    <tr>
                                        <td> {{ $i++ }} </td>
                                        <td>
                                            <img src="{{asset($logo)}}" class="img-fluid" style="width: 70px;">
                                            {{ $name }}
                                        </td>
                                        <td>
                                            <a href="{{route('backside.brand.edit',$id)}}" class="btn btn-warning">
                                                <i class="icofont-ui-settings icofont-1x"></i>
                                            </a>

                                            
                                            <form class="d-inline-block" method="post" action="{{route('backside.brand.destroy',$id)}}" onsubmit="return confirm('Are you sure?')">

                                                @csrf
                                                @method('DELETE')

                                                <button type="button" class="btn btn-outline-danger" >
                                                    <i class="icofont-close icofont-1x"></i>
                                                    
                                                </button>
                                            </form>
                                        </td>

                                    </tr>

                                @endforeach

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


</x-backend>