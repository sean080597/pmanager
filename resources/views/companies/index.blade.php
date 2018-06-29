@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-offset-3 col-sm-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                {{-- <h3 class="panel-title">List of Companies</h3> --}}
                List of Companies
                <a href="/companies/create" class="btn btn-default btn-sm pull-right">Create new Company</a>
            </div>
            <div class="panel-body">
                <ul class="list-group">
                @foreach($companies as $company)
                    <li class="list-group-item"><a href="/companies/{{$company->id}}">{{$company->name}}</a></li>
                @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection