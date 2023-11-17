<?php 
require "boot.php";

echo json_encode($clientToken = $gateway->clientToken()->generate());