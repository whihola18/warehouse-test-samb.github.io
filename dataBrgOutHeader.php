<?php 

require 'config.php';

$result = query("SELECT `trx`.`TrxOutPK` AS 'id', `trx`.`TrxOutNo` AS 'noDoc', `wh`.`WhsName` AS 'gudang', `trx`.`TrxOutDate` AS 'tanggal', `cs`.`CustomerName` AS 'customer', `trx`.`TrxOutNotes` AS 'notes'
FROM `tb_pengeluaranbrgheader` `trx`
INNER JOIN `m_warehouse` `wh` ON `wh`.`WhsPK` = `trx`.`Whsidf`
INNER JOIN `m_customer` `cs` ON `cs`.`CustomerPK` = `trx`.`TrxOutCustomerIdf`");

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WMS | Transaksi Pengeluaran</title>
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
          <a class="nav-link " aria-current="page" href="index.php">Home</a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
    <h2 class="text-center">Data Transaksi Barang Keluar</h2>
    
    <a href="formTrxOutbrgHeader.php" class="btn btn-info bg-gradient">Tambah data Transaksi</a>
    <br><br>
    
    <table border="1" cellpadding="10" cellspacing="0" class="table table-striped">
    
      <tr>
        <th>No.</th>
        <th>No Transaksi</th>
        <th>Gudang</th>
        <th>Tanggal Transaksi</th>
        <th>Customer</th>
        <th>Notes</th>
        <th>Transaksi Detail</th>
      </tr>
    
      <?php $i = 1; ?>
      <?php foreach( $result as $row ) : ?>
      <tr>
        <td><?= $i; ?></td>
        <td><?= $row["noDoc"]; ?></td>
        <td><?= $row["gudang"]; ?></td>
        <td><?= $row["tanggal"]; ?></td>
        <td><?= $row["customer"]; ?></td>
        <td><?= $row["notes"]; ?></td>
            <td>
          <a href="dataBrgOutDetail.php?docNo=<?= $row["noDoc"]; ?>" class="btn btn-success bg-gradient">DETAIL TRANSAKSI</a>
        </td>
      </tr>
      <?php $i++; ?>
      <?php endforeach; ?>
      
    </table>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>