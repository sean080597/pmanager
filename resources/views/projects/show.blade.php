@extends('layouts.app')

@section('content')
<div class="col-sm-9 col-md-9 col-lg-9 pull-left">
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">{{$project->name}}</h1>
            <p>{{$project->description}}</p>
            <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more »</a></p>
        </div>
    </div>
</div>

<aside class="col-sm-3 col-md-3 col-lg-3 pull-right">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <h4 class="font-italic">Actions</h4>
        <ol class="list-unstyled">
            <li><a href="/projects/{{ $project->id }}/edit">Edit</a></li>
            <li><a href="/projects/create">Add Project</a></li>
            <li><a href="/projects">My Projects</a></li>
            <li>
                <a href="/projects/{{ $project->id }}"
                    onclick="
                        var result = confirm('Are you sure you wish to delete this project?');
                        if(result){
                            event.preventDefault();
                            document.getElementById('delete-form').submit();
                        }
                    ">
                    Delete
                </a>

                <form id="delete-form" action="{{ route('projects.destroy', [$project->id]) }}"
                    method="POST" style="display: none">
                    <input type="hidden" name="_method" value="delete">
                    {{ csrf_field() }}
                </form>
            </li>
        </ol>
    </div>
</aside>
@endsection