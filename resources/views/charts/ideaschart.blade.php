@extends('layouts.app')
@section('content')
    <head>
        <meta charset="utf-8">
        <title>Total ideas of each department Chart</title>
    </head>
    <body>
        <div style="width: 80%;margin: 0 auto;">
            {!! $chart->container() !!}
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
        {!! $chart->script() !!}
    </body>
@endsection
