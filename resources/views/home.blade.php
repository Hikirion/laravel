@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    <h3>You are logged in!</h3>
                    <h4>Categories:</h4>
                    <ul class="list-group">
                        @foreach ($categories as $category)
                            <li class="list-group-item"><a href="{{ url('category/'.$category->id) }}"
                                                           class="btn btn-block btn-default" style="">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                    <div><a href="{{url("/tickets")}}" class="btn btn-block btn-default">My ticket</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
