@extends('Sites::layout')
@section('title', $row->title)
@section('content')
@include('Sites::inc.maketting')
<div class="main">
    <div class="container">
        <p id="title">My Course</p>
        <div class="cens">
            <p style="color: white;">You haven't taken the course yet</p>
            <p><a href="/course-introduction" style="color: #EF8D21;">Choose a course to get started</a></p>
        </div>
    </div>
</div>
@endsection