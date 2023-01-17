<?php

require 'config.php';

$warehouse = query("SELECT * FROM m_warehouse");
$supplier = query("SELECT * FROM m_supplier");

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
	
	// cek apakah data berhasil di tambahkan atau tidak
	if( TrxInBrgHeader($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'dataBrgInHeader.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal ditambahkan!');
				document.location.href = 'dataBrgInHeader.php';
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
    <title>WMS | Form Transaksi masuk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<style>
        li { margin: 10px 15px ;}
    </style>  
</head>
<body>

<nav class="navbar navbar-expand-lg bg-info bg-gradient">
  <div class="container">
    <a class="navbar-brand" href="#">Home</a>
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
	<h1>Form Penerimaan Barang</h1>

	<form action="" method="post">
		<ul>
			<li>
				<label for="TrxInNo">No Transaksi: </label>
				<input type="text" name="TrxInNo" id="TrxInNo" required>
			</li>
			<li>
				<label for="whsid">Pilih Gudang: </label>
				<select name="whsid" id="whsid">
                    <option value=""> === Pilih Gudang === </option>
                    <?php foreach( $warehouse as $gudang ) : ?>
                        <option value="<?= $gudang['WhsPK']; ?>"> <?= $gudang['WhsName']; ?> </option>
                    <?php endforeach; ?>
                </select>
			</li>
			<li>
				<label for="date">Tanggal:</label>
				<input type="date" name="date" id="date">
			</li>
            
            <li>
				<label for="suppId">Pilih Supplier: </label>
				<select name="suppId" id="suppId">
                    <option value=""> === Pilih Supplier === </option>
                    <?php foreach( $supplier as $vendor ) : ?>
                        <option value="<?= $vendor['SupplierPK']; ?>"> <?= $vendor['SupplierName']; ?> </option>
                    <?php endforeach; ?>
                </select>
			</li>

            <li>
				<label for="note">Notes:</label>
				<input type="text" name="note" id="note">
			</li>

			<li>
				<button type="submit" name="submit">Tambah Data!</button>
			</li>
		</ul>

	</form>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>


</body>
</html>