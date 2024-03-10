@extends('front-office.Organisateure.layout.tags_html')

@section('title', 'Create Event')

@section('content')
<div class="mt-2 mb-md-4 d-flex align-items-baseline">
    <a href="/organisateur/Event/Add" class="btn btn-primary mt-2 px-3">
        <i class="ri-heart-add-fill p-1"></i>Add New Event
    </a>
    @if (session()->has('success'))
        <p class="ms-5 text-bg-success font-20 text-capitalize rounded-3">{{ session('success') }}</p>
    @endif
</div>

<div class="row">
    @foreach ($myEvents as $event)
    <div class="col-sm-6 col-lg-3">
        @if ($event->status == 'pending')
        <div id="statusEvent" class="bg-warning p-1 text-light-emphasis rounded-1 text-center">
            {{ $event->status }}
        </div>
        @endif
        @if ($event->status == 'rejected')
        <div id="statusEvent" class="bg-danger p-1 text-light-emphasis rounded-1 text-center">
            {{ $event->status }}
        </div>
            
        @endif
        @if ($event->status == 'approved')
        <div id="statusEvent" class="bg-success p-1 text-light-emphasis rounded-1 text-center">
            {{ $event->status }}
        </div>
            
        @endif
        <div class="card">
            <img src="/Uploads/{{ $event->image }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $event->name }}</h5>
                <div class="d-flex justify-content-between align-items-center">
                    <a href="#" class="btn btn-primary mt-2" data-bs-toggle="modal"
                        data-bs-target="#modaleUpdate{{ $event->id }}">Edit</a>
                    <a href="#" class="btn btn-danger mt-2 " data-bs-toggle="modal"
                        data-bs-target="#modaleDelete{{ $event->id }}">Delete</a>
                </div>
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div> <!-- end col-->
       {{-- modal to update categories --}}

       <div class="modal fade" id="modaleUpdate{{ $event->id }}"
        tabindex="-1" role="dialog"
        aria-labelledby="modaleUpdatetitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"
                        id="exampleModalLongTitle">
                        Modal title</h5>
                    <button type="button" class="close"
                        data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/organisateur/Event/{{$event->id}}" method="POST"
                        class="mt-4" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" value="{{ session('user')->id }}" name="user_id">
                        
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" id="image" name="image" class="form-control" placeholder="Event image">
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" value="{{$event->name}}" id="event_name" name="name" class="form-control" placeholder="Event Name">
        </div>
        
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea id="description" name="description" class="w-100 p-2 bg-white rounded-3 text-black" style="resize: none;">{{$event->description}}</textarea>
        </div>
        
        <div class="mb-3">
            <label for="event_address" class="form-label">Address</label>
            <input type="text" value="{{$event->adress}}" id="event_address" name="address" class="form-control" placeholder="Address for the Event">
        </div>
        
        <div class="mb-3">
            <label for="number_place" class="form-label">Number of Places</label>
            <input type="text" value="{{$event->number_place}}" id="number_place" name="number_place" value="0" data-toggle="touchspin" data-bts-button-down-class="btn btn-danger" data-bts-button-up-class="btn btn-info">
        </div>
        
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select id="category" class="form-control select2" data-toggle="select2" name="category_id">
                <option>Select the Category</option>
                @foreach ($allCategory as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="p-4">
            <label for="role" class="text-gray text-body text-uppercase pb-3">Do you want the reservation Manually: </label>
            <div class="custom-checkbox d-flex justify-content-around">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="auto" name="type" value="auto">
                    <label class="form-check-label" for="auto">Auto</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="manuly" name="type" value="manuly" >
                    <label class="form-check-label" for="manuly">Manuly</label>
                </div>
            </div>
        </div>
        
        <div class="mb-3">
            <label for="date_start" class="form-label">Event Start Date</label>
            <input type="datetime-local" value="{{$event->date_start}}" id="date_start" name="date_start" class="form-control">
        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit"
                        class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    {{-- end madale update categories --}}


    {{-- modal to delete categories --}}

    <div class="modal fade" id="modaleDelete{{ $event->id }}"
        tabindex="-1" role="dialog"
        aria-labelledby="modaleDeleteTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered"
            role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modaleDeleteTitle">
                        Confirm Deletion</h5>
                    <button type="button" class="close"
                        data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this category : {{$event->name}}?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Cancel</button>
                    <form action="/organisateur/Event/{{$event->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden"
                            value="{{ $event->id }}"
                            name="id">
                        <button type="submit"
                            class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal to delete categories --}} 
    @endforeach
</div> <!-- end row -->
@endsection
