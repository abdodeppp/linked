@extends('layouts.front.app')
@section('content')

        <!-- Jobs Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Accept</h1>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            @foreach($jobs as $job)
                            <div class="job-item p-4 mb-4">
                                <div class="row g-4">
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                        <div class="text-start ps-4">
                                            <h5 class="mb-3">{{$job->user_name}}</h5>
                                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{$job->job_name}}</span>
                                            <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>phone: {{$job->phone}}</span>
                                            <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>email: {{$job->email}}</span>
                                            <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>experience: {{$job->experience}}</span>
                                            <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>notice_period: {{$job->notice_period}}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">

                                        <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date Line: {{ $job->created_at->format('Y-m-d') }}</small>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Jobs End -->

@endsection
