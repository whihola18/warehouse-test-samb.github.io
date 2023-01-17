<?php

require 'config.php';

$warehouse = query("SELECT * FROM m_warehouse");
$customer = query("SELECT * FROM m_customer");

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
	
	// cek apakah data berhasil di tambahkan atau tidak
	if( TrxOutBrgHeader($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'dataBrgOutHeader.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal ditambahkan!');
			</script>
		";
	}


}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WMS | Form Transaksi Keluar</title>
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

<div class="container mt-4 mb-5">
    <h2 class="text-center">Form Pengeluaran Barang</h2>

    <form action="" method="post">
      <div class="mb-2">
        <label for="TrxOutNo" class="form-label">No Transaksi: </label>
				<input type="text" name="TrxOutNo" id="TrxOutNo" class="form-control" required autofocus>
      </div>

      <div class="mb-2">
        <label for="whsid" class="form-label">Pilih Gudang: </label>
				<select name="whsid" id="whsid" class="form-control">
            <option value=""> === Pilih Gudang === </option>
            <?php foreach( $warehouse as $gudang ) : ?>
                <option value="<?= $gudang['WhsPK']; ?>"> <?= $gudang['WhsName']; ?> </option>
            <?php endforeach; ?>
        </select>
      </div>

      <div class="mb-2">
        <label for="date" class="form-label">Tanggal:</label>
				<input type="date" name="date" id="date" class="form-control" required>
      </div>

      <div class="mb-2">
        <label for="customer" class="form-label">Pilih Customer: </label>
				<select name="customerId" id="customer" class="form-control">
            <option value=""> === Pilih Supplier === </option>
            <?php foreach( $customer as $cs ) : ?>
                <option value="<?= $cs['CustomerPK']; ?>"> <?= $cs['CustomerName']; ?> </option>
            <?php endforeach; ?>
        </select>
      </div>
      
      <div class="mb-2">
        <label for="note" class="form-label">Notes:</label>
				<input type="text" name="note" id="note" class="form-control" required>
      </div>
      
      <button type="submit" class="btn btn-primary" name="submit">Tambah Data!</button>
    </form>

  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>