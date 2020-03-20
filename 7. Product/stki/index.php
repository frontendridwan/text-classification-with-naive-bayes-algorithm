<?php

/**
 * mysql> create database naiveBayes;
 * mysql> use naiveBayes;
 * mysql> create table trainingSet (S_NO integer primary key auto_increment, document text, category varchar(255));
 * mysql> create table wordFrequency (S_NO integer primary key auto_increment, word varchar(255), count integer, category varchar(255));
 */

require_once('NaiveBayesClassifier.php');

$classifier = new NaiveBayesClassifier();
$spam = Category::$SPAM;
$ham = Category::$HAM;

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Custom styles for this template-->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <title>Project STKI</title>
</head>

<body class="bg-light">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="data_sample.php">Sample Data</a>
        </div>
      </div>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>

  <br>
  <br>
  <div class="container">
    <h4 class="text-center">KLASIFIKASI TWEET TENTANG PENDAPAT MASYARAKAT INDONESIA TERHADAP LAYANAN MASYARAKAT BPJS KESEHATAN </h4>
  </div>
  <br>

  <center>
    <form class="" action="" method="post">
      <div class="container">
        <div class="col-md-8">
          <div class="form-group">
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="silahkan masukkan pendapat atau komentar..." name="data" value="<?= isset($_POST['data']) ? $_POST['data'] : '' ?>">
          </div>
        </div>
        <br>
        <button type="submit" name="submit" class="btn btn-success">Submit</button>
      </div>
    </form>
    <br>
    <hr>
    <br>
    <h5>HASIL PROSES :</h5>

    <?php
    if (isset($_POST['submit'])) {
      $category = $classifier->classify($_POST['data']);
    ?>
      <h2><?php echo  $category; ?></h2>
    <?php } ?>
  </center>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>

</html>