<?php 

require 'config.php';

$noDoc = $_GET["docNo"];

$result = query("SELECT `TrxOutDetail`.`TrxOutDPK` AS 'id', `TrxOutHeader`.`TrxOutNo` AS 'noDoc', `product`.`ProductName` AS 'product', `TrxOutDetail`.`TrxOutDQtyDus` AS 'qtyDus', `TrxOutDetail`.`TrxOutDQtyPcs` AS 'qtyPcs'
FROM `tb_pengeluaranbrgdetail` `TrxOutDetail`
INNER JOIN `m_product` `product` ON `product`.`ProductPK` = `TrxOutDetail`.`TrxOutDProductIdf`
INNER JOIN `tb_pengeluaranbrgheader` `TrxOutHeader` ON `TrxOutHeader`.`TrxOutPK` = `TrxOutDetail`.`TrxOutIDF` WHERE `TrxOutHeader`.`TrxOutNo` = '$noDoc' ");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WMS | Transaksi Pengeluaran Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
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
              <a class="nav-link" aria-current="page" href="index.php">Home</a>
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
              <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Data Transaksi Detail
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="dataBrgInDetailAll.php">Detail Transaksi Brg In</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="dataBrgOutDetailAll.php">Detail Transaksi Brg Out</a></li>
              </ul>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="stock.php">Cetak Stock Barang</a>
            </li>
          </ul>
          
        </div>
      </div>
    </nav>

  <div class="container mt-4">

    <h2 class="text-center">Data Transaksi Barang Keluar Detail</h2>

    <a href="formTrxOutbrgDetail.php" class="btn btn-info bg-gradient mt-3">Tambah data Barang Keluar</a>
    
    <table border="1" cellpadding="10" cellspacing="0" class="table table-striped mt-3">
    
      <tr>
        <th>No.</th>
        <th>No Transaksi</th>
        <th>Product</th>
        <th>Qty Dus</th>
        <th>Qty Pcs</th>
      </tr>
    
      <?php $i = 1; ?>
      <?php foreach( $result as $row ) : ?>
      <tr>
        <td><?= $i; ?></td>
        <td><?= $row["noDoc"]; ?></td>
        <td><?= $row["product"]; ?></td>
        <td><?= $row["qtyDus"]; ?></td>
        <td><?= $row["qtyPcs"]; ?></td>
      </tr>
      <?php $i++; ?>
      <?php endforeach; ?>
      
    </table>
  </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>