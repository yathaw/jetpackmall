<x-frontend>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg subtitle">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2> Sign Up </h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Contact Form Begin -->
    <div class="contact-form spad">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-8">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="small mb-1" for="inputName"> Name</label>
                                    <input class="form-control py-4" id="inputName" type="text" placeholder="Enter Name" name="name" autofocus="" value="{{ old('name') }}"/>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="small mb-1" for="phone">Phone Number</label>
                                    <input class="form-control py-4" id="phone" type="text" placeholder="Enter Phone Number" name="phone" value="{{ old('phone') }}"/>

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label class="small mb-1 col-12" for="township"> Township </label>
                                <div class="col-12">
                                    <select class="form-control" name="township">
                                        <option> Choose Township </option>

                                        @foreach($data[2] as $township)
                                            <option value="{{ $township->id }}"> {{ $township->name }} </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="small mb-1" for="inputEmailAddress">Email</label>
                            <input class="form-control py-4" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter email address" name="email" />
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label class="small mb-1" for="inputPassword">Password</label>
                                  <input class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password" name="password" />
                                  <font id="error" color="red"></font>
                                </div>


                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label class="small mb-1" for="inputConfirmPassword">Confirm Password</label>
                                  <input class="form-control py-4" id="inputConfirmPassword" type="password" placeholder="Confirm password" />
                                  <font id="cerror" color="red"></font>

                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="small mb-1" for="address"> Address </label>
                            <textarea class="form-control" name="address"> {{ old('address') }} </textarea>

                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="text-center">
                            
                            <button type="submit" class="site-btn"> Create Account </button>
                        </div>
                    </form>

                    <div class=" mt-3 text-center ">
                        <a href="{{ route('login') }}" class="text-dark text-decoration-none">Have an account? Go to login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Form End -->

</x-frontend>