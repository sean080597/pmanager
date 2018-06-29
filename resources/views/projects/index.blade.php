@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-offset-3 col-sm-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                List of Projects
                <a href="/projects/create" class="btn btn-default btn-sm pull-right">Create new Project</a>
            </div>
            <div class="panel-body">
                <ul class="list-group">
                @foreach($projects as $project)
                    <li class="list-group-item"><a href="/projects/{{$project->id}}">{{$project->name}}</a></li>
                @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection