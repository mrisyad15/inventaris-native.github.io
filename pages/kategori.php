<?php $page = "kategori"; ?>
<?php include "header.php"; ?>
<?php include "sidebar.php"; ?>
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Master Kategori</h2>
  </div>
</div>
<section class="no-padding-top">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6">
        <div class="block">
          <div class="title">
            <strong><i class="icon-grid"></i>&nbsp; Tabel Kategori</strong>
          </div>
          <div class="table-responsive"> 
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Kategori</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $n = 0;
                $sql = mysqli_query($conn, "SELECT * FROM category ORDER BY category ASC");
                while($row = mysqli_fetch_array($sql)): 
                ?>
                <tr>
                  <th scope="row"><?php echo ++$n; ?></th>
                  <td><?php echo $row['category']; ?></td>
                  <td>
                    <a href="?id=<?php echo $row['category_id'] ?>" class="btn btn-primary" title="Edit"><i class="fa fa-edit"></i></a>
                    <a href="?hapus=<?php echo $row['category_id']; ?>" name="hapus" class="btn btn-primary" title="Hapus" onclick="return confirm('Are you sure want to delete <?php echo $row['category']; ?> category?');"><i class='fa fa-trash'></i></a>        
                  </td>
                </tr>
                <?php endwhile; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="block">
          <div class="title">
            <strong><i class="icon-new-file"></i>&nbsp; Form Kategori</strong>
          </div>
          <?php
          if(isset($_GET['id'])) {
            $id = $_GET['id'];  
            $data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM category WHERE category_id = '$id'"));
          }
          ?>
          <form method="post" autocomplete="off">
            <div class="form-group">
              <label class="form-control-label">Kategori</label>
              <input type="text" placeholder="Ketik disini" class="form-control" value="<?php if (isset($data)) { echo $data['category']; } ?>" name="category" autofocus="on" required>
            </div>
            <div class="form-group">
              <input type="submit" value="Simpan" class="btn btn-primary" name="<?php if (isset($data)) { echo 'edit'; } else { echo 'simpan'; } ?>">
              <a href="kategori.php" class="btn btn-primary">Batal</a>
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
  $c = $_POST['category'];
  $query = mysqli_query($conn, "INSERT INTO category VALUES (NULL, '$c')");
  if($query) {
    echo "<script>alert('Data berhasil disimpan.');location='kategori.php'</script>";
  } else { 
    echo "Error: " . $query;
    die();
  }
}
elseif(isset($_POST['edit'])) {
  $c = $_POST['category'];
  $query = mysqli_query($conn, "UPDATE category SET category = '$c' WHERE category_id = '$id'");
  if($query) {
    echo "<script>alert('Data berhasil diedit.');location='kategori.php'</script>";
  } else { 
    echo "Error: " . $query;
    die();
  }
} 
elseif (isset($_GET['hapus'])) {
  $query = mysqli_query($conn, "DELETE FROM category WHERE category_id = '$_GET[hapus]'");
  if($query) {
    echo "<script>alert('Data berhasil dihapus.'); location = 'kategori.php'</script>";
  } else {
    echo "Error: " . $query;
    die();
  }
}
?>