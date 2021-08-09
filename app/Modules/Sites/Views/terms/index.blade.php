@extends('Sites::layout')
@section('title', $row->title)
@section('content')
<div class="main">
    <div class="container  ">
        {!! $terms->content !!}
    </div>
</div>
@endsection