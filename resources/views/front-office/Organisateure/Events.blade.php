@extends('front-office.Organisateure.layout.tags_html')
@section('title', 'Create Event')
@section('content')
                                                    

<form action="/organisateur/Event" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="{{ session('user')->id }}" name="user_id">

    
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" id="image" name="image" class="form-control" placeholder="Event image">
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" id="event_name" name="name" class="form-control" placeholder="Event Name">
        </div>
        
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea id="description" name="description" class="w-100 p-2 bg-white rounded-3 text-black" style="resize: none;"></textarea>
        </div>
        
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
        
        <div class="d-flex align-items-center p-4">
            <label for="role" class="text-gray text-body text-uppercase pb-3">Do you want the reservation Manually: </label>
            <div class="custom-checkbox d-flex justify-content-around mb-3 ms-4">
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
            <input type="datetime-local" id="date_start" name="date_start" class="form-control">
        </div>
        
        <div class="mt-2 mb-md-4">
            <button type="submit" class="btn btn-primary mt-2 px-3">Add</button>
        </div>
        
    </form>
@endsection
