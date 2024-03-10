@extends('front-office.User.layout._tags_html')

@section('title' , 'Details Event')

@section('content')
<div class="container">
    @if (session()->has('success'))
    <div class="massage_reserve rounded p-2">
        <p class="m-0 text-bold">
                {{session('success')}}
            </p>
        </div>
        @endif
    @if (session()->has('false'))
    <div class="massage_not_reserve rounded p-2" >
        <p class="m-0 text-bold" style=" color: aliceblue !important;">
                {{session('false')}}
            </p>
        </div>
        @endif
    <div class="row mt-5">
      <div class="w-75">
        <!-- Event Image -->
        <img src="/Uploads/{{$event->image}}" class="img-fluid mb-3 w-75" alt="Event Image">

        <!-- Event Title -->
        <h1 class="mb-3">{{$event->name}}</h1>

        <!-- Event Description -->
        <p class="mb-3">{{$event->description}}</p>

        <!-- Event Start Date -->
        <p><strong>Start Date:</strong>{{$event->date_start}}</p>
        <p><strong>Space available : </strong>{{$place_disponible}}</p>

        <!-- Event Category -->
        <p><strong>Category:</strong> {{$event->category->name}}</p>
        <p><strong>Address:</strong> {{$event->adress}}</p>
        
    </div>
        <!-- Ticket Reservation Form -->
        <div class="card w-25 h-100">
          <div class="card-body">
            <h5 class="card-title">Reserve Tickets</h5>
            <form method="POST" action="/reservation">
                @csrf
                <input type="hidden" name="event_id" value="{{$event->id}}">
                <div class="form-group">
                 <!-- Event Title -->
                 <p><strong>Title: </strong>{{$event->name}}</p>
              </div>
              <div class="form-group">
                <p><strong>Start Date: </strong>{{$event->date_start}}</p>
              </div>
              <div class="form-group">
                <p><strong>Category: </strong> {{$event->category->name}}</p>
              </div>
              <div class="form-group">
              <p><strong>Space available : </strong>{{$place_disponible}}</p>
              </div>
              @if ($place_disponible > 0)
              <div class="w-100 centered">
                <button type="submit" class="btn bg-gradient">Reservation</button>

            </div>
              @else
              <div class="w-100 centered">
                <button disabled class="btn bg-gradient">Reservation</button>
            </div>
              @endif
            </form>
          </div>
        </div>
    </div>
  </div>

@endsection