@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card" >
                <div class="card-body">
                    <form method="GET" action="{{route('home')}}">
                        @csrf
                        <div class="row mb-0">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary">
                                        {{ __("<- Retour") }}
                                </button>
                            </div>
                        </div>
                    </form>

                    <h1>{{ $sauces->name }}</h1>
                    <form method="GET" action="{{ route('sauce.modifierForm', $sauces) }}">
                        @csrf
                        <div class="row mb-0">
                            <div class="col-md-8">
                            @if( $sauces->CreateBy == Auth::user()->name )
                                <button type="submit" class="btn btn-primary">
                                        {{ __("Modifier") }}
                                </button>
                            @else
                                <button type="submit" class="btn btn-primary" style="display:none;">
                                        {{ __("Modifier") }}
                                </button>
                            @endif                                
                            </div>
                        </div>
                    </form>
                    <form method="GET" action="{{ route('sauce.supprimer', $sauces) }}">
                        @csrf
                        <div class="row mb-0">
                            <div class="col-md-8">
                            @if( $sauces->CreateBy == Auth::user()->name )
                            <input type="submit" class="btn btn-danger  " value="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet élément ?');">
                            @endif
                            </div>
                        </div>
                    </form>
                    <h6>Fabriqué par: {{ $sauces->manufacturer }}</h6>
                    
                    @if( $sauces->CreateBy == "" )
                        <h6>Ajouté par: Unknow Users</h6>
                    @else
                        <h6>Ajouté par: {{ $sauces->CreateBy }}</h6>
                    @endif  
                    
                    <img src="{{ $sauces->imageUrl }}"  class="img-fluid" alt="">
                    <h4><U>Description:</U>  {{ $sauces->description }}</h4>
                    <h4><U>Ingrédient principale:</U>  {{ $sauces->mainPepper }}</h3>
                    <h4><U>Heat:</U> {{ $sauces->heat }}/10</h4>
                    <h4><U>Likes:</U> {{ $sauces->likes }}</h4>
                    <h4><U>Dislikes:</U> {{ $sauces->dislikes }}</h4>
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