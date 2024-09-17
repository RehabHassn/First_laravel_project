@extends('layout')
@section('title','Contact')
@section('content')
    <div class="contact_us">
        <div class="container">
{{--            @if($errors->any())--}}
{{--                @foreach($errors->all() as $error)--}}
{{--                    <p class="alert alert-danger">{{$error}}</p>--}}
{{--                @endforeach--}}
{{--            @endif--}}
            <form method="post" action={{route('contact.save')}}>
                @csrf
                @if(session('success'))
                    <p class="alert alert-success mt-2">{{session('success')}}</p>
                @endif
                <div class="mb-3">
                    <label>Username</label>
                    <input class="form-control" name="username" value="{{old('username')}}">
                    @error('username')
                     <p class="alert alert-danger mt-2">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label>Title</label>
                    <input class="form-control" name="title" value="{{old('title')}}" >
                    @error('title')
                    <p class="alert alert-danger mt-2">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label>Message</label>
                    <textarea class="form-control" name="message" value="{{old('message')}}"></textarea>
                    @error('message')
                    <p class="alert alert-danger mt-2">{{$message}}</p>
                    @enderror
                </div>
                <input type="submit" class="btn btn-success" value="send">
            </form>
        </div>
    </div>
@endsection
