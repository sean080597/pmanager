@extends('layouts.app')

@section('content')
<div class="col-sm-9 col-md-9 col-lg-9 pull-left">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <form method="post" action="{{ route('projects.update', [$project->id]) }}">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="put">

            <div class="form-group">
                <label for="project-name">Project Name<span class="required">*</span></label>
                <input type="text" placeholder="Enter name" id="project-name" name="name"
                    spellcheck="false" class="form-control" value="{{ $project->name }}" required>
            </div>
            <div class="form-group">
                <label for="project-description">Description<span class="required">*</span></label>
                <textarea name="description" id="project-description"
                    cols="15" rows="10" style="resize: vertical" spellcheck="false"
                    class="form-control autosize-target text-left">
                    {{ $project->description }}
                </textarea>
            </div>
            <div class="form-group">
                <label for="project-days">Days</label>
                <input type="number" name="days" id="project-days" min="0"
                onkeydown="javascript: return event.keyCode == 69 || event.keyCode == 189 ? false : true"
                value="{{ $project->days }}">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit"/>
            </div>
        </form>
    </div>
</div>

<aside class="col-sm-3 col-md-3 col-lg-3 pull-right">
    <div class="p-3">
        <h4 class="font-italic">Actions</h4>
        <ol class="list-unstyled">
            <li><a href="/projects/{{ $project->id }}">View project</a></li>
            <li><a href="/projects">All projects</a></li>
        </ol>
      </div>
  </aside>
@endsection