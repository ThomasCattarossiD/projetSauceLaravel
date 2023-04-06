@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Information') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3>Bienvenu sur Hot Takes,</h3>
                    <span>
                    Hot takes, est un site qui références des millions de sauce piquantes et qui les notes au plus grand plaisir des utilisateurs, amateur ou fan de sauce piquantes en tout cas je vous félicite d'avoir lu jusqu'ici car la vraiment je n'ai plus aucune inspiration pour continuer ma phrase donc je comble avec ce que je peux bref vive les sauces piquantes et bienvenu sur le site

                    </span>

                    <form method="GET" action="{{ route('home') }}">
                        @csrf

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                        {{ __('Entrez') }}
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
