@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-14">
        <div class="grid simple ">
            <div class="grid-body no-border" style="    height: 800px;">
            <center>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
      <p id="slider_txt" style=""><h3 style="color:#4d79ff;">DrStock est une application de gestion de stock en ligne hebergee sur nos serveurs et accessible depuis n importe quel poste connecté à Internet</h3></p>
      <br><br><br>
        <img src="\Nprojet\public\img\1.jpg" alt="Chania" width="460" height="345">
      </div>

      <div class="item">
      <p id="slider_txt" style=""><h3 style="color:#4d79ff;">Drstock propose à lutilisateur de gérer les stocks de marchandises en toute simplicité. Le logiciel gère les entrées sorties directes des stocks </h3></p>
      <br><br><br>
        <img src="\Nprojet\public\img\2.jpg" alt="Chania" width="460" height="345">
      </div>
    
      <div class="item">
      <p id="slider_txt" style=""><h3 style="color:#4d79ff;">Avec les outils de recherche intégrés  retrouvez facilement vos articles ainsi que leur localisation </h3></p>
      <br><br><br>
        <img src="\Nprojet\public\img\3.jpg" alt="Flower" width="460" height="345">
      </div>

      <div class="item">
     <p id="slider_txt" style=""><h3 style="color:#4d79ff;"> Drstock vous permet d imprimer vos documents en quelques secondes. Vous pouvez creer vos factures d achats ou ventes, au format PDF</h3></p>
     <br><br><br>
        <img src="\Nprojet\public\img\4.jpg" alt="Flower" width="460" height="345">
      </div>
    </div>

    <!-- Left and right controls -->
    
    
  </div>
  </center>
  @section('foot')
    <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 70%;
      margin: auto;
  }
  .active 
  {

  }
  </style>
  @stop
@endsection
