@extends('base')

@section('navigation')
    @include('navigationAdmin')
@endsection

@section('header')
    @include('header')
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-4">@include("gestion.index.addVoiture")</div>
            <div class="col-md-4">@include("gestion.index.addMarque") @include("gestion.index.deleteMarque")</div>
            <div class="col-md-4">@include("gestion.index.addModele") @include("gestion.index.deleteModele")</div>
        </div>

    </div>






@endsection

@section('footer')
    @include('footer')

    <script src="{{asset('js/marque.js')}}"></script>
    <script type="text/javascript">
        var token = '{{ csrf_token() }}';
    </script>
@endsection

