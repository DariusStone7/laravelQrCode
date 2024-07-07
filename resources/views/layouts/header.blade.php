@php
    $route = url()->current();
@endphp
<nav class="navbar navbar-expand-lg navbar-light bg-white p-3" style="box-shadow: 0px 0px 8px 0px rgb(88, 88, 88)">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('home')}}" style="color: rgb(8, 70, 67); font-family: 'Times New Roman'; font-weight:bold">SYSTEME DE CONTROLE DE FLUX</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class=" collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto d-flex align-items-center">
          <li class="nav-item">
            <a class="nav-link menu mx-2 {{str_contains($route,'employe') ? 'active': ''}}" aria-current="page" href="{{route('employe.index')}}">Employés</a>
          </li>
          <li class="nav-item">
            <a class="nav-link menu mx-2 {{str_contains($route, 'guest') ? 'active': ''}}" href="{{route('guest.index')}}">Visiteurs</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link mx-2 dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-circle fs-5"></i>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="position: absolute; left:-150px; width:200px">
              <li><a class="dropdown-item" href="#">{{Auth::user()->email}}</a></li>
              <li>
                <form action="{{route('auth.logout')}}" method="POST">
                    @method('post')
                    @csrf
                    <button type="submit" class="dropdown-item">Logout</button>
                </form>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
</nav>
<style>
    nav ul li .menu:hover{
        border-bottom: 2px solid black;
    }
    nav ul li .active{
        border-bottom: 2px solid black;
    }
</style>