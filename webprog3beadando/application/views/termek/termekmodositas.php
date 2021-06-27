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
        .form-group{
          margin-top:50px;
        }
        .btn{
          background-color:#255550;
          width:50%;
          margin-left:25%;
          margin-top:20px;
        }
    </style>
  <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Módosítás</h1>
    <p class="lead">Szállítócég módosítása</p>
  </div>
</div>
<?php echo validation_errors();?>
<form method="POST">
<div class="form-group">
  <label for="exampleInputEmail1">Termék neve</label>
  <input type="text" class="form-control" name="termek_nev" aria-describedby="emailHelp" placeholder="Termék neve" value=<?=$record->nev?>>
</div>
<div class="form-group">
  <label for="exampleInputEmail1">Termék anyaga</label>
  <input type="text" class="form-control" name="termek_anyaga" aria-describedby="emailHelp" placeholder="Termék anyaga" value=<?=$record->anyag?>>
</div>
<button type="submit" name="add" class="btn btn-primary">Módosít</button>
</form>
<footer>Készítette: Berkes Zsolt</footer>
      </body>