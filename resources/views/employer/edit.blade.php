@extends('app')

@section('main')
    <div class="container bg-white p-5" style="border-radius: 20px">
        <h6 class="">Modification d'un employé</h6><br>
        @if (isset($employer->id))
            <form class="form-floating" method="POST" action="{{ route('employe.update', ['employe' => $employer->id]) }}">
            @else
                <form class="form-floating" method="POST" action="{{ route('employe.store') }}">
        @endif
        @csrf
        @if (isset($employer->id))
            @method('put')
        @else
            @method('post')
        @endif
        <div class="row mb-3">
            <div class="col">
                <label for="firstName">Nom</label>
                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="paul" value="{{$employer->firstname}}"
                    required>
                @error('firstname')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col">
                <label for="lastName">Prénom</label>
                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="jean" value="{{$employer->lastname}}"
                    required>
                @error('lastName')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="card_number">N° Carte</label>
                <input type="text" class="form-control" id="card_number" name="card_number" placeholder="2324212"
                    value="{{$employer->card_number}}" required>
                @error('card_number')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col">
                <label for="matricule">Matricule</label>
                <input type="text" class="form-control" id="matricule" name="matricule" placeholder="E123423"
                    value="{{$employer->matricule}}" required>
                @error('matricule')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="address">Adresse</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Bandjoun"
                    value="{{$employer->address}}" required>
                @error('address')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col">
                <div class="row">
                    <div class="col">
                        <label for="birthday">Date</label>
                        <input type="date" class="form-control" id="birthday" name="birthday" placeholder="05/01/2024"
                            value="{{$employer->birthday}}" required>
                        @error('birthday')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="sexe">Sexe</label><br>
                        <div class="mt-2">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sexe" id="inlineRadio1"
                                    value="Masculin" {{$employer->sexe=='Masculin' ? 'checked':''}}>
                                <label class="form-check-label" for="inlineRadio1">M</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" @checked($employer->sexe=='Feminin') type="radio" name="sexe" id="inlineRadio2"
                                    value="Feminin">
                                <label class="form-check-label" for="inlineRadio2">F</label>
                            </div>
                        </div>
                        @error('sexe')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="hello@gmail.com"
                    value="{{$employer->email}}" required>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="modal-footer">
            <a href="{{route('employe.index')}}" class="btn btn-secondary">Annuler</a>&ensp;&ensp;
            <button type="submit"
                class="btn btn-primary">{{ isset($employer->id) ? 'Modifier' : 'Enregistrer' }}</button>
        </div>
        </form>
    </div>
@endsection
