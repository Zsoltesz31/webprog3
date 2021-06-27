
<!DOCTYPE html>
<html>
<head>
    <title>Kep feltoltes</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            margin: 0 auto;
        }
    </style>
    <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Képfeltöltés</h1>
    <p class="lead">Töltsön fel képet!</p>
  </div>
</div>
    <div class="content">
        <h3>Válasszon ki egy képet amit felszeretne tölteni</h3>
        <?php
                if (isset($error)){
                    echo $error;
                }
            ?>
            <form method="post" action="<?=base_url('kep/store')?>" enctype="multipart/form-data">
                <input type="file" id="profile_image" name="profile_image" size="33" />
                <input type="submit" value="Feltöltés" />
            </form>
    </div>

<?php echo anchor(base_url('welcome'), 'Főoldal'); ?>
<footer>Készítette: Berkes Zsolt</footer>
</body>
</html>