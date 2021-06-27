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
    <h1 class="display-4">Raktár hozzáadása</h1>
    <p class="lead">Adjon hozzá új raktárat az adatbázishoz</p>
  </div>
</div>
<form method="POST">
<?php echo validation_errors();?>
  <div class="form-group">
    <label for="exampleInputEmail1">Vezetéknév</label>
    <input type="text" class="form-control" name="munkas_vnev" aria-describedby="emailHelp" placeholder="Vezetéknév">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Keresztnév</label>
    <input type="text" class="form-control" name="munkas_knev" placeholder="Keresztnév">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Munkahely</label>
    <select class="form-control" name="munkas_munkahely">
    <?php foreach($szrecords as $szrecord): ?>
      <option><?=$szrecord->id?></option>
    <?php endforeach; ?>
    </select>
  </div>
  <button type="submit" name="add" class="btn btn-primary">Hozzáad</button>
</form>
<?php echo anchor(base_url('munkasok/list'), 'Vissza'); ?>
<footer>Készítette: Berkes Zsolt</footer>
      </body>