<h1>Suppression d'un modele:</h1>
<form method="post" action="{{route('deleteModele')}}">
    @csrf
    <div class="form-group">
        <label for="marque">Modele</label>
        <select class="form-control" id="modele" name="modele">

            @foreach($modeles as $modele)
                <option>{{$modele->libelle}}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Supprimer</button>
</form>