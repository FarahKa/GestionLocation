@extends('base')

@section('navigation')
    @include('navigationAdmin')
@endsection

@section('header')
    @include('header')
@endsection

@section('content')

    @foreach ($marques as $marque)

        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="..." alt="image">
            <div class="card-body">
                <h5 class="card-title">{{ $marque->libelle }} </h5>
                <p class="card-text">
                    Modeles:
                    <ol>
                        @foreach ($marque->modeles as $modele)
                        <li>
                            {{$modele->libelle}}

                        </li>
                        @endforeach
                    </ol>


                </p>
                <a href="#" class="btn btn-primary">Afficher</a>
            </div>
        </div>

    @endforeach


@endsection

@section('footer')
    @include('footer')
@endsection