@extends('layouts.front.auth')

@section('content')
<div class="container-xxl py-5">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Login</h1>
        <form action="{{ route('login_custmer_post') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="email" name="email" class="form-control" id="email" placeholder="Your Email" value="{{ old('email') }}">
                        <label for="email">Email</label>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Your Password">
                        <label for="password">Password</label>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <a href="{{ route('register_custmer') }}">register</a>
                <div class="col-12">
                    <button class="btn btn-primary w-100 py-3" type="submit">Login</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
