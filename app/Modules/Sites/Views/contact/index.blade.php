@extends('Sites::layout')
@section('title', $row->title)
@section('content')
@include('Sites::inc.maketting')
<div class="main">  
    <div class="container">
        <p id="title">Information about us</p>
        @foreach ($contact as $value)
        <p>{{$value->name}}</p>
        <p>Address: {{$value->address}}</p>
        <p>{{$value->enterprise_code}}</p>
        <p>{{$value->founding_date}}</p>
        <p>Phone: {{$value->phone}}</p>
        @endforeach
    </div>
</div>
@endsection