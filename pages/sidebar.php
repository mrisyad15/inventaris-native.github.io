<!-- Sidebar Navigation-->
<nav id="sidebar">
  <!-- Sidebar Header-->
  <div class="sidebar-header d-flex align-items-center">
    <div class="avatar">
      <img src="<?php echo $user['avatar'] == null ? '../img/avatar/avatar.png' : '$user["avatar"]' ?>" class="img-fluid rounded-circle">
    </div>
    <div class="title">
      <h1 class="h5"><?php echo $user['name']; ?></h1>
      <p><?php echo $user['level']; ?></p>
    </div>
  </div>
  
  <ul class="list-unstyled">
    <li <?= $page == 'home' ? 'class="active"' : '' ?>>
      <a href="index.php"><i class="icon-home"></i>Home</a>
    </li>
    <li <?= $page == 'kategori'||$page ==  'barang'||$page ==  'supplier' ? 'class="active"' : '' ?>>
      <a href="#master" aria-expanded="false" data-toggle="collapse">
      <i class="icon-list-1"></i>Master</a>
      <ul id="master" class="collapse list-unstyled ">
        <li <?= $page == 'barang' ? 'class="active"' : '' ?>><a href="barang.php">Barang</a></li>
        <li <?= $page == 'kategori' ? 'class="active"' : '' ?>><a href="kategori.php">Kategori</a></li>
        <li <?= $page == 'supplier' ? 'class="active"' : '' ?>><a href="supplier.php">Supplier</a></li>
      </ul>
    </li>
    <li <?= $page == 'brg_masuk'||$page ==  'brg_keluar' ? 'class="active"' : '' ?>>
      <a href="#transaksi" aria-expanded="false" data-toggle="collapse">
      <i class="icon-contract"></i>Transaksi</a>
      <ul id="transaksi" class="collapse list-unstyled ">
        <li <?= $page == 'brg_masuk' ? 'class="active"' : '' ?>><a href="barang_masuk.php">Barang Masuk</a></li>
        <li <?= $page == 'brg_keluar' ? 'class="active"' : '' ?>><a href="barang_keluar.php">Barang Keluar</a></li>
      </ul>
    </li>
    <li <?= $page == 'user' ? 'class="active"' : '' ?>>
      <a href="user.php"> <i class="icon-user"></i>Manajemen User </a>
    </li>
    <li <?= $page == 'setting' ? 'class="active"' : '' ?>>
      <a href="setting.php"> <i class="icon-settings"></i>Setting </a>
    </li>
  </ul>
</nav>
<!-- Sidebar Navigation end-->
<div class="page-content">