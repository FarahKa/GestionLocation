<h1>Suppression d'une marque:</h1>
<form method="post" action="{{route('deleteMarque')}}">
    @csrf
    <div class="form-group">
        <label for="marque">Marque</label>
        <select class="form-control" id="marque" name="marque">
            @foreach($marques as $marque)
                <option>{{$marque->libelle}}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Supprimer</button>
</form>