@extends('front-office.User.layout._tags_html')

@section('title' , 'home')

@section('content')

<!-- Hero Section Begin -->
<section class="hero-section">
    <div class="section">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="hero-text">
                    <span>5 to 9 may 2019, mardavall hotel, New York</span>
                    <h2>Change Your Mind<br /> To Become Success</h2>
                    <a href="#by-tecket" class="primary-btn">Buy Ticket</a>
                </div>
            </div>
            <div class="col-lg-5 mt-lg-5">
                <img src="/assets/images/hero-right.png" alt="">
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Search Section Begin -->
<div class="searchPart w-75 centered">
    <h4 class="bi-tag bg-gradient text-white p-1 mb-4 rounded-lg text-center w-25 centered">Search and Filter</h4>
    <form action="/search_filter" method="POST" class="d-flex justify-content-around align-items-center">
        @csrf
        <div class="w-50">
            <label for="search">Search:</label>
            <input type="text" id="search" name="search" placeholder="Enter your search term...">
        </div>
        <div class="w-25">
            <label for="filter">Filter:</label>
            <select id="filter" name="filter">
                <option value="" selected>Select the category</option>
                @foreach ($allCategory as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <input type="submit" class="bi-tag bg-gradient" value="Search">
        </div>
    </form>
</div>
<!-- Search Section End -->

<!-- Event Section Begin -->
<section id="by-tecket" class="blog-section spad">
    <div class="container">
        <div class="row">
            @foreach ($allEvents as $event)
            <div class="col-lg-6">
                <div class="blog-item set-bg large-item mt-5" data-setbg="/Uploads/{{$event->image}}">
                    <div class="bi-tag bg-gradient">{{$event->category->name}}</div>
                    <div id="bg_info" class="bi-text">
                        <h3><a href="/blog-event/{{$event->id}}">{{$event->name}}</a></h3>
                        <span><i class="fa fa-clock-o"></i>Date Start : {{$event->date_start}}</span>
                    </div>
                </div>
                <div class="">
                    <a href="/blog-event/{{$event->id}}" class="p-3 bg-gradient text-light text-monospace rounded-lg">Details
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-arrow-bar-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M6 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L12.293 7.5H6.5A.5.5 0 0 0 6 8m-2.5 7a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5"/>
                        </svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- Pagination Begin -->
    <div class="mt-5 w-100 h-25 d-flex justify-content-center pt-5 text-bold text-danger">
        {{ $allEvents->links() }}
    </div>
    <!-- Pagination End -->
</section>
<!-- Event Section End -->


@endsection

