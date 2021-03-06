<x-backend>

	<main class="app-content">
        <div class="app-title">
            <div>
                <h1> <i class="icofont-list"></i> User </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                    	@if(session('successMsg') != NULL)
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong> ✅ SUCCESS!</strong>
                                {{ session('successMsg') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered" id="sampleTable">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> Name </th>
                                        <th> Contact </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    
                                    @foreach($customers as $customer)

                                    @php
                                        $id = $customer['id'];
                                        $name = $customer['name'];
                                        $profile = $customer['profile'];
                                        $email = $customer['email'];
                                        $phone = $customer['phone']; 
                                        $address = $customer['address'];
                                    @endphp
                                    <tr>
                                        <td> <?php echo $i++; ?>. </td>
                                        <td>
                                            <div class="d-flex no-block align-items-center">
                                                <div class="mr-3">
                                                    <img src="{{ asset($profile) }}"
                                                        alt="user" class="rounded-circle" width="50"
                                                        height="45" />
                                                </div>
                                                <div class="">
                                                    <h5 class="text-dark mb-0 font-16 font-weight-medium"> {{ $name }} </h5>
                                                    <span class="text-muted font-14">
                                                        {{ $email }}
                                                    </span>
                                                </div>
                                            </div> 
                                        </td>
                                        <td> 
                                            <h5 class="text-dark mb-0 font-16 font-weight-medium"> {{ $phone }} </h5>
                                            <span class="text-muted font-14">
                                                <?= substr($address, 0, 30) . '...'; ?>      
                                            </span>
                                        </td>
                                        <td>

                                            <a href="{{ route('backside.customer/delete',$id) }}" class="btn btn-outline-danger">
                                                <i class="icofont-close"></i>
                                            </a>
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