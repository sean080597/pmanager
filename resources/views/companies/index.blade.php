@extends('layouts.app')

@section('content')
<div class="col-sm-offset-3 col-sm-6">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">List of Companies</h3>
        </div>
        <div class="panel-body">
            <ul class="list-group">
            @foreach($companies as $company)
                <li class="list-group-item">{{$company->name}}</li>
            @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection