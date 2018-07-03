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

    @foreach($project->comments as $comment)
    <div class="col-lg-4 col-md-4 col-sm-4">
        <h2>{{ $comment->body }}</h2>
        <p class="text-danger">{{ $comment->url }}</p>
        <p><a class="btn btn-primary" href="/projects/{{ $project->id }}" role="button">View Project >></a></p>
    </div>
    @endforeach

</div>

<aside class="col-sm-3 col-md-3 col-lg-3 pull-right">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <h4 class="font-italic">Actions</h4>
        <ol class="list-unstyled">
            <li><a href="/projects/{{ $project->id }}/edit">Edit</a></li>
            <li><a href="/projects/create">Create new project</a></li>
            {{-- <li><a href="/projects/create/{{ $company->id }}">Add Project</a></li> --}}
            <li><a href="/projects">My projects</a></li>

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
                    Delete
                </a>

                <form id="delete-form" action="{{ route('projects.destroy', [$project->id]) }}"
                    method="POST" style="display: none">
                    <input type="hidden" name="_method" value="delete">
                    {{ csrf_field() }}
                </form>
            </li>

            @endif

        </ol>
    </div>
</aside>
@endsection