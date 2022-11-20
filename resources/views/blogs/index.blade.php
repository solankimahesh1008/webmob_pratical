@extends('dashboard')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <a href="{{'blogs/create'}}" class="btn btn-primary mb-2">Create Blog</a>
                <br>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>description</th>
                        <th>Category</th>
                        <th>Created at</th>
                        <th colspan="2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($blogs as $blog)
                        <tr>
                            <td>{{ $blog->id }}</td>
                            <td>{{ $blog->title }}</td>
                            <td>{{ $blog->description }}</td>
                            <td>
                                @foreach ($blog->categories as $category) {
                                echo $category->name;
                                }
                                @endforeach
                            </td>
                            <td>{{ date('Y-m-d', strtotime($blog->created_at)) }}</td>
                            <td>
                                <a href="posts/{{$blog->id}}" class="btn btn-primary">Show</a>
                                <a href="posts/{{$blog->id}}/edit" class="btn btn-primary">Edit</a>
                                <form action="posts/{{$blog->id}}" method="post" class="d-inline">
                                    {{ csrf_field() }}
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection