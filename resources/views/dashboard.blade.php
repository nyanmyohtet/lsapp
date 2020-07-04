@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div>
                        <a href="/posts/create" class="btn btn-primary">Create Post</a>
                    </div>

                    <h3>Posts List</h3>
                    @if(count($posts) > 0)
                        @foreach($posts as $post)
                            <table class="table table-striped">
                                <tr>
                                    <th>Title</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td>{{$post->title}}</td>
                                    <td><a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a></td>
                                    <td>
                                        {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                            {!!Form::hidden('_method', 'DELETE')!!}
                                            {!!Form::submit('Delete', ['class' => 'btn btn-danger'])!!}
                                        {!!Form::close()!!}
                                    </td>
                                </tr>
                            </table>
                        @endforeach
                    @else
                        <p>You have no post.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
