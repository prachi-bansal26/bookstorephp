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
    <style>
        .col-form-label {
            margin-bottom: 10px;
        }
    </style>
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

    <!-- Checkout Form -->
    <div class="container">
        <br/>
        <div class="row">
            <div class="col-md-12">
                <h3 class="display-3 text-center"><span class="border-bottom">Checkout</span></h3>
                <form method="POST" action="place_order.php">
                    <div class="form-group row">
                        <label for="firstName" class="col-sm-2 col-form-label">First Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="firstName" name="firstName">
                        </div>
                        <label for="lastName" class="col-sm-2 col-form-label">Last Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="lastName" name="lastName">
                        </div>
                        <label for="bookName" class="col-sm-2 col-form-label">Book Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="bookName" name="bookName">
                        </div>
                        <label for="bookPrice" class="col-sm-2 col-form-label">Book Price</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="bookPrice" readonly name="bookPrice">
                        </div>
                        <label for="bookQuantity" class="col-sm-2 col-form-label">Book Quantity</label>
                        <div class="col-sm-10">
                            <select id="bookQuantity" class="form-control" name="bookQuantity">

                            <?php
                                require("mysqli_oop_connect.php");
                                $book_sql = "SELECT book_quantity from bookinventory WHERE book_id = 1";
                                $book_result = $dbc->query($book_sql);
                                $book_row = $book_result->fetch_assoc();
                                for($i=1; $i<=$book_row['book_quantity']; $i++) {
                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                }
                            ?>
                            </select>
                        </div>

                        <div class="col-sm-12 text-center">
                            <input type="submit" value="Place Order" class="btn btn-primary" />
                        </div>
                    </div>
                </form>
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