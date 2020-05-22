@extends('base')

@section('navigation')
    @include('navigationAdmin')
@endsection

@section('header')
    @include('header')
@endsection

@section('content')

    <div class="container">
        @foreach ($voitures as $voiture)

            <div class="card" style="">
                <img class="card-img-top" src="@if(null != ($voiture->images->first())) {{$voiture->images()->first()->chemin}}
                @endif " alt="image">
                <div class="card-body">
                    <?php //var_dump($voiture->modele->marque->libelle); die(); ?>
                    <h5 class="card-title">{{ $voiture->modele->marque->libelle }} {{$voiture->modele->libelle}} </h5>
                    <p class="card-text">Matricule: {{$voiture->matricule}}
                        Prix/jour: {{$voiture->prix}}
                        Couleur: {{$voiture->couleur}}
                        Carburant: {{$voiture->carburant}}
                        Places: {{$voiture->nb_places}}
                        Type: @if ($voiture->manuelle) manuelle @else automatique @endif
                    </p>
                    <a href="{{route('deleteVoiture', $voiture->id)}}"  class="btn btn-danger">Supprimer</a>
                </div>
            </div>

        @endforeach
    </div>


@endsection

@section('footer')
    @include('footer')
@endsection