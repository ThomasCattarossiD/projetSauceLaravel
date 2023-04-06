@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card" >
                <div class="card-body">
                    <h1>{{ $sauces->name }}</h1>
                    <img src="{{ $sauces->imageUrl }}"  class="img-fluid" alt="">
                    <h3>Description:  {{ $sauces->description }}</h3>
                    <h4>Heat: {{ $sauces->heat }}/10</h4>
                    <h4>Likes: {{ $sauces->likes }}</h4>
                    <h4>Dislikes: {{ $sauces->dislikes }}</h4>
                    <form method="GET" action="{{ route('sauce.addLike', $sauces) }}">
                        @csrf
                        <div class="row mb-0">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary">
                                        {{ __("J'aime") }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <form method="GET" action="{{ route('sauce.addDislike', $sauces) }}">
                        @csrf
                        <div class="row mb-0">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary">
                                        {{ __("Je n'aime pas") }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>        
            </div>
        </div>
    </div>
</div>
@endsection