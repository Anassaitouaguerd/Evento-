@extends('front-office.Organisateure.layout.tags_html')
@section('title', 'Create Event')
@section('content')
<table class="table table-striped">
    <thead>
        <tr>
            <th>id</th>
            <th>Event Name</th>
            <th>User Name</th>
            <th>Reservation Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <!-- Sample Data for Approved Requests -->
        @foreach($tickets as $ticket)
        <tr>
            <td>{{ $ticket->id }}</td>
            <td id="show_discription" class="ms-4 mb-3 text-sm"  data-bs-toggle="modal"
            data-bs-target="#modalDescription{{ $ticket->id }}"> {{ $ticket->event->name }}</td>
            <td>{{ $ticket->user->name }}</td>
            <td>{{ $ticket->status }}</td>
            <td class="d-flex align-items-center">
                <button class="btn btn-link text-danger text-gradient px-3 mb-0"
                data-bs-toggle="modal"
                data-bs-target="#modaleDelete{{ $ticket->id }}">
                <i class="far fa-trash-alt me-2"></i>Rejected
            </button>
                <button class="btn btn-link text-dark px-3 mb-0"  data-bs-toggle="modal"
                data-bs-target="#modalApprouv{{ $ticket->id }}">
                    <i
                        class="fas fa-pencil-alt text-dark me-2"></i>Approved
            </button>
            {{-- modal to reject ticket --}}

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
                            <p>are you sure to rejected this ticket : {{$ticket->name}}
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Cancel</button>
                            <form action="/organisateur/reject_ticket"
                                method="POST">
                                @csrf
                                <input type="hidden"
                                    value="{{ $ticket->id }}"
                                    name="id">
                                <button type="submit"
                                    class="btn btn-danger">Rejected</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end modal to reject ticket --}}


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
                            <textarea name="description" id="description" cols="10" rows="10" disabled>
                                {{ $ticket->event->description }}
                            </textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end modal to description event --}}

            {{-- modal to Approve event --}}

            <div class="modal fade" id="modalApprouv{{ $ticket->id }}"
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
                            <p>are you sure to approved this ticket : {{$ticket->name}}</p>
                        </div>
                        <div class="modal-footer">
                            <form action="/organisateur/approv_ticket"
                            method="POST">
                            @csrf
                            <input type="hidden"
                                value="{{ $ticket->id }}"
                                name="id">
                                <button type="submit" class="btn btn-success"
                                    data-bs-dismiss="modal">Approved</button>
                        </form>
                                <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end modal to PPROVE event --}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>                                 
@endsection