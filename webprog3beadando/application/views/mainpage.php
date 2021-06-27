<!doctype html>
<html lang="hu">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Szállítmányozás</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </head>
  <body>
  <style>
        footer{
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            height:50px;
            background-color: #476E6A;
            color: white;
            font-size:20px;
            text-align: center;
        }
        .jumbotron{
            background-color: #476E6A;
            color:white;
            height:200px;
        }
        .container{
            text-align:center;
            padding-top:30px;
        }
        .navbar{
            background-color:#255550;
        }
        .navbar-brand{
            padding-left:10px;
        }
        .content{
          display:flex;
          align-items:center;
          height:1000px;
          padding:50px;
          flex-direction:column;
        }
        img{
          width:70%;
          height:auto;
        }
    </style>
  <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Szállítmányozás,raktározás</h1>
    <p class="lead">Kezelje a raktárjainkat és azok szállítócégjeit!</p>
  </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark">
  <a class="navbar-brand" href="welcome">Főoldal</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link " href="raktar/list">Raktárok</a>
      <a class="nav-item nav-link " href="szallitoceg/list">Szállítócégek</a>
      <a class="nav-item nav-link " href="termek/list">Termékek</a>
      <a class="nav-item nav-link " href="munkasok/list">Munkások</a>
      <a class="nav-item nav-link " href="regio/list">Régiók</a>
      <a class="nav-item nav-link " href="auth/logout">Kijelentkezés</a>
      <a class="nav-item nav-link " href="dbexport/dbexport">Adatbázis fájl exportálása</a>
      <a class="nav-item nav-link " href="kep">Képek</a>
    </div>
  </div>
</nav>
<div class="content">
<img src="https://firsttrans.hu/wp-content/uploads/2020/11/szallitmanyozas-fuvarozas-1024x683.jpg">
<h1>A menüsáv segítségével megkezdheti a rendszer kezelését!</h1>
</div>
<footer>Készítette: Berkes Zsolt</footer>
  </body>