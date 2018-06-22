@extends('layouts.app')

@section('content')
<div class="col-sm-9 col-md-9 col-lg-9 pull-left">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <form method="post" action="{{ route('companies.update', [$company->id]) }}">
            {{ csrf_field() }}

            <input name="_method" value="PUT" type="hidden">

            <div class="form-group">
                <label for="company-name">Name<span class="required">*</span></label>
                <input type="text" placeholder="Enter name" id="company-name" name="name"
                    spellcheck="false" class="form-control" value="{{ $company->name }}">
            </div>
            <div class="form-group">
                <label for="company-description">Description<span class="required">*</span></label>
                <textarea name="description" id="company-description"
                    cols="15" rows="10" style="resize: vertical" spellcheck="false"
                    class="form-control autosize-target text-left">
                    {{ $company->description }}
                </textarea>
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
          <li><a href="/companies/{{ $company->id }}">View companies</a></li>
          <li><a href="/companies">All companies</a></li>
        </ol>
      </div>
  </aside>
@endsection