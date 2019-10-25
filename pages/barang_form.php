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
        <div class="block">
          <div class="title">
            <strong><i class="icon-new-file"></i>&nbsp; Form Barang</strong>
          </div>
          <?php
          if(isset($_GET['id'])) {
            $id = $_GET['id'];  
            $data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM barang INNER JOIN category ON barang.category_id = category.category_id WHERE barang_id = '$id'"));
          }

          // mencari kode barang dengan nilai paling besar
          $query = "SELECT max(barang_code) as maxKode FROM barang";
          $hasil = mysqli_query($conn,$query);
          $d = mysqli_fetch_array($hasil);
          $kodeBarang = $d['maxKode'];
           
          // mengambil angka atau bilangan dalam kode anggota terbesar,
          // dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
          // misal 'BRG001', akan diambil '001'
          // setelah substring bilangan diambil lantas dicasting menjadi integer
          $noUrut = (int) substr($kodeBarang, 3, 3);
           
          // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
          $noUrut++;
           
          // membentuk kode anggota baru
          // perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
          // misal sprintf("%03s", 12); maka akan dihasilkan '012'
          // atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
          $char = "B";
          $kodeBarang = $char . sprintf("%03s", $noUrut);
          ?>
          <form method="post" autocomplete="off">
            <div class="form-group">
              <label class="form-control-label">Kode Barang</label>
              <input type="text" class="form-control" value="<?php echo $kodeBarang; ?>" name="cd" readonly>
            </div>
            <div class="form-group">
              <label class="form-control-label">Nama Barang</label>
              <input type="text" placeholder="Ketik disini" class="form-control" value="<?php if (isset($data)) { echo $data['barang_name']; } ?>" name="name" required>
            </div>
            <div class="form-group">
              <label class="form-control-label">Kategori</label>
              <select name="category" class="form-control" required="true">
                <option value="<?php if (isset($data)) { echo $data['category_id']; } ?>"><?php if (isset($data)) { echo $data['category']; } else { echo "Pilih data"; } ?></option>
                <?php
                if (isset($data)):
                  $id = $data['category_id'];
                  $sql = mysqli_query($conn, "SELECT * FROM category WHERE NOT category_id = '$id' ORDER BY category ASC");
                else:
                  $sql = mysqli_query($conn, "SELECT * FROM category ORDER BY category ASC");
                endif;

                while($a=mysqli_fetch_array($sql)):
                ?>
                <option value="<?php echo $a['category_id']; ?>"><?php echo $a['category']; ?></option>
                <?php endwhile; ?>
              </select>
            </div>
            <div class="form-group">
              <label class="form-control-label">Lokasi</label>
              <input type="text" placeholder="Ketik disini" class="form-control" value="<?php if (isset($data)) { echo $data['barang_location']; } ?>" name="location" required>
            </div>
            <div class="form-group">
              <input type="submit" value="Simpan" class="btn btn-primary" name="<?php if (isset($data)) { echo 'edit'; } else { echo 'simpan'; } ?>" required>
              <a href="barang.php" class="btn btn-primary">Batal</a>
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
  $a = $_POST['category'];
  $b = $_POST['cd'];
  $c = $_POST['name'];
  $d = $_POST['location'];
  $query = mysqli_query($conn, "INSERT INTO barang VALUES (NULL, '$a', '$b', '$c', '$d')");
  if($query) {
    echo "<script>alert('Data berhasil disimpan.');location='barang.php'</script>";
  } else { 
    echo "Error: " . $query;
    die();
  }
}
elseif(isset($_POST['edit'])) {
  $a = $_POST['category'];
  $b = $_POST['cd'];
  $c = $_POST['name'];
  $d = $_POST['location'];
  $query = mysqli_query($conn, "UPDATE barang SET category_id = '$a', barang_name = '$c', barang_location = '$d' WHERE barang_id = '".$_GET['id']."'");
  if($query) {
    echo "<script>alert('Data berhasil diedit.');location='barang.php'</script>";
  } else { 
    echo  $query;
    die();
  }
} 
?>