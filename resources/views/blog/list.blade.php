@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Blogs</div>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Created At</th>
                            <th scope="col">updated At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($blogs as $blog)
                                <tr>
                                    <th scope="row">{{ $blog->id  }}</th>
                                    <td>{{ $blog->title  }}</td>
                                    <td>{{ $blog->description  }}</td>
                                    <td>{{ $blog->created_at->diffForHumans()  }}</td>
                                    <td>{{ $blog->updated_at->diffForHumans()  }}</td>
                                </tr>
                            @endforeach        
                        </tbody>
                    </table>
                    {!! $blogs->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
