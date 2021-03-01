<?php
if($_SERVER['REQUEST_METHOD'] == "POST") {
    require("mysqli_oop_connect.php");
    session_start();

    $first_name = mysqli_real_escape_string($dbc, trim($_POST['firstName']));
    $last_name = mysqli_real_escape_string($dbc, trim($_POST['lastName']));
    $payment_method = $_POST['bookPaymentMethod'];
    $book_id = $_SESSION['book_id'];
    $quantity_ordered = $_POST['bookQuantity'];
    $order_amount = $_POST[''];
    $card_number = $_POST['cardNumber'];
    $card_name = $_POST['cardName'];
    $card_expiry = $_POST['cardExpiry'];
    $card_cvv = md5($_POST['cardCVV'], true);

    $insert_q = "INSERT INTO orders_info VALUES(default, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $dbc->prepare($insert_q);

    $stmt->bind_param("sssiisssss", $first_name, $last_name, $payment_method, $book_id, $quantity_ordered, $order_amount, $card_name, $card_number, $card_expiry, $card_cvv);

    $stmt_exec = $stmt->execute();

    if($stmt_exec) {
        //reduce quantity
        $update_quantity = "UPDATE bookinventory SET book_quantity = WHERE book_id = '$book_id'";
        $update_quantity_r = $dbc->query($update_quantity);
        if($update_quantity_r) {
            echo "Successfully Placed your order;"
        }
    } else {
        echo "Some Error Occured";
    }
}
?>