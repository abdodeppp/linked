@extends('layouts.front.app')
@section('content')

        <!-- Job Detail Start -->
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="row gy-5 gx-4">
                    <div class="col-lg-8">
                        <div class="d-flex align-items-center mb-5">
                            <img class="flex-shrink-0 img-fluid border rounded" src="{{$job->image_path}}" alt="" style="width: 80px; height: 80px;">
                            <div class="text-start ps-4">
                                <h3 class="mb-3">{{$job->name}}</h3>
                                <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{$job->location}}</span>
                                <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{$job->type}}</span>
                                <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>{{$job->price_from}} - {{$job->price_to}}</span>
                            </div>
                        </div>

                        <div class="mb-5">
                            <h4 class="mb-3">Job description</h4>
                            {!! $job->description !!}
                        </div>

                        <div class="">
                            <h4 class="mb-4">Apply For The Job</h4>
                            <form action="{{ route('job_accept_post',$job->id) }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row g-3">
                                    <div class="col-12 col-sm-6">
                                        <input type="text" class="form-control" name="phone" placeholder="Your phone">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input type="number" class="form-control"  name="experience" placeholder="experience">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input type="number" class="form-control"  name="notice_period" placeholder="notice_period">
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Apply Now</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Job Detail End -->
@endsection
