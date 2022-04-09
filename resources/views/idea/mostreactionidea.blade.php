@extends('layouts.app')
@section('content')
<style>

.topnav {
  overflow: hidden;
  background-color: rgb(255 255 255 / 80%);
}

.topnav a {
  float: left;
  display: inline-block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 14.5px;
  margin-right: 5px;
}

.active {
  background-color: #04AA6D;
  color: black;
}

.topnav .icon {
  display: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}


.topnav a:hover, .dropdown:hover .dropbtn {
  background-color: #555;
  color: grey;
}

    @media screen and (max-width: 600px) {
  .topnav a:not(:first-child), .dropdown .dropbtn {
    display: none;
  }
  .topnav a.icon {
    float: right;
    display: block;
    background-color: #007bff;
    color: black;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
  }

  @media screen and (max-width: 920px) {
  .topnav a:not(:first-child), .dropdown .dropbtn {
    display: none;
  }
  .topnav a.icon {
    float: right;
    display: block;
    background-color: #007bff;
    color: black;
  }
}

@media screen and (max-width: 920px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
  }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                <B> {{ __('List of Ideas') }}</B>
                    <a href="idea/create" class="btn btn-info" style="float:right;">Create new Idea</a>
                </div>
                <div class="card-header">
                    <div class="topnav" id="myTopnav">
                    <a href="idea" class="btn btn-primary">All Ideas</a> &nbsp
                    <a href="/myidea" class="btn btn-primary" >My Ideas</a> &nbsp
                    <a href="/showmostpopular" class="btn btn-primary">Most Popular Ideas</a> &nbsp
                    <a href="/showmostviewed" class="btn btn-primary">Most viewed Ideas</a> &nbsp
                    <a href="/lastcreated" class="btn btn-primary">Lastest Ideas</a> &nbsp
                    <a href="/lastcomment" class="btn btn-primary">Lastest Comments</a> &nbsp
                    <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
                    </div>
                </div>

                
                <div class="card-body">
                        @foreach ($ideas as $idea)
                        <div class="card text-center">
                        <div class="card-header" style="font-weight: bolder;">
                            {{ $idea->title }}
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $idea->description}}</h5>
                            <a class="btn btn-success" href="/comment/{{$idea->id}}" style="float: right;">View Idea</a>
                        </div>
                        <div class="card-footer text-muted">
                             Reactions : {{$idea->reactions_count}}
                             <> Create at : {{$idea->created_at}}
                        </div>

                </div>
                <h3> </h3>
                        @endforeach
                
                {!! $ideas->render() !!}
            </div>
        </div>
    </div>
</div>
@endsection
