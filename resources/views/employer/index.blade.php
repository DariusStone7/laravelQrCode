@extends('app')
@section('main')
    <div class="container bg-white p-5" style="border-radius: 20px;">
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
        <h4 class="text-center">Listes des employés</h4>
        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#employeModal"
            style="float: right">+
            Ajouter</button><br><br>
        <hr>

        <table class="table table-striped" style="font-family: 'Arial, Helvetica, sans-serif'; font-size:12px">
            <thead>
                <tr>
                    <th scope="col">N°</th>
                    <th scope="col">Matricule</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Sexe</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($employers as $key => $employe)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $employe->matricule }}</td>
                        <td>{{ $employe->firstname }} {{ $employer->lastname }}</td>
                        <td>{{ $employe->email }}</td>
                        <td>{{ $employe->sexe }}</td>
                        <td>{{ $employe->birthday }}</td>
                        <td class="d-flex">
                            <a class="nav-link text-primary" href="{{ route('employe.show', [$employe->id]) }}"><i
                                class="bi bi-eye fs-6"></i></a>
                        &ensp;&ensp;
                            <a class="nav-link text-success" href="{{ route('employe.edit', [$employe->id]) }}"><i
                                    class="bi bi-pencil-square"></i></a>
                            &ensp; &ensp;
                            <form action="{{ route('employe.destroy', [$employe->id]) }}" method="POST">
                                @method('delete')
                                @csrf
                                <button type="submit" class="nav-link text-danger"
                                    onclick="confirm('Souhaitez vous supprimer cet employé ?')"><i
                                        class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                @endforelse
            </tbody>

        </table>
        {{ $employers->links() }}
    </div>


    <!-- Modal -->
    <div class="modal fade" id="employeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Création d'un employé</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if (isset($employer->id))
                        <form class="form-floating" method="POST"
                            action="{{ route('employe.update', ['employe' => $employer->id]) }}">
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
                            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="paul"
                                value="" required>
                            @error('firstname')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="lastName">Prénom</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="jean"
                                value="" required>
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
                            <input type="text" class="form-control" id="card_number" name="card_number"
                                placeholder="2324212" value="" required>
                            @error('card_number')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="matricule">Matricule</label>
                            <input type="text" class="form-control" id="matricule" name="matricule" placeholder="E123423"
                                value="" required>
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
                            <input type="text" class="form-control" id="address" name="address"
                                placeholder="Bandjoun" value="" required>
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
                                        placeholder="05/01/2024" value="" required>
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
                                            <input class="form-check-input" type="radio" name="sexe"
                                                id="inlineRadio1" value="Masculin">
                                            <label class="form-check-label" for="inlineRadio1">M</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" checked type="radio" name="sexe"
                                                id="inlineRadio2" value="Feminin">
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
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="hello@gmail.com" value="" required>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit"
                            class="btn btn-primary">{{ isset($employer->id) ? 'Modifier' : 'Enregistrer' }}</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
