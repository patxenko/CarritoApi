@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
       <div class="col-sm-3 bg-light">
               <a href="{{route('cart.checkout')}}"> VER CARRITO <span class="badge badge-danger"></span></a>
       </div>
       <div class="col-sm-9">
            <div class="row  justify-content-center">
                @forelse ($productos as $item)
                <div class="col-4 border p-5 mt-5 text-center">
                    <h1>{{$item->nombre}}</h1>
                    <P>$ {{$item->precio}}</P>
                    <form action="{{route('cart.add')}}" method="post">
                        @csrf
                        <input type="hidden" name="producto_id" value="{{$item->id}}">
                        <input type="submit" name="btn"  class="btn btn-success" value="ADD TO CART">
                    </form>
                </div>
            @empty
                
            @endforelse
            </div>
       </div>
    </div>
</div>
@endsection