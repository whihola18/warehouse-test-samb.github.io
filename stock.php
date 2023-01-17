<?php 

require 'config.php';

$warehouse = query("SELECT * FROM m_warehouse");

if( isset($_POST["search"]) ) {
	$gudangId = $_POST['whsid'];
    $result;

    $result = query("SELECT `m_product`.`ProductName`, `m_product`.`QtyDus`, `m_product`.`QtyPcs` FROM `m_product` WHERE `m_product`.`ProductPK` IN ( SELECT `tb_penerimaanbarangdetail`.`TrxInDProductIdf` FROM `tb_penerimaanbarangdetail` WHERE `tb_penerimaanbarangdetail`.`TrxInIDF` IN ( SELECT `tb_penerimaanbrgheader`.`TrxInPK` FROM `tb_penerimaanbrgheader` WHERE `tb_penerimaanbrgheader`.`WhsIdf` = '$gudangId' ) )");
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WMS | DATA STOCK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<style>
        li { margin: 10px 15px ;}
    </style>  
</head>
<body>

<nav class="navbar navbar-expand-lg bg-info bg-gradient">
  <div class="container">
    <a class="navbar-brand" href="index.php">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Data Transaksi
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="dataBrgInHeader.php">Data Transaksi Barang Masuk</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="dataBrgOutHeader.php">Data Transaksi Barang Keluar</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Data Transaksi Detail
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="dataBrgInDetailAll.php">Transaksi Barang Masuk</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="dataBrgOutDetailAll.php">Transaksi Barang Keluar</a></li>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="stock.php">Cetak Stock Barang</a>
        </li>
      </ul>
      
    </div>
  </div>
</nav>

<div class="container mt-5">

<form action="" method="post">
    <table>
        <tr>
            <th><label>Pilih Gudang:</label></th>
            <th>
                <select name="whsid" id="whsid">
                    <option value=""> === Pilih Gudang === </option>
                    <?php foreach( $warehouse as $gudang ) : ?>
                        <option value="<?= $gudang['WhsPK']; ?>"> <?= $gudang['WhsName']; ?> </option>
                    <?php endforeach; ?>
                </select>
            </th>
            <th>
                <button type="submit" name="search">Cari</button>
            </th>
        </tr>
    </table>
</form>

<h2>STOCK BARANG</h2>
<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Nama Barang</th>
        <th>Stock (Dus)</th>
        <th>Stock (Pcs)</th>
    </tr>

    <?php $i = 1; ?>
	<?php foreach( $result as $row ) : ?>
    
    <tr>
        <td><?= $i; ?></td>
        <td><?= $row['ProductName']; ?></td>
        <td><?= $row['QtyDus']; ?></td>
        <td><?= $row['QtyPcs']; ?></td>
    </tr>

	<?php $i++; ?>
	<?php endforeach; ?>

</table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>