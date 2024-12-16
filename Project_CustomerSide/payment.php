<?php
// Assuming that the total payment amount is received from the previous page
$totalAmount = $_POST['totalAmount'];
$paymentOption = $_POST['paymentOption'];
$contactInfo = $_POST['contactInfo'];

// Validate contact information
$isValidContactInfo = false;
if ($paymentOption == '1') { // Net Banking
    if (strlen($contactInfo) === 12 && is_numeric($contactInfo)) {
        $isValidContactInfo = true;
    }
} else {
    if (filter_var($contactInfo, FILTER_VALIDATE_EMAIL) && substr($contactInfo, -10) === '@gmail.com') {
        $isValidContactInfo = true;
    } elseif (strlen($contactInfo) === 10 && is_numeric($contactInfo)) {
        $isValidContactInfo = true;
    }
}

if ($isValidContactInfo) {
    // Simulating a payment process based on the selected payment option
    $paymentSuccessful = false;
    switch ($paymentOption) {
        case '1': // Net Banking
            // Simulate net banking payment process
            $paymentSuccessful = true;
            break;
        case '2': // GPay
            // Simulate GPay payment process
            $paymentSuccessful = true;
            break;
        case '3': // PhonePay
            // Simulate PhonePay payment process
            $paymentSuccessful = true;
            break;
        case '4': // Paytm
            // Simulate Paytm payment process
            $paymentSuccessful = true;
            break;
        default:
            echo "Invalid payment option selected.";
            exit();
    }

    if ($paymentSuccessful) {
        // Payment was successful, redirect to the success page
        echo "success";
    } else {
        // Payment failed, handle the error or redirect back to the cart page
        echo "Payment failed. Please try again.";
    }
} else {
    echo "Invalid contact information. Please retry the payment.";
}
?>