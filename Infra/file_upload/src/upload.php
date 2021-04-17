<?php
define('MB', 1048576);
if(isset($_FILES['fichier'])){
  if($_FILES['fichier']["size"] < 1*MB){
      $target_dir = "./tmp/";
      $target_file = $target_dir . basename($_FILES["fichier"]["tmp_name"]);
      $real_name = $target_dir.$_FILES["fichier"]["name"];
      if(move_uploaded_file($_FILES['fichier']['tmp_name'],$target_file)){
          $realFile = $real_name;
      }
      rename($target_file,$real_name);
    }else{
      $msg = 'Attention, la taille du fichier doit être inférieur à 1MB.';
    }
}
?>

<!doctype html>
<head>
<title>Mes fichiers</title>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Online File Stockage</title>
  </head>
<body>
   <!-- navbar -->
   <nav class="navbar" style="background-color:#00FFFF">
      <span class="navbar-brand mb-0 h1">HeroCTF</span>
      <form action="./index.php" method="GET">
      <button type="submit">Page d'accueil</button>
      </form>
    </nav>

    <!-- content -->
    <div class="container" style="margin-top: 20px;">

      <div class="card" style="margin-top: 10px;">
        <div class="card-body">

          <!-- form -->
          <form action="./upload.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label>Téléverser des fichiers</label><br>
              <input type="file" name="fichier" id="fichier">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        </div>
    </div>  
    <!-- Affichage des fichiers -->
    <?php 
    if(isset($msg)) echo $msg;
    if(isset($realFile)){
        echo '<a href='.$realFile.'>';
        echo '<button>Mon fichier</button>';
        echo '</a>';
    }?>
</body>
</html>