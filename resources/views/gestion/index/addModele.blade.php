<h1>Ajout d'un modele:</h1>
<form method="post" action="{{route('storeModele')}}">
    @csrf
    <div class="form-group">
        <label for="marque">Marque</label>
        <select class="form-control" id="marque" name="marque">
            @foreach($marques as $marque)
                <option>{{$marque->libelle}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="libelle">Libelle</label>
        <input type="text" class="form-control" id="libelle" placeholder="" name="libelle">
    </div>

    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>