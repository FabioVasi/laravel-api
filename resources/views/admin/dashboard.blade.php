@extends('layouts.admin')

@section('content')
<div class="container">

    <h2 class="fs-4 text-secondary my-4">{{__('Welcome')}} {{ Auth::user()->name }}</h2>
    
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h3>Projects</h3>
                    <strong>{{$total_projects}}</strong>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
