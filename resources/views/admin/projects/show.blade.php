@extends('layouts.admin')



@section('content')



<div class="container text-start py-5">

<h1 class="text-muted text-uppercase pb-4">Project n°{{$project->id}}</h1>

    <div class="row">
        <div class="col-6">
            <div class="card shadow rounded-3">
            <img  class="card-img-top rounded-top-3" src="{{asset($project->image)}}" alt="">
                <div class="card-body bg-light rounded-3">
                    <h3 class="py-3">{{$project->title}}</h3>
                    <h6>{{$project->slug}}</h6>
                    <p><a class="text-decoration-none" href="{{$project->github}}"><span class="text-black fw-medium">Git Hub link:</span> {{$project->github}}</a></p>
                    <p><a class="text-decoration-none" href="{{$project->second_link}}"><span class="text-black fw-medium">Second link:</span> {{$project->second_link}}</a></p>
                    <h6>Type: {{$project->type ? $project->type->name : 'Undefined'}}</h6>

                    <ul class="list-unstyled">
                        @foreach($project->technologies as $technology)
                        <li class="fw-medium">Technology: {{$technology->name}}</li>
                        @endforeach
                    </ul>
                    
                    <p>{{$project->content}}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection