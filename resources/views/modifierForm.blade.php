@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card" >
                <div class="card-body">
                <form method="POST" action="{{ route('sauce.updateSauce', $sauce) }}">
                    @csrf
                    <div>
                        <label for="name">Nom de la sauce :</label>
                        <input type="text" id="name" name="name" value="{{$sauce->name}}" required>
                    </div>

                    <div>
                        <label for="manufacturer">Fabriquant de la sauce :</label>
                        <input type="text" id="manufacturer" name="manufacturer" value="{{$sauce->manufacturer}}" required>
                    </div>

                    <input type="hidden" name="CreateBy" value="{{ Auth::user()->name }}">

                    <div>
                        <label for="description">Description :</label>
                        <input type="text" id="description" name="description" value="{{$sauce->description}}" required>
                    </div>

                    <div>
                        <label for="mainPepper">Ingredient principal :</label>
                        <input type="text" id="mainPepper" name="mainPepper"  value="{{$sauce->mainPepper}}" required>
                    </div>

                    <div>
                        <label for="imageUrl">URL de L'image: </label>
                        <input type="text" id="imageUrl" name="imageUrl" value="{{$sauce->imageUrl}}" required >
                        <div id="image_preview"></div>
                    </div>

                    <div class="form-group">
                        <label for="heat">Heat:</label>
                        <input type="range" name="heat" id="heat" min="0" max="10" value="{{$sauce->heat}}" class="form-control-range">
                        <output for="heat" id="heat-output">{{$sauce->heat}}</output>
                    </div>
                    <input type="hidden" name="likes" value="{{$sauce->likes}}">
                    <input type="hidden" name="dislikes" value="{{$sauce->dislikes }}">

                    <div class="row mb-0">
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary">
                                    {{ __("Modifier la sauce") }}
                            </button>
                        </div>
                    </div>
                </form>
                <form method="GET" action="{{ url()->previous() }}">
                        @csrf
                        <div class="row mb-0">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary">
                                        {{ __("Annuler") }}
                                </button>
                            </div>
                        </div>
                </form>
                </div>        
            </div>
        </div>
    </div>
</div>

<script>
    
    var imageUrl = document.getElementById('imageUrl');
    var imagePreview = document.getElementById('image_preview');

    imageUrl.addEventListener('input', function() {
        var url = imageUrl.value;
        if (url !== '') {
            imagePreview.innerHTML = '<img src="' + url + '" alt="Image preview">';
        } else {
            imagePreview.innerHTML = '';
        }
    });

    var HeatInput = document.getElementById("heat");
    var HeatOutput = document.getElementById("heat-output");

    HeatInput.addEventListener("input", function() {
        HeatOutput.value = HeatInput.value;
    });

    window.addEventListener("load", function() {
        imagePreview.innerHTML = '<img src="' + imageUrl.value + '" alt="Image preview">';
    });

</script>
@endsection