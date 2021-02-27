<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css" crossorigin="anonymous">
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

    <!-- Book List -->
    <div class="container-fluid">
        <h1 class="m-3 display-3"><span class="border-bottom"><em>Explore</em> the List of Books</span></h1>
        <div class="container">
            <div class="row">

                <?php
                    require('mysqli_oop_connect.php');
                    $book_q = "SELECT * FROM bookinventory";
                    if($book_r = $dbc->query($book_q)) {
                        while($book_row = $book_r->fetch_assoc()) {
                            $rating ='';
                            for($i=0; $i<$book_row['book_rating']; $i++) {
                                $rating .='<i class="fa fa-star"></i>';
                            }
                            for($i=0; $i < 5-$book_row['book_rating']; $i++) {
                                $rating .='<i class="fa fa-star-o"></i>';
                            }


                            echo '<div class="col-md-12">
                                    <div class="card mb-3">
                                        <div class="row no-gutters">
                                            <div class="col-md-4">
                                                <img src="images/'.$book_row['book_img'].'" alt="'.$book_row['book_name'].'" class="img-fluid">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h5 class="card-title">'.$book_row['book_name'].'</h5>
                                                    <h5>'.$rating.'</h5>
                                                    <h6> $'.$book_row['book_price'].'</h6>
                                                    <p class="card-text">'.$book_row['book_author'].'</p>
                                                    <p class="card-text">'.$book_row['book_description'].'</p>
                                                    <a href="shop_form.php" class="btn btn-primary">Buy Now</a>
                                                </div>
                                                </div>
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