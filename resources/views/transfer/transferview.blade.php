@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                @foreach ($submissions as $submission)
                <div class="card-header">
                    Submission Title: {{ $submission->name }}                    
                </div>
                
                <div class="card-body">                        
                        <div class="card text-center">
                            <table class="table table-striped">
                                <thead>
                                    <th>ID</th>
                                    <th>Title of Idea</th>
                                    <th>Author</th>
                                    <th>Closure Date</th>
                                    <th>Final Closure Date</th>
                                    <th>Views</th>
                                    <th>Reactions</th>
                                </thead>
                                @foreach ($submission->ideas as $idea)
                                <tbody>
                                    <tr>
                                    <td>{{$idea->id}}</td>
                                    <td>{{$idea->title}}</td>
                                    <td>{{$idea->username}}</td>
                                    <td>{{$submission->closure_date}}</td>
                                    <td>{{$submission->final_closure_date}}</td>
                                    <td>{{$idea->views_count}}</td>
                                    <td>{{$reaction}}</td>                            
                                    </tr>                                
                                </tbody>
                                @endforeach                               

                            </table>
                            <div>                
                                    <span data-href="/transfer/{{$submission->id}}" id="export" class="btn btn-success btn-sm" onclick="exportTasks(event.target);">Export Csv</span>
                                    <h3> - </h3>
                                </div>  
                        </div>                      
                       
                </div>
                <h3> </h3>               
    
                @endforeach
                {!! $submissions->render() !!}
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
