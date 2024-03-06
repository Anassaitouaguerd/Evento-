@extends('front-office.Organisateure.layout.tags_html')
@section('title' , 'Create Event')
@section('content')
<div class="mt-2 mb-md-4">

    <a href="/organisateur/Event/Add" class="btn btn-primary mt-2 stretched-link px-3"><i class=" ri-heart-add-fill p-1"></i>Add New Event</a>
</div>

<div class="row">
    @foreach ($myEvents as $event)
        
    <div class="col-sm-6 col-lg-3">
        <div class="card">
            <img src="/organisateur/assets/images/small/small-2.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$event->name}}</h5>
                <div class="d-flex justify-content-between align-items-center">
                    <a href="#" class="btn btn-primary mt-2 stretched-link">Edit</a>
                    <a href="#" class="btn btn-danger mt-2 stretched-link">Delete</a>
                </div>
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div> <!-- end col-->
</div>
    @endforeach
<!-- end row -->
@endsection