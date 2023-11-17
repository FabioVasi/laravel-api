@extends('layouts.admin')



@section('content')

@if(session('message'))
<div class="mt-3 alert alert-success alert-dismissible  fade show" role="alert">
    <button type="button" class="btn-close" data_bs_dismiss="alert" aria-label="Close"></button>
    <strong>Message:</strong>{{session('message')}}
</div>
@endif

<h1 class="text-muted text-uppercase py-4">All Projects</h1>

<a href="{{route('admin.projects.create')}}" class="btn btn-primary rounded-pill mb-3">Add</a>

<div class="table-responsive-md">
    <table class="table table-striped table-hover table-borderless table-light table-middle">
        <thead class="table-light">
            <caption>Projects Post</caption>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Git Hub</th>
                <th>Second Link</th>
                <th>Title</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">

            @forelse($projects as $project)
            <tr class="table-secondary">
                <td>{{$project->id}}</td>
                <td>
                    @if($project->image)
                    <img height="180" src="{{asset($project->image)}}" alt="">
                    @else
                    N/A
                    @endif
                </td>
                <td><a href="{{$project->github}}">{{$project->github}}</a></td>
                <td><a href="{{$project->second_link}}">{{$project->second_link}}</a></td>
                <td>{{$project->title}}</td>
                <td>
                    <ul class="list-unstyled m-0">

                        <li>
                            <a href="{{route('admin.projects.show', $project)}}" class="btn btn-primary">View</a>
                        </li>

                        <li class="my-4">
                            <a href="{{route('admin.projects.edit', $project)}}" class="btn btn-secondary">Edit</a>
                        </li>

                        <li>
                            <!-- Modal trigger button -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteProject-{{$project->id}}">
                            Delete
                            </button>
                            
                            <!-- Modal Body -->
                            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                            <div class="modal fade" id="deleteProject-{{$project->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId-{{$project->id}}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalTitle-{{$project->id}}">{{$project->title}}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Delete Operation!
                                        </div>
                                        <div class="modal-footer">

                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                            <form action="{{route('admin.projects.destroy', $project)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Confirm</button>
                                            </form>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <!-- Optional: Place to the bottom of scripts -->
                            <script>
                                const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)
                            
                            </script>
                        </li>

                    </ul>
                </td>
            </tr>
            @empty

            @endforelse
            {{$projects->links('pagination::bootstrap-5')}}
        </tbody>
        <tfoot>

        </tfoot>
    </table>
</div>

@endsection