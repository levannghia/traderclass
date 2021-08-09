@extends('Sites::layout')
@section('title', $row->title)
@section('content')
<div class="main">
    <div class="container  ">
        {!! $refund_policy->content !!}
    </div>
</div>
@endsection