@extends('layouts.app')

    @section('body')
        @if ( session('status') )
            <div class="text-primary">
                {{ session('status') }}
            </div>
        @endif
        <table class="table table-striped table-inverse table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th>ID</th>
                    <th>Comments</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($comments as $comment)
                    <tr>
                        <td>{{$comment->id}}</td>
                        <td>{{$comment->comment}}</td>
                        <td><a href="{{route('showUpdateForm',[ 'update' => 1 ,'updateId' => $comment->id ])}}" class="btn btn-primary">Update</a></td>
                        <td><a href="{{route('delete',[ 'id' => $comment->id ])}}" class="btn btn-danger">Delete</a></td>
                    </tr>
               
                    @endforeach
                    
                </tbody>
        </table>

    @endsection