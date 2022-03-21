@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Idea') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('idea.store') }}" enctype="multipart/form-data">
                        @csrf 
                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="title" name="title" value="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="description" name="description" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Content</label>
                            <textarea class="form-control" id="content" name="content" rows="10"></textarea>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>
                            <div class="col-md-6">
                            <select class="form-control" name="category_id">
                                <option>Select category</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}"> {{ $category->name }} </option>
                                @endforeach    
                            </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Submission') }}</label>
                            <div class="col-md-6">
                            <select class="form-control" name="submission_id">
                                <option>Select submission</option>
                                @foreach ($submissions as $submission)
                                <option value="{{ $submission->id }}"> {{ $submission->name }} </option>
                                @endforeach    
                            </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="uploadfile" class="col-md-4 col-form-label text-md-right">{{ __('Upload File') }}</label>
                                <div class="col-md-6">    
                                    <input type="file" name="file" class="form-control">
                                </div>
                        </div>

                        <h3> </h3>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <input type="checkbox"
                                class="form-check-input @error('terms') is-invalid @enderror"
                                value="true"
                                name="terms"
                                id="keep-signed"
                                {{ !old('terms') ?: 'checked' }}
                            >
                                <label class="form-check-label fs-sm">
                                    {{ __('I agree to') }}
                                    <a class="nav-link-style fs-ms text-black-50 text-primary text-decoration-none" href="#" onClick="MyWindow=window.open('/terms','MyWindow','width=900,height=900'); return false;">
                                        {{ __('Terms & Conditions') }}
                                    </a>
                                </label>
                            </div>
                        </div>


                        <h3> </h3>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add Idea') }}
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

