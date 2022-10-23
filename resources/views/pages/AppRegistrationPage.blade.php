@extends('layouts/MasterLayout')
@section('title')
    SSO Service Home
@endsection

<style>
    .signup-form {
        width: 450px;
        margin: 0 auto;
        padding: 30px 0;
        font-size: 15px;
    }
</style>

@section('content')
    <section class="pricing-section pricing-style-2 bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-5 col-xl-5 col-lg-7 col-md-10">
                    <div class="section-title text-center mb-60">
                        <h3 class="mb-15">Register Your App Now</h3>
                        <p>Provide information</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="signup-form">
                        <form action="{{route('SSO.REGISTER.PROCESS')}}" method="post">
                            @csrf
                
                            
                            <div class="form-group mb-3">
                                <input type="text" 
                                class="form-control" 
                                name="title" 
                                @if(!old('title'))
                                    placeholder="My Awesome Project"
                                @else
                                    value="{{ old('title') ?? 'My Awesome Project' }}"
                                @endif
                                required="required">
                            </div>

                            <div class="form-group mb-3">
                                <input type="text" 
                                class="form-control" 
                                name="base_url" 
                                @if(!old('base_url'))
                                    placeholder="https://example.com" 
                                @else
                                    value="{{ old('base_url') ?? '' }}"
                                @endif
                        
                                >
                            </div>

                            <div class="form-group mb-3">
                                <input type="text" 
                                class="form-control" 
                                name="private_key" placeholder="Length 32 Private Key"
                                value="{{old('private_key') ?? $suggestedPrivateKey}}"
                                readonly
                                required="required">
                                <p class="mt-2 text-danger">
                                    Store this private key. This is case sensitive.
                                </p>
                            </div>
                            

                            <select class="form-select mb-3" name="sdk" required>
                                <option value="{{old('sdk') ?? 'Select SDK'}}">{{old('sdk') ?? 'Select SDK'}}</option>
                                <option value="Web">Web</option>
                                <option value="Mobile">Mobile</option>
                                
                              </select>

                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-success btn-lg btn-block">
                                    Register App
                                </button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
