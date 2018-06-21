@extends('layouts.app')

@section('content')
<div class="jumbotron">
    <div class="container">
    <h1 class="display-3">{{$company->name}}</h1>
    <p>{{$company->description}}</p>
    <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more »</a></p>
    </div>
</div>
@endsection