<?php $page = "supplier"; ?>
<?php include "header.php"; ?>
<?php include "sidebar.php"; ?>
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Master Supplier</h2>
  </div>
</div>
<section class="no-padding-top">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="block">
          <div class="title">
            <strong><i class="icon-new-file"></i>&nbsp; Form Supplier</strong>
          </div>
          <?php
          if(isset($_GET['id'])) {
            $id = $_GET['id'];  
            $data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM supplier WHERE supplier_id = '$id'"));
          }
          ?>
          <form method="post" autocomplete="off">
            <div class="form-group">
              <label class="form-control-label">Nama</label>
              <input type="text" placeholder="Ketik disini" class="form-control" value="<?php if (isset($data)) { echo $data['supplier_name']; } ?>" name="name" required>
            </div>
            <div class="form-group">
              <label class="form-control-label">Alamat</label>
              <textarea class="form-control" rows="3" name="address">
                <?php if (isset($data)) { echo $data['supplier_address']; } ?>
              </textarea>
            </div>
            <div class="form-group">
              <label class="form-control-label">No telp.</label>
              <input type="number" placeholder="Ketik disini" class="form-control" value="<?php if (isset($data)) { echo $data['supplier_telp']; } ?>" name="telp" required>
            </div>
            <div class="form-group">
              <label class="form-control-label">Kota</label>
              <input type="text" placeholder="Ketik disini" class="form-control" value="<?php if (isset($data)) { echo $data['supplier_country']; } ?>" name="country" required>
            </div>
            <div class="form-group">
              <input type="submit" value="Simpan" class="btn btn-primary" name="<?php if (isset($data)) { echo 'edit'; } else { echo 'simpan'; } ?>" required>
              <a href="supplier.php" class="btn btn-primary">Batal</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<?php 
include "footer.php";

if(isset($_POST['simpan'])) {
  $a = $_POST['name'];
  $b = $_POST['address'];
  $c = $_POST['telp'];
  $d = $_POST['country'];
  $query = mysqli_query($conn, "INSERT INTO supplier VALUES (NULL, '$a', '$b', '$c', '$d')");
  if($query) {
    echo "<script>alert('Data berhasil disimpan.');location='supplier.php'</script>";
  } else { 
    echo "Error: " . $query;
    die();
  }
}
elseif(isset($_POST['edit'])) {
  $a = $_POST['name'];
  $b = $_POST['address'];
  $c = $_POST['telp'];
  $d = $_POST['country'];
  $query = mysqli_query($conn, "UPDATE supplier SET supplier_name = '$a', supplier_address = '$b', supplier_telp = '$c', supplier_country = '$d' WHERE supplier_id = '$id'");
  if($query) {
    echo "<script>alert('Data berhasil diedit.');location='supplier.php'</script>";
  } else { 
    echo "Error: " . $query;
    die();
  }
} 
?>