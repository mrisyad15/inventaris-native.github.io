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
        <a href="supplier_form.php" class="btn btn-primary">Tambah</a><br><br>
        <div class="block">
          <div class="title">
            <strong><i class="icon-grid"></i>&nbsp; Tabel Supplier</strong>
          </div>
          <div class="table-responsive"> 
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>No telp.</th>
                  <th>Kota</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $n = 0;
                $sql = mysqli_query($conn, "SELECT * FROM supplier ORDER BY supplier_name ASC");
                while($row = mysqli_fetch_array($sql)): 
                ?>
                <tr>
                  <th scope="row"><?php echo ++$n; ?></th>
                  <td><?php echo $row['supplier_name']; ?></td>
                  <td><?php echo $row['supplier_address']; ?></td>
                  <td><?php echo $row['supplier_telp']; ?></td>
                  <td><?php echo $row['supplier_country']; ?></td>
                  <td>
                    <a href="supplier_form.php?id=<?php echo $row['supplier_id'] ?>" class="btn btn-primary" title="Edit"><i class="fa fa-edit"></i></a>
                    <a href="?hapus=<?php echo $row['supplier_id']; ?>" name="hapus" class="btn btn-primary" title="Hapus" onclick="return confirm('Are you sure want to delete <?php echo $row['supplier_name']; ?> supplier?');"><i class='fa fa-trash'></i></a>        
                  </td>
                </tr>
                <?php endwhile; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php 
include "footer.php";

if (isset($_GET['hapus'])) {
  $query = mysqli_query($conn, "DELETE FROM supplier WHERE supplier_id = '$_GET[hapus]'");
  if($query) {
    echo "<script>alert('Data berhasil dihapus.'); location = 'supplier.php'</script>";
  } else {
    echo "Error: " . $query;
    die();
  }
}
?>