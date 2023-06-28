<?php include('constant.php') ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hotel Management Syste</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- data tables -->
    <!-- dtablesata -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<!-- dtablesata -->
<!-- font awesome -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- data tables end -->
    <!-- styles -->
    <link rel="stylesheet" href="css/style.css">
    <!-- icons -->
    <link rel="icon" href="../img/logo.png">
  </head>
  <body>
    <!-- navbar -->
<nav class="navbar navbar-expand-lg bg-white shadow text-white sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Hotel Management System | Admin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-capitalize fw-bold text-dark" href="index.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-capitalize fw-bold text-dark" href="manage_room.php">room</a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-capitalize fw-bold text-dark" href="facilities.php">facilities</a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-capitalize fw-bold text-dark" href="book.php">booking</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-capitalize fw-bold text-dark" href="../index.php">frontend</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-capitalize fw-bold text-dark" href="#">logout</a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" ></script>

    <!-- data tables -->
    <!-- <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
    <!-- font awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
  </body>
</html>