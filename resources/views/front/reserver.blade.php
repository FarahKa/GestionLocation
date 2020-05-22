@extends('base')


@section('navigation')
    @include('front.navigationUser')
@endsection

@section('header')
    @include('header')
@endsection

@section('content')
    @if($errors->any())
        <h4>{{$errors->first()}}</h4>
    @endif
    <div class="container">
        <form method="post" action="{{route('storeReservation')}}">
            @csrf
            <div class="form-group">
                <label for="cin">CIN</label>
                <input type="text" class="form-control" id="cin"  name="cin">
            </div>
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom">
            </div>
            <div class="form-group">
                <label for="prenom">Prenom</label>
                <input type="text" class="form-control" id="prenom" name="prenom">
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="adresse">Adresse</label>
                <textarea class="form-control" id="adresse" name="adresse" rows="3"></textarea>
            </div>
            <input type="hidden" value="{{$idVoiture}}" name="idVoiture">
            @if(!isset($_SESSION['date_debut']))
                <div class="form-group">
                    <label for="dateDebut">Date de début:</label>
                    <input type="date" name="dateDebut" id="dateDebut">
                    <label for="dateFin">Date de fin:</label>
                    <input type="date" name="dateFin" id=dateFin">
                </div>
            @endif
            <button type="submit" class="btn btn-primary">Confirmer</button>
        </form>

    </div>



@endsection

@section('footer')
    @include('footer')
@endsection