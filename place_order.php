<?php
if($_SERVER['REQUEST_METHOD'] == "POST") {
    require("mysqli_oop_connect.php");
    session_start();

    $first_name = $dbc->real_escape_string(trim($_POST['firstName']));
    $last_name = $dbc->real_escape_string(trim($_POST['lastName']));
    $payment_method = filter_var($_POST['bookPaymentMethod'], FILTER_SANITIZE_STRING);
    $book_id = filter_var($_SESSION['book_id'], FILTER_SANITIZE_NUMBER_INT);
    $quantity_ordered = filter_var($_POST['bookQuantity'], FILTER_SANITIZE_NUMBER_INT);
    $order_amount = $_POST[''];
    $card_number = filter_var($_POST['cardNumber'], FILTER_SANITIZE_STRING);
    $card_name = filter_var($_POST['cardName'], FILTER_SANITIZE_STRING);
    $card_expiry = $_POST['cardExpiry'];
    $card_cvv = filter_var($_POST['cardCVV'], FILTER_SANITIZE_NUMBER_INT);

    $errors = [];
    $error = false;

    if(!isset($first_name) || empty($first_name)) {
        $error = true;
        $errors[] = "First Name is empty";
    }

    if(!isset($last_name) || empty($last_name)) {
        $error = true;
        $errors[] = "Last Name is empty";
    }

    if(!isset($payment_method) || empty($payment_method)) {
        $error = true;
        $errors[] = "Payment Method is empty";
    }

    if(!isset($quantity_ordered) || empty($quantity_ordered)) {
        $error = true;
        $errors[] = "Order Quantity is empty";
    }
    if($payment_method == "Credit/Debit") {
        if(!isset($card_number) || empty($card_number)) {
            $error = true;
            $errors[] = "Card Number is empty";
        } else {
            if(!preg_match('^[0-9]{4}[-]+[0-9]{4}[-]+[0-9]{4}[-]+[0-9]{4}$', $card_number)) {
                $error = true;
                $errors[] = "Enter a valid Card Number";
            }
        }

        if(!isset($card_name) || empty($card_name)) {
            $error = true;
            $errors[] = "Card Holder Name is empty";
        } 
        
        if(!isset($card_expiry) || empty($card_expiry)) {
            $error = true;
            $errors[] = "Card Expiry is empty";
        }

        if(!isset($card_cvv) || empty($card_cvv)) {
            $error = true;
            $errors[] = "Card CVV is empty";
        } else {
            $card_cvv = md5($card_cvv, true);
        }
    }

    if($error) {
        echo '<div class="alert alert-danger" role="alert">';
        foreach($errors as $err_msg) {
            echo "<p class='text-danger'>$err_msg</p>";
        }
        echo '</div>';
        die();
    } else {
        $insert_q = "INSERT INTO orders_info VALUES(default, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $dbc->prepare($insert_q);

        $stmt->bind_param("sssiisssss", $first_name, $last_name, $payment_method, $book_id, $quantity_ordered, $order_amount, $card_name, $card_number, $card_expiry, $card_cvv);

        $stmt_exec = $stmt->execute();

        if($stmt_exec) {
            //reduce quantity
            $update_quantity = "UPDATE bookinventory SET book_quantity = WHERE book_id = '$book_id'";
            $update_quantity_r = $dbc->query($update_quantity);
            if($update_quantity_r) {
                echo '<div class="alert alert-success" role="alert">
                        Successfully Placed your order
                    </div>';
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">
                    Some Error Occured
                  </div>';
        }
    }  
}
?>