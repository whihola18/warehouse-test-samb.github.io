-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2023 at 11:41 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gudang`
--

-- --------------------------------------------------------

--
-- Table structure for table `m_customer`
--

CREATE TABLE `m_customer` (
  `CustomerPK` int(11) NOT NULL,
  `CustomerName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `m_customer`
--

INSERT INTO `m_customer` (`CustomerPK`, `CustomerName`) VALUES
(1, 'Customer A'),
(2, 'Customer B'),
(3, 'Customer C');

-- --------------------------------------------------------

--
-- Table structure for table `m_product`
--

CREATE TABLE `m_product` (
  `ProductPK` int(11) NOT NULL,
  `ProductName` varchar(150) NOT NULL,
  `QtyDus` int(11) NOT NULL,
  `QtyPcs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `m_product`
--

INSERT INTO `m_product` (`ProductPK`, `ProductName`, `QtyDus`, `QtyPcs`) VALUES
(1, 'Barang A', 3, 15),
(2, 'Barang B', 1, 5),
(3, 'Barang C', 4, 20);

-- --------------------------------------------------------

--
-- Table structure for table `m_supplier`
--

CREATE TABLE `m_supplier` (
  `SupplierPK` int(11) NOT NULL,
  `SupplierName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `m_supplier`
--

INSERT INTO `m_supplier` (`SupplierPK`, `SupplierName`) VALUES
(1, 'Supplier 1'),
(2, 'Supplier 2'),
(3, 'Supplier 3');

-- --------------------------------------------------------

--
-- Table structure for table `m_warehouse`
--

CREATE TABLE `m_warehouse` (
  `WhsPK` int(11) NOT NULL,
  `WhsName` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `m_warehouse`
--

INSERT INTO `m_warehouse` (`WhsPK`, `WhsName`) VALUES
(1, 'Gudang 1'),
(2, 'Gudang 2'),
(3, 'Gudang 3');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penerimaanbarangdetail`
--

CREATE TABLE `tb_penerimaanbarangdetail` (
  `TrxInDPK` int(11) NOT NULL,
  `TrxInIDF` int(11) NOT NULL,
  `TrxInDProductIdf` int(11) NOT NULL,
  `TrxInDQtyDus` int(11) NOT NULL,
  `TrxInDQtyPcs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_penerimaanbarangdetail`
--

INSERT INTO `tb_penerimaanbarangdetail` (`TrxInDPK`, `TrxInIDF`, `TrxInDProductIdf`, `TrxInDQtyDus`, `TrxInDQtyPcs`) VALUES
(5, 1, 2, 2, 10),
(6, 2, 3, 4, 20),
(7, 4, 1, 3, 15);

-- --------------------------------------------------------

--
-- Table structure for table `tb_penerimaanbrgheader`
--

CREATE TABLE `tb_penerimaanbrgheader` (
  `TrxInPK` int(11) NOT NULL,
  `TrxInNo` varchar(200) NOT NULL,
  `WhsIdf` int(11) NOT NULL,
  `TrxInDate` date NOT NULL,
  `TrxInSuppIdf` int(11) NOT NULL,
  `TrxInNotes` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_penerimaanbrgheader`
--

INSERT INTO `tb_penerimaanbrgheader` (`TrxInPK`, `TrxInNo`, `WhsIdf`, `TrxInDate`, `TrxInSuppIdf`, `TrxInNotes`) VALUES
(1, 'BM0001', 1, '2023-01-18', 1, 'tes transaksi 1'),
(2, 'BM0002', 2, '2023-01-18', 2, 'Uji coba 2'),
(4, 'BM0003', 1, '2023-01-20', 2, 'tes transaksi 1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengeluaranbrgdetail`
--

CREATE TABLE `tb_pengeluaranbrgdetail` (
  `TrxOutDPK` int(11) NOT NULL,
  `TrxOutIDF` int(11) NOT NULL,
  `TrxOutDProductIdf` int(11) NOT NULL,
  `TrxOutDQtyDus` int(11) NOT NULL,
  `TrxOutDQtyPcs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pengeluaranbrgdetail`
--

INSERT INTO `tb_pengeluaranbrgdetail` (`TrxOutDPK`, `TrxOutIDF`, `TrxOutDProductIdf`, `TrxOutDQtyDus`, `TrxOutDQtyPcs`) VALUES
(2, 3, 2, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengeluaranbrgheader`
--

CREATE TABLE `tb_pengeluaranbrgheader` (
  `TrxOutPK` int(11) NOT NULL,
  `TrxOutNo` varchar(100) NOT NULL,
  `Whsidf` int(11) NOT NULL,
  `TrxOutDate` date NOT NULL,
  `TrxOutCustomerIdf` int(11) NOT NULL,
  `TrxOutNotes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pengeluaranbrgheader`
--

INSERT INTO `tb_pengeluaranbrgheader` (`TrxOutPK`, `TrxOutNo`, `Whsidf`, `TrxOutDate`, `TrxOutCustomerIdf`, `TrxOutNotes`) VALUES
(3, 'BK0001', 1, '2023-01-18', 1, 'test form pengeluaran barang');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_customer`
--
ALTER TABLE `m_customer`
  ADD PRIMARY KEY (`CustomerPK`);

--
-- Indexes for table `m_product`
--
ALTER TABLE `m_product`
  ADD PRIMARY KEY (`ProductPK`);

--
-- Indexes for table `m_supplier`
--
ALTER TABLE `m_supplier`
  ADD PRIMARY KEY (`SupplierPK`);

--
-- Indexes for table `m_warehouse`
--
ALTER TABLE `m_warehouse`
  ADD PRIMARY KEY (`WhsPK`);

--
-- Indexes for table `tb_penerimaanbarangdetail`
--
ALTER TABLE `tb_penerimaanbarangdetail`
  ADD PRIMARY KEY (`TrxInDPK`),
  ADD KEY `TrxInIDF` (`TrxInIDF`),
  ADD KEY `TrxInDProductIdf` (`TrxInDProductIdf`);

--
-- Indexes for table `tb_penerimaanbrgheader`
--
ALTER TABLE `tb_penerimaanbrgheader`
  ADD PRIMARY KEY (`TrxInPK`),
  ADD KEY `TrxInSuppIdf` (`TrxInSuppIdf`),
  ADD KEY `WhsIdf` (`WhsIdf`);

--
-- Indexes for table `tb_pengeluaranbrgdetail`
--
ALTER TABLE `tb_pengeluaranbrgdetail`
  ADD PRIMARY KEY (`TrxOutDPK`),
  ADD KEY `TrxOutDProductIdf` (`TrxOutDProductIdf`),
  ADD KEY `TrxOutIDF` (`TrxOutIDF`);

--
-- Indexes for table `tb_pengeluaranbrgheader`
--
ALTER TABLE `tb_pengeluaranbrgheader`
  ADD PRIMARY KEY (`TrxOutPK`),
  ADD KEY `Whsidf` (`Whsidf`),
  ADD KEY `TrxOutCustomerIdf` (`TrxOutCustomerIdf`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_customer`
--
ALTER TABLE `m_customer`
  MODIFY `CustomerPK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `m_product`
--
ALTER TABLE `m_product`
  MODIFY `ProductPK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `m_supplier`
--
ALTER TABLE `m_supplier`
  MODIFY `SupplierPK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `m_warehouse`
--
ALTER TABLE `m_warehouse`
  MODIFY `WhsPK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_penerimaanbarangdetail`
--
ALTER TABLE `tb_penerimaanbarangdetail`
  MODIFY `TrxInDPK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_penerimaanbrgheader`
--
ALTER TABLE `tb_penerimaanbrgheader`
  MODIFY `TrxInPK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_pengeluaranbrgdetail`
--
ALTER TABLE `tb_pengeluaranbrgdetail`
  MODIFY `TrxOutDPK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pengeluaranbrgheader`
--
ALTER TABLE `tb_pengeluaranbrgheader`
  MODIFY `TrxOutPK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_penerimaanbarangdetail`
--
ALTER TABLE `tb_penerimaanbarangdetail`
  ADD CONSTRAINT `tb_penerimaanbarangdetail_ibfk_1` FOREIGN KEY (`TrxInIDF`) REFERENCES `tb_penerimaanbrgheader` (`TrxInPK`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_penerimaanbarangdetail_ibfk_2` FOREIGN KEY (`TrxInDProductIdf`) REFERENCES `m_product` (`ProductPK`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_penerimaanbrgheader`
--
ALTER TABLE `tb_penerimaanbrgheader`
  ADD CONSTRAINT `tb_penerimaanbrgheader_ibfk_1` FOREIGN KEY (`TrxInSuppIdf`) REFERENCES `m_supplier` (`SupplierPK`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_penerimaanbrgheader_ibfk_2` FOREIGN KEY (`WhsIdf`) REFERENCES `m_warehouse` (`WhsPK`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_pengeluaranbrgdetail`
--
ALTER TABLE `tb_pengeluaranbrgdetail`
  ADD CONSTRAINT `tb_pengeluaranbrgdetail_ibfk_1` FOREIGN KEY (`TrxOutDProductIdf`) REFERENCES `m_product` (`ProductPK`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pengeluaranbrgdetail_ibfk_2` FOREIGN KEY (`TrxOutIDF`) REFERENCES `tb_pengeluaranbrgheader` (`TrxOutPK`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_pengeluaranbrgheader`
--
ALTER TABLE `tb_pengeluaranbrgheader`
  ADD CONSTRAINT `tb_pengeluaranbrgheader_ibfk_2` FOREIGN KEY (`Whsidf`) REFERENCES `m_warehouse` (`WhsPK`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pengeluaranbrgheader_ibfk_3` FOREIGN KEY (`TrxOutCustomerIdf`) REFERENCES `m_customer` (`CustomerPK`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
