@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2">
            <div class="card">
                <div class="card-header">{{ __('Nom sauce 1') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Sauce 1') }}
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card">
                <div class="card-header">{{ __('Nom Sauce 2') }}</div>

                <div class="card-body">
                    
                {{ __('Sauce2') }}
                </div>
            </div>
        </div>    
    </div>
</div>
@endsection
