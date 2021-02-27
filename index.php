<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">

    <title>BookStore</title>
  </head>
  <body>
    <!-- Bootstrap Navbar -->
    <nav class="navbar sticky-top navbar-expand-lg navbar-white bg-white border-bottom">
        <a class="navbar-brand" href="index.php"><img src="images/logo.jpg" alt="BookStore"  class="img-responsive"/></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="booklist.php">Book List</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Bootstrap Slider -->
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/slide1.jpg" class="d-block w-100" alt="Winter Sale">
            </div>
            <div class="carousel-item">
            <img src="images/slide2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="images/slide3.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- Book Highlights -->
    <div class="container-fluid">
        <h1 class="text-center m-3 display-3"><span class="border-bottom"><em>Discover</em> Your Next Book</span></h1>
        <div class="container">
            <div class="row">

                <?php
                    require('mysqli_oop_connect.php');
                    $book_q = "SELECT * FROM bookinventory LIMIT 4";
                    if($book_r = $dbc->query($book_q)) {
                        while($book_row = $book_r->fetch_assoc()) {
                            echo '<div class="col-md">
                                    <div class="card">
                                        <img src="images/'.$book_row['book_img'].'" class="card-img-top" alt="'.$book_row['book_name'].'">
                                        <div class="card-body">
                                            <h5 class="card-title">'.$book_row['book_name'].'</h5>
                                            <h6> $'.$book_row['book_price'].'</h6>
                                            <p class="card-text">'.$book_row['book_author'].'</p>
                                            <a href="#" class="btn btn-primary">View More</a>
                                        </div>
                                    </div>
                                </div>';
                        }
                    }

                ?>
                
            </div>
        </div>
    </div>

    <!-- Bootstrap Footer -->
    <div class="container-fluid p-4 text-center bg-dark text-white">
        &copy; Copyright 2021. All Rights Reserved.
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>   
  </body>
</html>