@extends('front-office.Organisateure.layout.tags_html')
@section('title', 'Create Event')
@section('content')
    <form action="/organisateur/Event" method="POST">
        @csrf
        <input type="hidden" value="{{ session('user_id') }}" name="user_id">
        
        <div class="mb-3">
            <label for="event_name" class="form-label">Name</label>
            <input type="text" id="event_name" name="event_name" class="form-control" placeholder="Event Name">
        </div>
        
        {{-- Description Editor --}}
        <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea id="description" class="w-100 p-2 bg-white rounded-3 text-black" style="resize: none;" name="description">
        </textarea>
        </div>
        {{-- End Description Editor --}}
        
        <div class="mb-3">
            <label for="event_address" class="form-label">Address</label>
            <input type="text" id="event_address" name="address" class="form-control" placeholder="Address for the Event">
        </div>
        
        <div class="mb-3">
            <label for="number_place" class="form-label">Number of Places</label>
            <input type="text" id="number_place" name="number_place" value="0" data-toggle="touchspin" data-bts-button-down-class="btn btn-danger" data-bts-button-up-class="btn btn-info">
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
        
        <div class=" d-flex align-items-center p-4">
            <span class="text-gray text-body text-uppercase">Do you want the reservation Manually : </span>
            <input type="checkbox" id="switch1" name="type" data-switch="bool"/>
            <label for="switch1" class="mx-3" data-on-label="On" data-off-label="Off"></label>
        </div>
        
        <div class="mb-3">
            <label for="date_start" class="form-label">Event Start Date</label>
            <input type="datetime-local" id="date_start" name="date_start" class="form-control">
        </div>
        <div class="mt-2 mb-md-4">
            <button type="submit" class="btn btn-primary mt-2 stretched-link px-3">Add</button>
        </div>
        
    </form>
@endsection
