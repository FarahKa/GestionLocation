@extends('base')



@section('navigation')
    @include('front.navigationUser')
@endsection

@section('header')
    @include('header')
@endsection

@section('content')

    <div class="container">
        <form method="post" action="{{route('searchVoitures')}}">
            @csrf
            <h1>Recherche de voitures:</h1>
            <div class="form-group">
                <label for="marque">Marque</label>
                <select class="form-control" id="marque" name="marque">

                        <option></option>
                    @foreach ($marques as $marque)
                        <option value="{{$marque->id}}">{{$marque->libelle}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="modele">Modele</label>
                <select class="form-control" id="modele" name="modele">
                    <option></option>
                </select>
            </div>
            <div class="form-group">
                <label for="nb_places">Nombre de places:</label>
                <input type="number" min="1" class="form-control" id="nb_places" name="nb_places">
            </div>
            <div class="form-group">
                <label for="dateDebut">Date de début:</label>
                <input type="date" name="dateDebut">
                <label for="dateFin">Date de fin:</label>
                <input type="date" name="dateFin">
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="manuelle" id="manuelle" value="1" checked>
                <label class="form-check-label" for="manuelle">
                    Manuelle
                </label>
            </div>
            <div class="form-group">
                <label for="couleur">Couleur</label>
                <input type="text" class="form-control" id="couleur" placeholder="couleur" name="couleur">
            </div>

            <button type="submit" class="btn btn-primary">Rechercher</button>
        </form>
    </div>



@endsection

@section('footer')
    @include('footer')

    <script src="{{asset('js/marque.js')}}"></script>
    <script type="text/javascript">
        var token = '{{ csrf_token() }}';
    </script>
@endsection