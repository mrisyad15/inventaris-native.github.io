<?php $page = "brg_masuk"; ?>
<?php include "header.php"; ?>
<?php include "sidebar.php"; ?>
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Barang Masuk</h2>
  </div>
</div>
<section class="no-padding-top">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <a href="barang_masuk_form.php" class="btn btn-primary">Tambah</a><br><br>
        <div class="block">
          <div class="title">
            <strong><i class="icon-grid"></i>&nbsp; Tabel Barang Masuk</strong>
          </div>
          <div class="table-responsive"> 
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Supplier</th>
                  <th>Tanggal Masuk</th>
                  <th>Kondisi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $n = 0;
                $sql = mysqli_query($conn, "SELECT * FROM barang_masuk INNER JOIN barang ON barang.barang_id = barang_masuk.barang_id INNER JOIN supplier ON supplier.supplier_id = barang_masuk.supplier_id ORDER BY barang_name, barang_masuk_code ASC");
                while($row = mysqli_fetch_array($sql)): 
                ?>
                <tr>
                  <th scope="row"><?php echo ++$n; ?></th>
                  <td><?php echo $row['barang_masuk_code']; ?></td>
                  <td><?php echo $row['barang_name']; ?></td>
                  <td><?php echo $row['supplier_name']; ?></td>
                  <td><?php echo $row['barang_masuk_date']; ?></td>
                  <td><?php echo $row['barang_masuk_condition']; ?></td>
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
  $query = mysqli_query($conn, "DELETE FROM barang WHERE barang_id = '$_GET[hapus]'");
  if($query) {
    echo "<script>alert('Data berhasil dihapus.'); location = 'barang.php'</script>";
  } else {
    echo "Error: " . $query;
    die();
  }
}
?>