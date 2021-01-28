<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <?php
    $harga =  $_GET['passval'];
    $harga_str = preg_replace("/[^0-9]/", "", $harga);
    $harga_int = (int) $harga_str;
?>
 @yield('passvalue')
</body>
</html>