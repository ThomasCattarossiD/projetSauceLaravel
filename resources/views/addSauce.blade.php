@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card" >
                <div class="card-body">
                <form method="POST" action="{{route('ajouterSauce') }}">
                    @csrf
                    <div>
                        <label for="name">Nom de la sauce :</label>
                        <input type="text" id="name" name="name" required>
                    </div>

                    <div>
                        <label for="manufacturer">Fabriquant de la sauce :</label>
                        <input type="text" id="manufacturer" name="manufacturer" required>
                    </div>

                    <input type="hidden" name="CreateBy" value="{{ Auth::user()->name }}">

                    <div>
                        <label for="description">Description :</label>
                        <input type="text" id="description" name="description" required>
                    </div>

                    <div>
                        <label for="mainPepper">Ingredient principal :</label>
                        <input type="text" id="mainPepper" name="mainPepper" required>
                    </div>

                    <div>
                        <label for="imageUrl">URL de L'image: </label>
                        <input type="text" id="imageUrl" name="imageUrl" required >
                        <div id="image_preview"></div>
                    </div>

                    <div class="form-group">
                        <label for="heat">Heat:</label>
                        <input type="range" name="heat" id="heat" min="0" max="10" value="0" class="form-control-range">
                        <output for="heat" id="heat-output">0</output>
                    </div>
                    <input type="hidden" name="likes" value="0">
                    <input type="hidden" name="dislikes" value="0">

                    <div class="row mb-0">
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary">
                                    {{ __("Ajouter la sauce") }}
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

</script>
@endsection