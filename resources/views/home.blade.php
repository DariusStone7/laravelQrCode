@extends('app')

@section('main')
<section id="hero" class="hero section dark-background">

    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
          <h1>Beinvenue, {{auth()->user()->name}}</h1>
          <p>Gérer vos employés et vos visiteurs</p>
          <div class="d-flex">
            <a href="{{route('employe.index')}}" class="btn btn-primary">Employés</a> &ensp;&ensp;
            <a href="{{route('guest.index')}}" class="btn btn-outline-primary">Visiteurs</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="{{asset('images/hero-img.png')}}" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section>
@endsection