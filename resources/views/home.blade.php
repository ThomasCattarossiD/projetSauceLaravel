@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        @foreach ($sauces as $sauce)
        <div class="col-md-2">
            <div class="card" >
                <div class="card-body">
                <a href="{{ route('sauce.show', $sauce) }}" style="text-decoration: none; color: inherit;">
                    <img src="{{ $sauce->imageUrl }}"  class="img-fluid" alt="">
                    <h3>{{ $sauce->name }}</h3>
                    <h6>Heat {{ $sauce->heat }}/10</h6>
                </a>
                </div>        
            </div>
        </div> 
        @endforeach
           
    </div>
</div>
@endsection
