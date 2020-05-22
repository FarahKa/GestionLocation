
<h1>Ajout d'une voiture:</h1>
    <form method="post" action="{{route('storeVoiture')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="matricule">Matricule</label>
            <input type="text" class="form-control" id="matricule" placeholder="0000TN" name="matricule">
        </div>
        <div class="form-group">
           <label for="marque">Marque</label>
            <select class="form-control" id="marque" name="marque">
                <option></option>
                @foreach($marques as $marque)
                <option value="{{$marque->id}}">{{$marque->libelle}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="modele">Modele</label>
            <select class="form-control" id="modele" name="modele">
            </select>
        </div>
        <div class="form-group">
            <label for="couleur">Couleur</label>
            <input type="text" class="form-control" id="couleur" placeholder="couleur" name="couleur">
        </div>
        <div class="form-group">
            <label for="carburant">Carburant</label>
            <input type="text" class="form-control" id="carburant" placeholder="carburant" name="carburant">
        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="manuelle" id="manuelle" value="1" checked>
            <label class="form-check-label" for="manuelle">
                Manuelle
            </label>
        </div>
        <div class="form-group">
            <label for="prix">Prix</label>
            <input type="number" step="0.01" min="0" class="form-control" id="prix" placeholder="prix" name="prix">
        </div>
        <div class="form-group">
            <label for="nb_places">Nombre de places:</label>
            <input type="number" min="1" class="form-control" id="nb_places" placeholder="1" name="nb_places">
        </div>
                <div class="form-group">
                    <label for="image">Photo</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>



