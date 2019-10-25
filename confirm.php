<?php
include "config/conn.php";

$code     = $_GET['code'];
$username = $_GET['username'];

$query = mysqli_query($conn, "UPDATE user SET active = 'Y' WHERE code = '".$code."'") or die (mysqli_error());

if($query) {
    echo "Member dengan username <strong>".$username."</strong> telah diaktifkan";
} else {
    echo "Gagal diaktifkan";
}
?>