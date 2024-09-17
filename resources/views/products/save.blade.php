@extends('layout')
@section('title','Create Product')

@section('content')

   <div class="create-product">
{{--       @if(session('success'))--}}
{{--           <p class="alert alert-success">{{session('success')}}</p>--}}
{{--       @endif--}}
       <h1 class="text-center">Create Product</h1>
       <div class="container">
           <div class="row">
               <div class="col-lg-6 mb-2">
                   <form method="post" enctype="multipart/form-data"
                         @if(!(isset($data))) action=" {{route('products.store')}}
                          @else action=" {{route('products.update',$data->id)}} @endif ">
                       @csrf
                   @error('error')
                   <p class="alert alert-warning">{{$message}}</p>
                   @enderror
                       <div class="mb-2">
                           @if(isset($data))
                               <input type="hidden" name="_method" value="PUT">
                           @endif
                           <label>Name</label>
                           <input class="form-control simulated" name="name" value="{{isset($data)?$data->name:''}}">
                       </div>
                       <div class="mb-2">
                           <label>Info</label>
                           <textarea class="form-control simulated" name="info"
                                     required>{{isset($data)?$data->name:''}}</textarea>
                       </div>
                       <div class="mb-2">
                           <label>Price</label>
                           <input class="form-control simulated" name="price" value="{{isset($data)?$data->name:''}}">
                       </div>
                       <div class="mb-2">
                           <label>Imges</label>
                           @if(isset($data))
                               <div class="d-flex form-images">
                                   @foreach($data->images as $image)
                                       <div class="position-relative delete-image">
                                           <a href="/delete-item?model_name=Images&id={{$image->id}}">
                                               <i class="ri-close-line"></i></a>
                                           <img src="{{asset('$images/'.$image->name)}}">
                                       </div>
                                   @endforeach
                               </div>
                           @endif
{{--                           @if($edit)--}}
{{--                               <div class="form-images d-flex">--}}
{{--                                   @foreach($product->images as $image)--}}
{{--                                       <div class="position-relative">--}}
{{--                                           <a href="/delete?model_name=images&id={{$image->id}}" onclick="return confirm('Are you sure you want to delete this item?');"><i class="ri-delete-bin-2-fill"></i></a>--}}
{{--                                           <img class="m-3" src="{{ asset('images/'.$image->name) }}" alt="">--}}
{{--                                       </div>--}}
{{--                                   @endforeach--}}
{{--                               </div>--}}
{{--                           @endif--}}
                           <input class="form-control" name="images[]" type="file" accept="image/*" multiple>
                       </div>
                       <input type="submit" value="submit" class="btn btn-success form-control">
                   </form>
               </div>
               <div class="col-lg-6 mb-2">
                   <div class="simulation d-flex">
                       <div class="images">

                       </div>
                       <div class="info">
                           <p>
                               <span>Name : </span>
                               <span related_to="name"></span>
                           </p>
                           <p>
                               <span>Describtion about product : </span>
                               <span related_to="info"></span>
                           </p>
                           <p>
                               <span>Price : </span>
                               <span related_to="price"></span>
                           </p>
                       </div>
                   </div>
               </div>
           </div>

       </div>
   </div>
@endsection
