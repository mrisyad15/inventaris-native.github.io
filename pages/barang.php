<?php $page = "barang"; ?>
<?php include "header.php"; ?>
<?php include "sidebar.php"; ?>
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Master Barang</h2>
  </div>
</div>
<section class="no-padding-top">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <a href="barang_form.php" class="btn btn-primary">Tambah</a><br><br>
        <div class="block">
          <div class="title">
            <strong><i class="icon-grid"></i>&nbsp; Tabel Barang</strong>
          </div>
          <div class="table-responsive"> 
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Kategori</th>
                  <th>Lokasi</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $n = 0;
                $sql = mysqli_query($conn, "SELECT * FROM barang INNER JOIN category ON barang.category_id = category.category_id ORDER BY barang_code ASC");
                while($row = mysqli_fetch_array($sql)): 
                ?>
                <tr>
                  <th scope="row"><?php echo ++$n; ?></th>
                  <td><?php echo $row['barang_code']; ?></td>
                  <td><?php echo $row['barang_name']; ?></td>
                  <td><?php echo $row['category']; ?></td>
                  <td><?php echo $row['barang_location']; ?></td>
                  <td>
                    <a href="barang_form.php?id=<?php echo $row['barang_id'] ?>" class="btn btn-primary" title="Edit"><i class="fa fa-edit"></i></a>
                    <a href="?hapus=<?php echo $row['barang_id']; ?>" name="hapus" class="btn btn-primary" title="Hapus" onclick="return confirm('Are you sure want to delete <?php echo $row['barang_name']; ?>?');"><i class='fa fa-trash'></i></a>        
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
  $query = mysqli_query($conn, "DELETE FROM barang WHERE barang_id = '$_GET[hapus]'");
  if($query) {
    echo "<script>alert('Data berhasil dihapus.'); location = 'barang.php'</script>";
  } else {
    echo "Error: " . $query;
    die();
  }
}
?>