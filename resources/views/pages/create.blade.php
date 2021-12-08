@extends('layouts.app')

    @section('body')

        @if ( session('status') )
            <div class="alert alert-primary mb-1 mt-1" role="alert">
                {{ session('status') }}
            </div>
        @endif

        @if( $updateStatus != null )
        <form action="{{ route('update',[ 'id' => $comment->id ]) }}" method="post" class="mt-5">
        @else
        <form action="{{ route('create') }}" method="post" class="mt-5">
        @endif
            @csrf
            @if($updateStatus != null )
                @method('PUT')
                <div class="form-group">
                    <textarea name="comment" id="" cols="50" rows="10" class="form-control" > {{$comment->comment}} </textarea>
                </div>
            @else
                <div class="form-group">
                    <textarea name="comment" id="" cols="50" rows="10" class="form-control" placeholder="Enter Your Comment"></textarea>
                </div>
            @endif
            @error('comment')
                <div class="text-danger" role="alert">
                    {{$message}}
                </div>
            @enderror
            <div class="form-group">
                @if($updateStatus != null)
                <input type="submit" class="btn btn-secondary btn-block" value="Update">
                @else 
                <input type="submit" class="btn btn-secondary btn-block" value="Submit">
                @endif
            </div>
        </form>
        
    @endsection
                
