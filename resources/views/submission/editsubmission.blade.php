@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update Submission') }}</div>

                <div class="card-body">
                    <form action="{{ route('submission.update',$submission->id) }}" method="POST">
                        @csrf 
                        @method('PUT')
                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="name" name="name" value="{{ $submission->name }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="description" name="description" value="{{$submission->description}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Closure Date') }}</label>

                            <div class="col-md-6">
                                <input id="datepicker" type="text" class="datepicker" name="closure_date" value="{{$submission->closure_date}}">
                                <script>
                                $('#datepicker').datepicker({
                                    format: 'yy/mm/dd',
                                    uiLibrary: 'bootstrap4'
                                }).datepicker("setDate",'now');
                                </script>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Final Closure Date') }}</label>

                            <div class="col-md-6">
                                <input id="datepicker1" type="text" class="datepicker1" name="final_closure_date" value="{{$submission->final_closure_date}}">
                                <script>
                                $('#datepicker1').datepicker({
                                    format: 'yy/mm/dd',
                                    uiLibrary: 'bootstrap4'
                                }).datepicker("setDate",'now');
                                </script>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Submission') }}
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
