@extends('layout')
@section('title','Register')
@section('content')
    <div class="contact_us">
        <div class="container">
            {{--            @if($errors->any())--}}
            {{--                @foreach($errors->all() as $error)--}}
            {{--                    <p class="alert alert-danger">{{$error}}</p>--}}
            {{--                @endforeach--}}
            {{--            @endif--}}
            <form method="post" action={{route('auth.login')}}>
                @csrf
                @if(session('message'))
                    <p class="alert alert-success mt-2">{{session('message')}}</p>
                @endif
                <div class="mb-3">
                    <label>Email</label>
                    <input class="form-control" name="email" value="{{old('email')}}" >
                    @error('email')
                    <p class="alert alert-danger mt-2">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input class="form-control" name="password" value="{{old('password')}}" >
                    @error('password')
                    <p class="alert alert-danger mt-2">{{$message}}</p>
                    @enderror
                </div>

                <input type="submit" class="btn btn-success" value="Login">
            </form>
        </div>
    </div>
@endsection
