
    <h1>Ajout d'une marque:</h1>
    <form method="post" action="{{route('storeMarque')}}">
        @csrf
        <div class="form-group">
            <label for="libelle">Libelle</label>
            <input type="text" class="form-control" id="libelle" placeholder="" name="libelle">
        </div>

            <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>




