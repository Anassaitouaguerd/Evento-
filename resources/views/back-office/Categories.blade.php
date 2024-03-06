@extends('back-office.layout.html_tags')
@section('title' , 'dashboard')
@section('content')
    

    @include('back-office/partials/_side')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include('back-office/partials/_nav')
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-md-12 mb-lg-0 mb-4">
                            <div class="card mt-4">
                                <div class="card-header pb-0 p-3">
                                    <div class="row">
                                        <div class="col-6 d-flex align-items-center">
                                            <h6 class="mb-0">Payment Method</h6>
                                        </div>
                                        <div class="col-6 text-end">
                                            <button type="button" class="btn bg-gradient-dark mb-0"
                                                data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                                                <i class="fas fa-plus"></i>&nbsp;&nbsp;Add New Categorie
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                {{-- modal to add new categories --}}

                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/admin/Categories" method="POST" class="mt-4"  enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="name">Category Name</label>
                                                        <input type="text" class="form-control" id="name"
                                                            name="name" placeholder="Enter category name">
                                                    </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- end madale add new categoris --}}
                                <div class="card-body p-3">
                                    <div>
                                        <h4 class="mb-3 text-sm">Name categories</h4>
                                        @if (session()->has('success'))
                                            
                                        <p class="p-2 text-success bg-gradient-faded-light-vertical w-30">
                                            {{
                                                session('success')
                                            }}
                                        </p>
                                        @endif
                                    </div>
                                    <div class="card-body pt-4 p-3">
                                        <ul class="list-group">
                                            @foreach ($all_category as $category)
                                                <li
                                                    class="list-group-item border-0 d-flex justify-content-center p-4 mb-2 bg-gray-100 border-radius-lg">
                                                    <div class="d-flex justify-content-center align-items-center">
                                                        <h5 class="ms-4 mb-3 text-sm"> {{ $category->name }}</h5>
                                                    </div>
                                                    <div class="ms-auto text-end">
                                                        <button
                                                            class="btn btn-link text-danger text-gradient px-3 mb-0"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modaleDelete{{ $category->id }}">
                                                            <i class="far fa-trash-alt me-2"></i>Delete
                                                        </button>
                                                        <button class="btn btn-link text-dark px-3 mb-0"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modaleUpdate{{ $category->id }}">
                                                            <i class="fas fa-pencil-alt text-dark me-2"></i>Edit</a>
                                                        </button>
                                                    </div>
                                                    {{-- modal to update categories --}}

                                                    <div class="modal fade" id="modaleUpdate{{ $category->id }}"
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
                                                                    <form action="/admin/Categories/{{$category->id}}" method="POST"
                                                                        class="mt-4" enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="form-group">
                                                                            <label for="name">Category Name</label>
                                                                            <input type="text"
                                                                                value="{{ $category->name }}"
                                                                                class="form-control" id="name"
                                                                                name="name"
                                                                                placeholder="Enter category name">
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

                                                    <div class="modal fade" id="modaleDelete{{ $category->id }}"
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
                                                                    <p>Are you sure you want to delete this category : {{$category->name}}?
                                                                    </p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Cancel</button>
                                                                    <form action="/admin/Categories/{{$category->id}}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <input type="hidden"
                                                                            value="{{ $category->id }}"
                                                                            name="id">
                                                                        <button type="submit"
                                                                            class="btn btn-danger">Delete</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- end modal to delete categories --}}


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

  