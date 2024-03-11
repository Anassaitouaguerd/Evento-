@extends('front-office.user.layout._tags_html')
@section('title', 'Board Tickets')
@section('link', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css')
@section('content')

<table class="table table-striped w-75 centered mt-5 border-left border-right border-secondary">
    <thead>
        <tr>
            <th>id</th>
            <th>Event Name</th>
            <th>User name</th>
            <th>Reservation Status</th>
            <th class="px-5">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tickets as $ticket)
        <tr>
            <td>{{ $ticket->id }}</td>
            <td id="show_discription" class="ms-4 mb-3 text-sm"  data-bs-toggle="modal"
            data-bs-target="#modalDescription{{ $ticket->id }}"> {{ $ticket->event->name }}</td>
            <td>{{ $ticket->user->name }}</td>
            <td>{{ $ticket->status }}</td>
            <td class="d-flex align-items-center">
                @if ($ticket->status == 'rejected' OR $ticket->status == 'pending')
                <button class="btn btn-link text-danger text-gradient px-3 mb-0"
                data-bs-toggle="modal"
                data-bs-target="#modaleDelete{{ $ticket->id }}" disabled>
                <i class="far fa-trash-alt me-2"></i>Generate PDF
                </button>
                
                @else
                <button class="btn bg-danger-subtle btn-link text-danger text-gradient px-3 mb-0"
                data-bs-toggle="modal"
                data-bs-target="#modaleDelete{{ $ticket->id }}">
                <i class="far fa-trash-alt me-2"></i>Generate PDF
                </button>
                    
                @endif
            {{-- modal to generate ticket --}}
            <div class="modal fade" id="modaleDelete{{ $ticket->id }}"
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
                            <p>Generate your ticket to : {{$ticket->event->name}}
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Cancel</button>
                            <form action="/generatePDF"
                                method="POST">
                                @csrf
                                <input type="hidden"
                                    value="{{ $ticket->id }}"
                                    name="id">
                                    <input type="hidden" name="event_name" value="{{$ticket->event->name}}">
                                    <input type="hidden" name="user_name" value="{{$ticket->user->name}}">
                                    <input type="hidden" name="user_email" value="{{$ticket->user->email}}">
                                    <input type="hidden" name="address" value="{{$ticket->event->adress}}">
                                    <input type="hidden" name="description" value="{{$ticket->event->description}}">
                                    <input type="hidden" name="date_start" value="{{$ticket->event->date_start}}">
                                <button type="submit"
                                    class="btn btn-danger">Generate</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end modal to generate ticket --}}


            {{-- modal to description ticket --}}

            <div class="modal fade" id="modalDescription{{ $ticket->id }}"
                tabindex="-1" role="dialog"
                aria-labelledby="modaleDeleteTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered"
                    role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close"
                                data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <label for="description">Description Event</label>
                            <textarea name="description" class="w-100" id="description" cols="" rows="10" disabled>
                                {{ $ticket->event->description }}
                            </textarea>
                        </div>
                        <div class="modal-body">
                            <p>
                                Start Date: {{ $ticket->event->date_start }}
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end modal to description event --}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>                                 
@endsection