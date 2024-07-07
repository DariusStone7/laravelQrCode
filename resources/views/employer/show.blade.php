@extends('app')

@section('main')
    <div class="container bg-white p-5" style="border-radius: 20px">

        {{-- @if (isset($guest->id)) --}}

        <h4>Informations personnelles</h4>
        <hr>
        <div class="row">
            <div class="col">
                <p>Nom: {{ $employer->firstname }} {{ $employer->lastname }}</p>
                <p>Adresse: {{ $employer->address }}</p>
                <p>Email: {{ $employer->email }}</p>
                <p>Né le: {{ $employer->birthday }}</p>
                <p>Sexe: {{ $employer->sexe }}</p>
            </div>
            <div class="col">
                <p>Matricule: {{ $employer->matricule }}</p>
                <p>N° Carte: {{ $employer->card_number }}</p>
            </div>
        </div><br>
        <a href="{{route('employe.index')}}" class="btn btn-secondary">Retour</a>&ensp;&ensp;
        
        {{-- @endif --}}
    </div>
@endsection
