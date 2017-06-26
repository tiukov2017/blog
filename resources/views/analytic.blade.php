@extends('app')

@section('title')
	Analytics
@endsection

@section('content')
@foreach($analytics as $tag=>$data)
<br/><h4>{{ $tag }}</h4>
<?php
arsort($data);
$data=array_slice($data,0,9);
?>
@foreach($data as $word=>$count)
{{ $word }} - {{$count }};
@endforeach
@endforeach
@endsection