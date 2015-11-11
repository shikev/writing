<?php

require_once('stripe-php\init.php');

\Stripe\Stripe::setApiKey("sk_test_qqAzc9UD2FmtKykhWRRyjeBQ");

// Get the credit card details submitted by the form
$token = $_POST['stripeToken'];

// Create the charge on Stripe's servers - this will charge the user's card
try {
  $charge = \Stripe\Charge::create(array(
    "amount" => 1000, // amount in cents, again
    "currency" => "usd",
    "source" => $token,
    "description" => "Example charge"
    ));
  echo "done";
} catch(\Stripe\Error\Card $e) {
  // The card has been declined
	echo "something went wrong";
}

?>