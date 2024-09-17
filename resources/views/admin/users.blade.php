@extends('layout')
@section('title','Dashboard | data')

@section('content')
    <div class="data_data">
        <h2 class="text-center">All Users Info</h2>
        <table class="text-center table table-hover table-striped table-bordered">
            <thead>
            <tr>
                <th>Image</th>
                <th>Username</th>
                <th>Email</th>
                <th>Date</th>
                <th>Control</th>
            </tr>
            </thead>
            <tbody>
            @if($data->isEmpty())
                <tr>
                    <td colspan="8" class="text-center">No data found.</td>
                </tr>
            @else
                @foreach ($data as $item)
                    <tr>
                        <td>
                            @if($item->image?->name)
                                <img src="{{ asset('images/'.$item->image->name) }}" alt="">
                            @else
                                <img src="{{ asset('images/defualt.png') }}" >
                            @endif
                        </td>

                        <td>{{$item->username}}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item -> created_at}}</td>
                        <td>
                            <button class="btn btn-primary">Edit</button>
                            <button class="btn btn-danger">
                                <a href="/delete_item?model_name=users&id={{$item->id}}">Delete</a>
                            </button>
                        </td>
{{--                        <td><a href="{{route('dashboard.edit.item',$item->id)}}" class="btn btn-primary">Edit</a> <a href="/delete?model_name=data&id={{$item->id}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a></td>--}}
{{--                        <td><a href="" class="btn btn-primary">Edit</a> <a href="{{route('delete',$item->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a></td>--}}
                    </tr>
                @endforeach
            @endif
            </tbody>

        </table>
        {{ $data->links() }}
    </div>
@endsection
