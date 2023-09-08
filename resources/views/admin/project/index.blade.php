@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="buttons d-flex justify-content-end">

        </div>
        <table id="projects-table" class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Image</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $project)
                    <tr class="align-middle">
                        <th scope="row">{{ $project->id }}</th>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->content }}</td>
                        <td>{{ $project->slug }}</td>
                        <td>{{ $project->image }}</td>
                        <td>{{ $project->created_at }}</td>
                        <td>{{ $project->updated_at }}</td>
                        <td class="vert">
                            <a href="{{ route('admin.project.show', $project) }}" class="btn btn-secondary"><i
                                    class="bi bi-eye"></i>SHOW</a>
                            <a href="{{ route('admin.project.edit', $project) }}" class="btn btn-primary"><i
                                    class="bi bi-pen"></i></a>
                            <form class="d-inline delete-form" action="{{ route('admin.project.destroy', $project) }}"
                                method="POST" data-name="{{ $project->title }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="bi bi-x-lg"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" style="width: 15%;">
                            <h2>Nothing to see here..</h2>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
    @vite('resources/js/delete-confirm.js');
@endsection
