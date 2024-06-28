@extends('layouts.front.auth')
@section('content')

        <!-- Contact Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Register</h1>
                <form action="{{ route('register_custmer_post') }}" method="post" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    {{ method_field('post') }}

                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control"  name="name" placeholder="Your Name">
                                <label for="name">Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Your Email">
                                <label for="name">Email</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Your Password">
                                <label for="email">Password</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <select class="form-select border-0 form-control" name="type">
                                <option selected>type</option>
                                <option value="company">Company</option>
                                <option value="student">Student</option>
                            </select>
                        </div>
                        <a href="{{route('login_custmer')}}">login</a>
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" type="submit">register</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Contact End -->
@endsection
