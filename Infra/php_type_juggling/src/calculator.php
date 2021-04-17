<?php
function toCompute(){
	$in = "echo " . $_POST['calcul'] . ";";
	$value = eval($in);
	return $value;
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
          <form action="/calculator.php" method="POST">
            <div class="form-group">
              <label>Online Calculator</label>
              <input type="text" class="form-control" name="calcul">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <?php
            if (isset($_POST['calcul'])){
                echo "<h2>Result :</h2>";
                echo toCompute();
            }
            ?>
          </form>

        </div>
      </div>
    </div>

  </body>
</html>
<?php
  // HeroCTF{us1ng_3v4l_functi0n_1s_b4d}
?>