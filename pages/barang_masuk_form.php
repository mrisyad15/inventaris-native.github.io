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
        <div class="block">
          <div class="title">
            <strong><i class="icon-new-file"></i>&nbsp; Form Barang Masuk</strong>
          </div>
          <form method="post" autocomplete="off" name="form">
            <div class="form-group">
              <label class="form-control-label">Barang</label>
              <select name="barang" class="form-control" required="true" onclick="show()" id="select">
                <option value="">Pilih data</option>
                <?php
                $sql = mysqli_query($conn, "SELECT * FROM barang ORDER BY barang_code ASC");
                while($data = mysqli_fetch_array($sql)) { ?>
                <option value="<?php echo $data['barang_id']; ?>"><?php echo $data['barang_code'] .' - '. $data['barang_name']; ?></option> 
                <?php } ?>
              </select>
              <input type="hidden" name="code" id="code">
              <script type="text/javascript">
              function show() {
                var mylist = document.getElementById("select");
                document.getElementById("code").value = mylist.options[mylist.selectedIndex].text;
              } 
              </script>
            </div>
            <div class="form-group">
              <label class="form-control-label">Supplier</label>
              <select name="supplier" class="form-control" required="true">
                <option value="">Pilih data</option>
                <?php
                $sql = mysqli_query($conn, "SELECT * FROM supplier ORDER BY supplier_name ASC");
                while($data = mysqli_fetch_array($sql)) { ?>
                <option value="<?php echo $data['supplier_id']; ?>"><?php echo $data['supplier_name']; ?></option> 
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label class="form-control-label">Jumlah</label>
              <input type="number" placeholder="Ketik disini" class="form-control" name="jumlah" maxlength="3">
            </div>
            <div class="form-group">
              <label class="form-control-label">Tanggal</label>
              <input id="datepicker" class="form-control" name="date" required>
            </div>
            <div class="form-group">
              <label class="form-control-label">Kondisi</label>
              <input type="text" value="Baik" class="form-control" name="condition" readonly>
            </div>
            <div class="form-group">
              <input type="submit" value="Simpan" class="btn btn-primary" name="simpan" required>
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
  $a = $_POST['barang'];
  $b = $_POST['code'];
  $c = $_POST['supplier'];
  $d = $_POST['jumlah'];
  $e = $_POST['date'];
  $f = $_POST['condition'];

  $e = date("Y-m-d");

  //B001-1
  $kode_barang = substr($b,0,4);

  $cek_kode = $kode_barang . "-1";
  $cek = mysqli_fetch_array(mysqli_query($conn, "SELECT barang_masuk_code FROM barang_masuk WHERE barang_masuk_code = '$cek_kode'"));
  if (empty($cek)) {
    $kode = 0;
  } else {
    $sql = mysqli_fetch_assoc(mysqli_query($conn, "SELECT MAX(SUBSTR(barang_masuk_code, 6)) as maxKode FROM barang_masuk WHERE barang_id = '$a'"));
    $kode =  $sql['maxKode'];
  }

  $sql = 'INSERT INTO barang_masuk (barang_masuk_id, barang_id, supplier_id, barang_masuk_code, barang_masuk_condition, barang_masuk_date) VALUES ';
  for ($i=0;$i<$d;$i++) {
  $sql .= "('".NULL."','".$a."','".$c."','".$kode_barang.'-'.++$kode."','".$f."','".$e."'), ";
  }
  //buang koma di akhir value
  $nun = rtrim($sql, ", ");
  $insert = mysqli_query($conn, $nun);

  if($insert == 1) {
    echo "<script>alert('Data berhasil disimpan.');location='barang_masuk.php'</script>";
  } else { 
    echo "Error: " . $sql;
    die();
  }
}
?>