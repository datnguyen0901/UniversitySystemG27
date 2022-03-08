@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    {{ __('Upload file for your idea') }}
                </div>
                
                <div class="card-body">
                    <div class="panel-body">

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                            <form action="{{ route('file.upload.post') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Idea') }}</label>
                                            <div class="col-md-6">
                                            <select class="form-control" name="idea_id">
                                                <option>Select idea</option>
                                                @foreach ($ideas as $idea)
                                                <option value="{{$idea->id}}"> {{$idea->title}} </option>
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


                                        <div class="card-body">
                                                <button type="submit" class="btn btn-primary1">Upload</button>                                              
                                        </div>  
                                        

                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

