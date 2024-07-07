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
        <h4 class="text-center">Listes des visiteurs</h4>
        <a href=" {{ route('guest.create') }}" class="btn btn-outline-primary" style="float: right">+
            Ajouter</a> 
        <a href=" {{ route('guest.scan') }}" class="btn btn-primary" style="float: right; margin-right:20px">
            Scan</a><br><br>
        <hr>
        <table class="table table-striped" style="font-family: 'Arial, Helvetica, sans-serif'; font-size:12px">
            <thead>
                <tr>
                    <th scope="col">N°</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Sexe</th>
                    <th scope="col">Date</th>
                    <th scope="col">adresse</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($guests as $key => $guest)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $guest->firstname }} {{ $guest->lastname }}</td>
                        <td>{{ $guest->email }}</td>
                        <td>{{ $guest->sexe }}</td>
                        <td>{{ $guest->birthday }}</td>
                        <td>{{ $guest->address }}</td>
                        <td class="d-flex">
                            <a class="nav-link text-primary" href="{{ route('guest.show', [$guest->id]) }}"><i
                                    class="bi bi-eye fs-6"></i></a>
                            &ensp;&ensp;
                            <a class="nav-link text-success" href="{{ route('guest.edit', [$guest->id]) }}"><i
                                    class="bi bi-pencil-square"></i></a>
                            &ensp; &ensp;
                            <form action="{{ route('guest.destroy', [$guest->id]) }}" method="POST">
                                @method('delete')
                                @csrf
                                <button type="submit" class="nav-link text-danger"
                                    onclick="confirm('Souhaitez vous supprimer ce visiteur ?')"><i
                                        class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                @endforelse
            </tbody>

        </table>
        {{ $guests->links() }}
    </div>

    <div class="container text-center">
        {{-- <div class="row">
            <div class="col">
                <p class="mb-0">Simple</p>
                {!! $simple !!}
            </div>
            <div class="col">
                <p class="mb-0">Color Change</p>
                {!! $changeColor !!}
            </div>
            <div class="col">
                <p class="mb-0">Background Color Change </p>
                {!! $changeBgColor !!}
            </div>
        </div> --}}
        {{-- <div class="row mt-5">
            <div class="col">
                <p class="mb-0">Style Square</p>
                {!! $styleSquare !!}
            </div>
            <div class="col">
                <p class="mb-0">Style Dot</p>
                {!! $styleDot !!}
            </div>
            <div class="col">
                <p class="mb-0">Style Round</p>
                {!! $styleRound !!}
            </div>
        </div> --}}

    </div>
    
@endsection
