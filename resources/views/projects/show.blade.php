@extends('layouts.app')

@section('content')
<div class="col-sm-9 col-md-9 col-lg-9 pull-left">
    <div class="well well-lg">
        <h1 class="display-3">{{$project->name}}</h1>
        <p>{{$project->description}}</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more »</a></p>
    </div>

    <div class="col-sm-12 col-md-12 col-lg-12" style="background: white; padding: 10px">
        <a href="/projects/create" class="pull-right btn btn-sm btn-default">Add Project</a>
        <br>

        <div class="row container-fluid">
            <form action="{{ route('comments.store') }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="commentable_type" value="App\Project">
                <input type="hidden" name="commentable_id" value="{{ $project->id }}">

                <div class="form-group">
                    <label for="body">Comment</label>
                    <textarea name="body" id="" rows="3" spellcheck="false"
                        style="resize:vertical" placeholder="Enter comment"
                        class="form-control autosize-target text-left">
                    </textarea>
                </div>

                <div class="form-group">
                    <label for="">Proof of work done (Url/Photos)</label>
                    <textarea name="url" id="comment-content" rows="2" spellcheck="false"
                        style="resize: vertical" placeholder="Enter url or screenshots"
                        class="form-control autosize-target text-left"></textarea>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Submit">
                </div>
            </form>
        </div>
    </div>

    @include('partials.comments')

</div>

<aside class="col-sm-3 col-md-3 col-lg-3 pull-right">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <h4 class="font-italic">Actions</h4>
        <ol class="list-unstyled">
            <li><a href="/projects/{{ $project->id }}/edit"><i class="fas fa-edit"></i> Edit</a></li>
            <li><a href="/projects/create"><i class="fas fa-plus-circle"></i> Create new project</a></li>
            {{-- <li><a href="/projects/create/{{ $company->id }}">Add Project</a></li> --}}
            <li><a href="/projects"><i class="far fa-user"></i> My projects</a></li><br>

            @if($project->user_id == Auth::user()->id)

            <li>
                <a href="/projects/{{ $project->id }}"
                    onclick="
                        var result = confirm('Are you sure you wish to delete this project?');
                        if(result){
                            event.preventDefault();
                            document.getElementById('delete-form').submit();
                        }
                    ">
                    <i class="fas fa-power-off"></i> Delete
                </a>

                <form id="delete-form" action="{{ route('projects.destroy', [$project->id]) }}"
                    method="POST" style="display: none">
                    <input type="hidden" name="_method" value="delete">
                    {{ csrf_field() }}
                </form>
            </li>

            @endif

        </ol>

        <hr>
        <h4>Add members</h4>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <form id="add-user" action="{{ route('projects.adduser') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="input-group">
                    <input type="hidden" class="form-control" name="project_id" value="{{$project->id}}">
                    <input type="text" class="form-control" placeholder="Email" name="email">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">Add!</button>
                    </span>
                    </div>
                </form>
            </div>
        </div>

        <hr>
        <h4>Team Members</h4>
        <ol class="list-unstyled">
        @foreach($project->users as $user)
            <li><a href="#">{{ $user->email }}</a></li>
        @endforeach
        </ol>

    </div>
</aside>
@endsection