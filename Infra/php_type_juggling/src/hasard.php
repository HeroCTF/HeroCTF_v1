<?php 
    $hasard = rand(0,5000);
    if(isset($_POST['choice'])){
        if($_POST['choice']===strval($hasard)){
            $msg = '<h2><br>Wow, so much luck... <br> HeroCTF{brut3f0rc3_w4s_th3_w4y}</h2> ';
        }else{
            $msg = '<h2><br>The number to guess was: '.$hasard.' , try again!</h2>';
        }
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Online Calculator</title>
  </head>
  <body>
    <!-- navbar -->
    <nav class="navbar navbar-light bg-light">
      <span class="navbar-brand mb-0 h1">HeroCTF</span>
    </nav>

    <!-- content -->
    <div class="container" style="margin-top: 20px;">

      <div class="card" style="margin-top: 10px;">
        <div class="card-body">
        <!-- form -->
        <form action="/hasard.php" method="POST">
            <div class="form-group">
              <label>Give me a number between 0 and 5000</label>
              <input type="text" class="form-control" name="choice">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <?php if(isset($_POST['choice'])) echo $msg; ?>
        </div>
      </div>
    </div>
  </body>
</html>