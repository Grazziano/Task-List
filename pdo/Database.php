<?php
$conn = new PDO("mysql:host=localhost;library", "root", "", array(PDO::ATTR_PERSISTENT => true));

echo "Connection Successful";
