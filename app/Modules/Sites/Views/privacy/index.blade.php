@extends('Sites::layout')
@section('title', $row->title)
@section('content')
<div class="main">
    <div class="container  ">
        {!! $privacy->content !!}
    </div>
</div>
@endsection