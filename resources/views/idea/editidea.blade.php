@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Update Idea') }}</div>

                <div class="card-body">
                    <form action="{{ route('idea.update',$idea->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf 
                        @method('PUT')
                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="title" name="title" value="{{ $idea->title }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="description" name="description" value="{{$idea->description}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Content</label>
                            <textarea class="form-control" id="content" name="content" rows="10">{{$idea->content}}</textarea>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>
                            <div class="col-md-6">
                            <select class="form-control" name="category_id">
                                <option>{{$idea->category}}</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $idea->category_id == $category->id ? 'selected' : '' }}> {{ $category->name }} </option>
                                @endforeach    
                            </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Submission') }}</label>
                            <div class="col-md-6">
                            <select class="form-control" name="submission_id">
                                <option>{{$idea->submission}}</option>
                                @foreach ($submissions as $submission)
                                <option value="{{ $submission->id }}" {{ $idea->submission_id == $submission->id ? 'selected' : '' }}> {{ $submission->name }} </option>
                                @endforeach    
                            </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="editfile" class="col-md-4 col-form-label text-md-right">{{ __('File uploaded') }}</label>
                                <div class="col-md-6">    
                                    <ul class="list-group">
                                            @foreach ($files as $file)
                                                <li class="list-group-item">
                                                    <a>{{ $file->file_path }}</a>
                                                    <a href="/file/delete/{{$file->id}}" class="btn btn-danger btn-sm float-right">Delete</a>                                                    
                                                </li>
                                            @endforeach
                                    </ul>
                                </div>
                        </div>

                        <div class="form-group row">
                            <label for="uploadfile" class="col-md-4 col-form-label text-md-right">{{ __('Upload File') }}</label>
                                <div class="col-md-6">    
                                    <input type="file" name="file" class="form-control">
                                </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update idea') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
