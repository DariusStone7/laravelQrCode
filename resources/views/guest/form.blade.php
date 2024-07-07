@extends('app')

@section('main')
    <div class="container bg-white p-5" style="border-radius: 20px">
        @if (session('success'))
            <div class="d-flex alert alert-success alert-dismissible fade show justify-content-between" id="alert">
                {{ session('success') }}
                <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif(session('error'))
            <div class="d-flex alert alert-danger alert-dismissible fade show justify-content-between" id="alert">
                {{ session('error') }}
                <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (isset($guest->id))
            <h6 class="">Modification d'un visiteur</h6><br>
            <form class="form-floating" method="POST" action="{{ route('guest.update', ['guest' => $guest->id]) }}">
            @else
                <h6 class="">Création d'un visiteur</h6><br>
                <form class="form-floating" method="POST" action="{{ route('guest.store') }}">
        @endif
        @csrf
        @if (isset($guest->id))
            @method('put')
        @else
            @method('post')
        @endif
        <div class="row">
            <div class="col mb-3">
                <div class="col">
                    <label for="firstName">Nom</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="paul"
                        value="{{ $guest->firstname }}" required>
                    @error('firstname')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col">
                    <label for="lastName">Prénom</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="jean"
                        value="{{ $guest->lastname }}" required>
                    @error('lastName')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col">
                    <label for="address">Adresse</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Bandjoun"
                        value="{{ $guest->address }}" required>
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
                            <input type="date" class="form-control" id="birthday" name="birthday"
                                placeholder="05/01/2024" value="{{ $guest->birthday }}" required>
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
                                        value="Masculin" {{ $guest->sexe == 'Masculin' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="inlineRadio1">M</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" @checked($guest->sexe == 'Feminin') type="radio"
                                        name="sexe" id="inlineRadio2" value="Feminin">
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
                <div class="col">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="hello@gmail.com"
                        value="{{ $guest->email }}" required>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="modal-footer mt-3">
                    <a href="{{ route('guest.index') }}" class="btn btn-secondary">Retour</a>&ensp;&ensp;
                    <a href="{{ route('guest.create') }}" class="btn btn-outline-secondary">Nouveau</a>&ensp;&ensp;
                    <button type="submit"
                        class="btn btn-primary">{{ isset($guest->id) ? 'Modifier' : 'Enregistrer' }}</button>
                </div>
            </div>
            <div class="col">
                <p class="mb-0 text-center">Qr code</p><br>
                @if (isset($guest->qr_code))
                    <div class="text-center">
                        <img src="{{ asset('storage/qrcodes/' . $guest->qr_code) }}" /><br><br>
                        <a class="btn btn-info" href="{{ asset('storage/qrcodes/' . $guest->qr_code) }}"
                            download>Télécharger</a>
                    </div>
                @endif
            </div>
        </div>
        </form>
    </div>
@endsection
