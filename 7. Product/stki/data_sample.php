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

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link active" href="#">Sample Data</a>
        </div>
      </div>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>

  <br>
  <div class="container">
    <h1>Sample Data</h1>
    <br>
  </div>

  <div class="container">

    <?php
    require 'db_connect.php';
    $query = mysqli_query($conn, "SELECT * FROM trainingSet");
    ?>
    <form action="" method="post">
      <table class="table table-hover table-bordered" cellpadding="0" cellspacing="0">
        <tr>
          <th>No</th>
          <th>Dokumen</th>
          <th>Kategori</th>
        </tr>
        <?php if (mysqli_num_rows($query) > 0) {
          $no = 1;
        ?>
          <?php while ($data = mysqli_fetch_array($query)) { ?>
            <tr>
              <td><?php echo $no ?></td>
              <td><?php echo $data["document"]; ?></td>
              <td><?php echo $data["category"]; ?></td>
            </tr>
          <?php $no++;
          } ?>
        <?php } ?>
      </table>
    </form>
  </div>


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>

</html>