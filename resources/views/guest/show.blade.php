@extends('app')

@section('main')
    <div class="container bg-white p-5" style="border-radius: 20px">

        {{-- @if (isset($guest->id)) --}}
            <div class="row">
                <div class="col">
                    <h4>Informations personnelles</h4>
                    <hr>
                    <p>Nom: {{ $guest->firstname }} {{ $guest->lastname }}</p>
                    <p>Adresse: {{ $guest->address }}</p>
                    <p>Email: {{ $guest->email }}</p>
                    <p>Né le: {{ $guest->birthday }}</p>
                    <p>Sexe: {{ $guest->sexe }}</p>
                </div>
                <div class="col">
                    <p class="mb-0 text-center">Qr code</p><br>
                    @if (isset($guest->qr_code))
                        <div class="text-center">
                            <img src="{{ asset('storage/qrcodes/' . $guest->qr_code) }}" /><br><br>
                            <a class="btn btn-primary" href="{{ asset('storage/qrcodes/' . $guest->qr_code) }}"
                                download>Télécharger</a>
                        </div>
                    @endif
                </div>
            </div><br>
            <a href="{{route('guest.index')}}" class="btn btn-secondary">Retour</a>&ensp;&ensp;
            
        {{-- @endif --}}
    </div>
@endsection
