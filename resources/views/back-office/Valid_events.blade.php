@extends('back-office.layout.html_tags')
@section('title' , 'Validat Events')
@section('content')
    @include('back-office/partials/_side')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include('back-office/partials/_nav')
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div>
                    <div class="row">
                        <div class=" mb-4">
                            <div class="card mt-4">
                                <div class="card-header pb-0 p-3">
                                    <div class="row">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <h6 class="mb-0 text-center">Validate Events</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body p-3">
                                    @if (session()->has('success'))
                                        <div class="rounded-3 w-70 text-center bg-body-secondary p-1 ms-7"
                                            x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show">
                                            <p class="p-2 text-success bg-gradient-faded-light-vertical w-30">
                                                {{
                                                    session('success')
                                                }}
                                            </p>
                                        </div>
                                    @endif
                                    <div class="card-body pt-4 p-3">
                                        <ul class="list-group">
                                            @foreach ($allEvents  as $event)
                                                <li
                                                    class="list-group-item border-0 d-flex justify-content-center p-4 mb-2 bg-gray-100 border-radius-lg">
                                                    <div class="d-flex justify-content-center align-items-center">
                                                        <h5 id="show_discription" class="ms-4 mb-3 text-sm"  data-bs-toggle="modal"
                                                        data-bs-target="#modalDescription{{ $event->id }}"> {{ $event->name }}</h5>
                                                    </div>
                                                    <div class="ms-auto text-end">
                                                        <button class="btn btn-link text-danger text-gradient px-3 mb-0"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modaleDelete{{ $event->id }}">
                                                            <i class="far fa-trash-alt me-2"></i>Rejected
                                                        </button>
                                                            <button class="btn btn-link text-dark px-3 mb-0"  data-bs-toggle="modal"
                                                            data-bs-target="#modalApprouv{{ $event->id }}">
                                                                <i
                                                                    class="fas fa-pencil-alt text-dark me-2"></i>Approved
                                                        </button>
                                                        </a>
                                                    </div>
                                                    {{-- modal to reject event --}}

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
                                                                    <p>are you sure to rejected this event : {{$event->name}}
                                                                    </p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Cancel</button>
                                                                    <form action="/admin/rejectEvent"
                                                                        method="POST">
                                                                        @csrf
                                                                        <input type="hidden"
                                                                            value="{{ $event->id }}"
                                                                            name="id">
                                                                        <button type="submit"
                                                                            class="btn btn-danger">Rejected</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- end modal to reject event --}}


                                                    {{-- modal to description event --}}

                                                    <div class="modal fade" id="modalDescription{{ $event->id }}"
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
                                                                        {{ $event->description }}
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

                                                    <div class="modal fade" id="modalApprouv{{ $event->id }}"
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
                                                                    <p>are you sure to approved this event : {{$event->name}}</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form action="/admin/approvEvent"
                                                                    method="POST">
                                                                    @csrf
                                                                    <input type="hidden"
                                                                        value="{{ $event->id }}"
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
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @include('back-office/partials/_footer')


            </div>
    </main>
@endsection
