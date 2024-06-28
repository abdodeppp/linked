@extends('layouts.front.app')
@section('content')

        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="row g-0 about-bg rounded overflow-hidden">
                            <div class="col-6 text-start">
                                <img class="img-fluid w-100" src="{{asset('front/img/about-1.jpg')}}">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid" src="{{asset('front/img/about-2.jpg')}}" style="width: 85%; margin-top: 15%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid" src="{{asset('front/img/about-3.jpg')}}" style="width: 85%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid w-100" src="{{asset('front/img/about-4.jpg')}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                        <h1 class="mb-4">We Help To Get The Best Job And Find A Talent</h1>
                        <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Tempor erat elitr rebum at clita</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Aliqu diam amet diam et eos</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Clita duo justo magna dolore erat amet</p>
                        <a class="btn btn-primary py-3 px-5 mt-3" href="{{route('contact')}}">CONTACT</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


        <!-- Jobs Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Listing</h1>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                    <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill" href="#tab-1">
                                <h6 class="mt-n1 mb-0">Featured</h6>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#tab-2">
                                <h6 class="mt-n1 mb-0">Full Time</h6>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill" href="#tab-3">
                                <h6 class="mt-n1 mb-0">Part Time</h6>
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            @foreach ($jobs as $job)
                            <div class="job-item p-4 mb-4">
                                <div class="row g-4">
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid border rounded" src="{{$job->image_path}}" alt="" style="width: 80px; height: 80px;">
                                        <div class="text-start ps-4">
                                            <h5 class="mb-3">{{$job->name}}</h5>
                                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{$job->location}}</span>
                                            <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{$job->type}}</span>
                                            <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>{{$job->price_from}} - {{$job->price_to}}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                        @if( Auth::guard('custmer')->user() && Auth::guard('custmer')->user()->type != 'company')

                                        <div class="d-flex mb-3">
                                            <a class="btn btn-primary" href="{{route('job_details',$job->id)}}">Apply Now</a>
                                        </div>
                                        @endif
                                        <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date Line: @isset($job->created_at)
                                            {{ $job->created_at->format('Y-m-d') }}
                                        @else
                                            N/A
                                        @endisset</small>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div id="tab-2" class="tab-pane fade show p-0 ">
                            @foreach ($jobs as $job)
                            @if($job->type=='Full Time')
                            <div class="job-item p-4 mb-4">
                                <div class="row g-4">
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid border rounded" src="{{$job->image_path}}" alt="" style="width: 80px; height: 80px;">
                                        <div class="text-start ps-4">
                                            <h5 class="mb-3">{{$job->name}}</h5>
                                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{$job->location}}</span>
                                            <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{$job->type}}</span>
                                            <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>{{$job->price_from}} - {{$job->price_to}}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                        @if( Auth::guard('custmer')->user() && Auth::guard('custmer')->user()->type != 'company')

                                        <div class="d-flex mb-3">
                                            <a class="btn btn-primary" href="{{route('job_details',$job->id)}}">Apply Now</a>
                                        </div>
                                        @endif
                                        <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date Line: @isset($job->created_at)
                                            {{ $job->created_at->format('Y-m-d') }}
                                        @else
                                            N/A
                                        @endisset</small>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                        <div id="tab-3" class="tab-pane fade show p-0 ">
                            @foreach ($jobs as $job)
                            @if($job->type=='Part Time')
                            <div class="job-item p-4 mb-4">
                                <div class="row g-4">
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid border rounded" src="{{$job->image_path}}" alt="" style="width: 80px; height: 80px;">
                                        <div class="text-start ps-4">
                                            <h5 class="mb-3">{{$job->name}}</h5>
                                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{$job->location}}</span>
                                            <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{$job->type}}</span>
                                            <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>{{$job->price_from}} - {{$job->price_to}}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                        @if( Auth::guard('custmer')->user() && Auth::guard('custmer')->user()->type != 'company')

                                        <div class="d-flex mb-3">
                                            <a class="btn btn-primary" href="{{route('job_details',$job->id)}}">Apply Now</a>
                                        </div>
                                        @endif
                                        <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date Line: @isset($job->created_at)
                                            {{ $job->created_at->format('Y-m-d') }}
                                        @else
                                            N/A
                                        @endisset</small>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jobs End -->



@endsection
