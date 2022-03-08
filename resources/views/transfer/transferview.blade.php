@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    {{ __('List of Ideas with end final closure date') }}                    
                </div>
                
                <div class="card-body">
                        @foreach ($ideas as $idea)
                        <div class="card text-center">
                            <table class="table table-striped">
                                <thead>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Content</th>
                                    <th>Create at</th>
                                    <th>Closure Date</th>
                                    <th>Final Closure Date</th>
                                    <th>Views</th>                            
                                </thead>
                                <tbody>
                                    <tr>
                                    <td>{{$idea->id}}</td>
                                    <td>{{$idea->title}}</td>
                                    <td>{{$idea->description}}</td>
                                    <td>{{$idea->content}}</td>
                                    <td>{{$idea->created_at}}</td>
                                    <td>{{$idea->closure_date}}</td>
                                    <td>{{$idea->final_closure_date}}</td>
                                    <td>{{$idea->views_count}}</td>                             
                                    </tr>                                
                                </tbody>
                                </div>
                            </table>                        
                        <div>
                        <span data-href="/transfer/{{$idea->id}}" id="export" class="btn btn-success btn-sm" onclick="exportTasks(event.target);">Export Csv</span>
                        <h3> - </h3>
                        </div>                        
                </div>
                <h3> </h3>
                @endforeach     
                {!! $ideas->render() !!}
            </div>
        </div>
    </div>
</div>
<script>
   function exportTasks(_this) {
      let _url = $(_this).data('href');
      window.location.href = _url;
   }
</script>
@endsection
