<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" crossorigin="anonymous">
    <title>BookStore</title>
    <script type="text/javascript">
        function checkcard(){
            $('input[name="bookPaymentMethod"]').click(function(){
                if ($(this).is(':checked'))
                {
                    if($(this).val() == "Cash") {
                        $("#CardDetails").hide();
                    } else {
                        $("#CardDetails").show();
                    }
                }
            });
        }
    </script>
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
                            <input type="text" class="form-control" id="bookName" name="bookName" readonly>
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
                        <label for="bookPaymentMethod" class="col-sm-2 col-form-label">Payment Method</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="bookPaymentMethod" id="inlineRadio1" value="Cash" onclick="checkcard()">
                            <label class="form-check-label" for="inlineRadio1">Cash</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="bookPaymentMethod" id="inlineRadio2" value="Credit/Debit" onclick="checkcard()">
                            <label class="form-check-label" for="inlineRadio2">Credit/Debit</label>
                        </div>

                        <div id="CardDetails" style="display:none">
                        
                            <label for="cardName" class="col-sm-2 col-form-label">Card Holder Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="cardName" name="cardName">
                            </div>

                            <label for="cardNumber" class="col-sm-2 col-form-label">Card Number</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="cardNumber" name="cardNumber" maxlength="19" placeholder="XXXX-XXXX-XXXX-XXXX">
                            </div>

                            <label for="cardExpiry" class="col-sm-2 col-form-label">Card Expiry</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="cardExpiry" name="cardExpiry" placeholder="MM/YY">
                            </div>

                            <label for="cardCVV" class="col-sm-2 col-form-label">Card CVV</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="cardCVV" name="cardCVV" maxlength="3">
                            </div>
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