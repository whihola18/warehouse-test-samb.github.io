<?php 

$hostName = 'localhost';
$userName = 'root';
$password = '';
$dataBase = 'gudang';

$conn = mysqli_connect($hostName, $userName, $password, $dataBase);

function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

function TrxInBrgHeader($data)
{
	global $conn;

	$TrxInNo = htmlspecialchars($data["TrxInNo"]);
	$whsid = htmlspecialchars($data["whsid"]);
	$date = htmlspecialchars($data["date"]);
	$suppId = htmlspecialchars($data["suppId"]);
	$note = htmlspecialchars($data["note"]);

	$query = "INSERT INTO tb_penerimaanbrgheader
				VALUES
			  ('', '$TrxInNo', '$whsid', '$date', '$suppId', '$note')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function TrxInBrgDetail($data)
{
	global $conn;

	$TrxInNoHeader = htmlspecialchars($data["TrxInNoHeader"]);
	$kode_brg = htmlspecialchars($data["kode_brg"]);
	$QtyDus = htmlspecialchars($data["QtyDus"]);
	$QtyPcs = htmlspecialchars($data["QtyPcs"]);

	$query = "INSERT INTO tb_penerimaanbarangdetail
				VALUES
			  ('', '$TrxInNoHeader', '$kode_brg', '$QtyDus', '$QtyPcs')
			";
	mysqli_query($conn, $query);

    $result = mysqli_query($conn, "SELECT * FROM m_product WHERE ProductPK = $kode_brg");

    $barang = mysqli_fetch_assoc($result);

    $stockDus = $barang['QtyDus'];
    $stockPcs = $barang['QtyPcs'];

    $dusUpdate = $stockDus + $QtyDus;
    $pcsUpdate = $stockPcs + $QtyPcs;

    $queryUpdate = "UPDATE m_product SET
                        QtyDus = '$dusUpdate',
				        QtyPcs = '$pcsUpdate'
                    WHERE ProductPK = $kode_brg";

    mysqli_query($conn, $queryUpdate);


	return mysqli_affected_rows($conn);
}

// ================== function barang keluar =================

function TrxOutBrgHeader($data)
{
	global $conn;

	$TrxOutNo = htmlspecialchars($data["TrxOutNo"]);
	$whsid = htmlspecialchars($data["whsid"]);
	$date = htmlspecialchars($data["date"]);
	$customerId = htmlspecialchars($data["customerId"]);
	$note = htmlspecialchars($data["note"]);

	$query = "INSERT INTO tb_pengeluaranbrgheader
				VALUES
			  ('', '$TrxOutNo', '$whsid', '$date', '$customerId', '$note')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function TrxOutBrgDetail($data)
{
	global $conn;

	$TrxOutNoHeader = htmlspecialchars($data["TrxOutNoHeader"]);
	$kode_brg = htmlspecialchars($data["kode_brg"]);
	$QtyDus = htmlspecialchars($data["QtyDus"]);
	$QtyPcs = htmlspecialchars($data["QtyPcs"]);

    $result = mysqli_query($conn, "SELECT * FROM m_product WHERE ProductPK = $kode_brg");

    $barang = mysqli_fetch_assoc($result);

    $stockDus = $barang['QtyDus'];
    $stockPcs = $barang['QtyPcs'];

    if( $stockDus == 0 || $stockDus < $QtyDus) {
        echo "<script>
                alert('Maaf Stock tidak cukup, transaksi gagal');
            </script>";
        
        return false;
    }

    if( $stockPcs == 0 || $stockPcs < $QtyPcs) {
        echo "<script>
                alert('Maaf Stock tidak cukup, transaksi gagal');
            </script>";
        
        return false;
    }

    $dusUpdate = $stockDus - $QtyDus;
    $pcsUpdate = $stockPcs - $QtyPcs;

    $queryUpdate = "UPDATE m_product SET
                        QtyDus = '$dusUpdate',
				        QtyPcs = '$pcsUpdate'
                    WHERE ProductPK = $kode_brg";

    mysqli_query($conn, $queryUpdate);

    $query = "INSERT INTO tb_pengeluaranbrgdetail
				VALUES
			  ('', '$TrxOutNoHeader', '$kode_brg', '$QtyDus', '$QtyPcs')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

?>