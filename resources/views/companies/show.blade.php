@extends('layouts.app')

@section('content')
<div class="col-sm-9 col-md-9 col-lg-9 pull-left">
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">{{$company->name}}</h1>
            <p>{{$company->description}}</p>
            <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more »</a></p>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12" style="background-color: #fff; padding: 10px">
      <a href="/projects/create/{{ $company->id }}" class="btn btn-default btn-sm pull-right">Add Project</a>
    @foreach($company->projects as $project)
        <div class="col-lg-4">
            <h2>{{$project->name}}</h2>
            <p class="text-danger">{{$project->description}}</p>
            <p><a href="/projects/{{$project->id}}" class="btn btn-primary" role="button">View Project >></a></p>
        </div>
    @endforeach
    </div>
</div>

<aside class="col-sm-3 col-md-3 col-lg-3 pull-right">
    {{-- <div class="p-3 mb-3 bg-light rounded">
      <h4 class="font-italic">About</h4>
      <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
    </div> --}}

    <div class="p-3">
        <h4 class="font-italic">Actions</h4>
        <ol class="list-unstyled">
          <li><a href="/companies/{{ $company->id }}/edit">Edit</a></li>
          <li><a href="/projects/create/{{ $company->id }}">Add Project</a></li>
          <li><a href="/companies">My Companies</a></li>
          <li><a href="/companies/create">Create new Company</a></li>
          <li>
            <a href="/companies/{{ $company->id }}"
              onclick="
                var result = confirm('Are you sure you wish to delete this company?');
                if(result){
                  event.preventDefault();
                  document.getElementById('delete-form').submit();
                }
              ">
              Delete
            </a>

            <form id="delete-form" action="{{ route('companies.destroy', [$company->id]) }}"
              method="POST" style="display: none">
              <input type="hidden" name="_method" value="delete">
              {{ csrf_field() }}
            </form>
          </li>
        </ol>
      </div>

    {{-- <div class="p-3">
      <h4 class="font-italic">Members</h4>
      <ol class="list-unstyled mb-0">
        <li><a href="#">March 2014</a></li>
      </ol>
    </div> --}}
  </aside>
@endsection