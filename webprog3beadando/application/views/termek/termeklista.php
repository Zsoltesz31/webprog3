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
    </style>
  <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4"><?=$title?></h1>
    <p class="lead">Termékek listája</p>
  </div>
</div>
<?php if($records == null || empty($records)): ?>
    <div class="alert alert-danger" role="alert">
  Nem található termék az adatbázisban!
</div>
<footer>Készítette: Berkes Zsolt</footer>
<?php else: ?>
    <?php echo anchor(base_url('termek/insert/'), 'Hozzáad'); ?>
    <table class="table">
        <thead>
        <tr>
        <th scope="col">Termék neve</th>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col"></th>
    </tr>
        </thead>
        <tbody>
            <?php foreach($records as $record): ?>
            <tr>
                <td><?=$record->nev?></td>
                <td>
                    <?php echo anchor(base_url('termek/list/'.$record->id), 'Megtekintés'); ?>
                </td>
                <td>
                    <?php echo anchor(base_url('termek/delete/'.$record->id), 'Törlés'); ?>
                </td>
                <td>
                    <?php echo anchor(base_url('termek/update/'.$record->id), 'Módosítás'); ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php echo anchor(base_url('welcome'), 'Főoldal'); ?>           
    <footer>Készítette: Berkes Zsolt</footer>
<?php endif; ?>
            </body>