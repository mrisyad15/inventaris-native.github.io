<?php 
session_start();
include "../config/conn.php";
if(!isset($_SESSION['name'])) {
  header("location:login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="refresh" content="0;url=pages/index.php">
  <title>InventarisKu</title>
  <script language="javascript">
    window.location.href = "pages/index.php"
  </script>
</head>
<body>
Go to <a href="pages/index.php">/pages/index.php</a>
</body>
</html>
