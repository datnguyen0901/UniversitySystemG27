@extends('layouts.app')
@section('content')
    <head>
        <meta charset="utf-8">
        <title>Total ideas of each department Chart</title>
    </head>
    <body>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    {{ __('List of Charts') }}
                </div>
                <div class="card-header">
                    <a href="/ideachart" class="btn btn-primary1">Idea chart</a>
                    <a href="/viewchart" class="btn btn-primary1">View chart</a>
                    <a href="/reactionchart" class="btn btn-primary1">Reaction chart</a>
                </div>
            </div>
        </div>
        <div style="width: 80%;margin: 0 auto;margin-top: 2vh">
            {!! $chart->container() !!}
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
        {!! $chart->script() !!}

    </body>
@endsection
