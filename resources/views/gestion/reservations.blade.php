@extends('base')

@section('navigation')
    @include('navigationAdmin')
@endsection

@section('header')
    @include('header')
@endsection

@section('content')

    @foreach ($reservations as $reservation)

        <div class="card" style="width: 18rem">
            <img class="card-img-top" src="..." alt="image">
            <div class="card-body">
                <h5 class="card-title">{{ $reservation->client->nom }} {{$reservation->client->prenom}}</h5>
                <p class="card-text">
                    Voiture: {{$reservation->voiture->matricule}}
                    Date debut: {{$reservation->dateDebut}}
                    Date fin: {{$reservation->dateFin}}
                    Etat: @if ($reservation->confirmed) Confirmé @else Non Confirmé @endif

                </p>
                    <a href="{{route('confirmReservation', $reservation->id)}}"  class="btn btn-success">Confirmer</a>
                      <a href="{{route('deleteReservation', $reservation->id)}}"  class="btn btn-danger">Supprimer</a>

            </div>
        </div>

    @endforeach


@endsection

@section('footer')
    @include('footer')
@endsection