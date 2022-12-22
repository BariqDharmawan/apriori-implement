-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 20, 2022 at 02:54 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ayuni-skripsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama`, `level`) VALUES
(4, 'admin', '$2y$10$Xkaj37nthnyHaDzdIS.e/e9yU9WVH/ulsPHA/CWlcGyXSBKyE9R5.', 'Admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `gambar`, `nama_produk`, `harga`) VALUES
(1, 'produk.png', 'sunt aut facere repellat provident occaecati excepturi optio reprehenderit', 100000),
(2, 'produk.png', 'qui est esse', 100000),
(3, 'produk.png', 'ea molestias quasi exercitationem repellat qui ipsa sit aut', 100000),
(4, 'produk.png', 'eum et est occaecati', 100000),
(5, 'produk.png', 'nesciunt quas odio', 100000),
(6, 'produk.png', 'dolorem eum magni eos aperiam quia', 100000),
(7, 'produk.png', 'magnam facilis autem', 100000),
(8, 'produk.png', 'dolorem dolore est ipsam', 100000),
(9, 'produk.png', 'nesciunt iure omnis dolorem tempora et accusantium', 100000),
(10, 'produk.png', 'optio molestias id quia eum', 100000),
(11, 'produk.png', 'et ea vero quia laudantium autem', 100000),
(12, 'produk.png', 'in quibusdam tempore odit est dolorem', 100000),
(13, 'produk.png', 'dolorum ut in voluptas mollitia et saepe quo animi', 100000),
(14, 'produk.png', 'voluptatem eligendi optio', 100000),
(15, 'produk.png', 'eveniet quod temporibus', 100000),
(16, 'produk.png', 'sint suscipit perspiciatis velit dolorum rerum ipsa laboriosam odio', 100000),
(17, 'produk.png', 'fugit voluptas sed molestias voluptatem provident', 100000),
(18, 'produk.png', 'voluptate et itaque vero tempora molestiae', 100000),
(19, 'produk.png', 'adipisci placeat illum aut reiciendis qui', 100000),
(20, 'produk.png', 'doloribus ad provident suscipit at', 100000),
(21, 'produk.png', 'asperiores ea ipsam voluptatibus modi minima quia sint', 100000),
(22, 'produk.png', 'dolor sint quo a velit explicabo quia nam', 100000),
(23, 'produk.png', 'maxime id vitae nihil numquam', 100000),
(24, 'produk.png', 'autem hic labore sunt dolores incidunt', 100000),
(25, 'produk.png', 'rem alias distinctio quo quis', 100000),
(26, 'produk.png', 'est et quae odit qui non', 100000),
(27, 'produk.png', 'quasi id et eos tenetur aut quo autem', 100000),
(28, 'produk.png', 'delectus ullam et corporis nulla voluptas sequi', 100000),
(29, 'produk.png', 'iusto eius quod necessitatibus culpa ea', 100000),
(30, 'produk.png', 'a quo magni similique perferendis', 100000),
(31, 'produk.png', 'ullam ut quidem id aut vel consequuntur', 100000),
(32, 'produk.png', 'doloremque illum aliquid sunt', 100000),
(33, 'produk.png', 'qui explicabo molestiae dolorem', 100000),
(34, 'produk.png', 'magnam ut rerum iure', 100000),
(35, 'produk.png', 'id nihil consequatur molestias animi provident', 100000),
(36, 'produk.png', 'fuga nam accusamus voluptas reiciendis itaque', 100000),
(37, 'produk.png', 'provident vel ut sit ratione est', 100000),
(38, 'produk.png', 'explicabo et eos deleniti nostrum ab id repellendus', 100000),
(39, 'produk.png', 'eos dolorem iste accusantium est eaque quam', 100000),
(40, 'produk.png', 'enim quo cumque', 100000),
(41, 'produk.png', 'non est facere', 100000),
(42, 'produk.png', 'commodi ullam sint et excepturi error explicabo praesentium voluptas', 100000),
(43, 'produk.png', 'eligendi iste nostrum consequuntur adipisci praesentium sit beatae perferendis', 100000),
(44, 'produk.png', 'optio dolor molestias sit', 100000),
(45, 'produk.png', 'ut numquam possimus omnis eius suscipit laudantium iure', 100000),
(46, 'produk.png', 'aut quo modi neque nostrum ducimus', 100000),
(47, 'produk.png', 'quibusdam cumque rem aut deserunt', 100000),
(48, 'produk.png', 'ut voluptatem illum ea doloribus itaque eos', 100000),
(49, 'produk.png', 'laborum non sunt aut ut assumenda perspiciatis voluptas', 100000),
(50, 'produk.png', 'repellendus qui recusandae incidunt voluptates tenetur qui omnis exercitationem', 100000),
(51, 'produk.png', 'soluta aliquam aperiam consequatur illo quis voluptas', 100000),
(52, 'produk.png', 'qui enim et consequuntur quia animi quis voluptate quibusdam', 100000),
(53, 'produk.png', 'ut quo aut ducimus alias', 100000),
(54, 'produk.png', 'sit asperiores ipsam eveniet odio non quia', 100000),
(55, 'produk.png', 'sit vel voluptatem et non libero', 100000),
(56, 'produk.png', 'qui et at rerum necessitatibus', 100000),
(57, 'produk.png', 'sed ab est est', 100000),
(58, 'produk.png', 'voluptatum itaque dolores nisi et quasi', 100000),
(59, 'produk.png', 'qui commodi dolor at maiores et quis id accusantium', 100000),
(60, 'produk.png', 'consequatur placeat omnis quisquam quia reprehenderit fugit veritatis facere', 100000),
(61, 'produk.png', 'voluptatem doloribus consectetur est ut ducimus', 100000),
(62, 'produk.png', 'beatae enim quia vel', 100000),
(63, 'produk.png', 'voluptas blanditiis repellendus animi ducimus error sapiente et suscipit', 100000),
(64, 'produk.png', 'et fugit quas eum in in aperiam quod', 100000),
(65, 'produk.png', 'consequatur id enim sunt et et', 100000),
(66, 'produk.png', 'repudiandae ea animi iusto', 100000),
(67, 'produk.png', 'aliquid eos sed fuga est maxime repellendus', 100000),
(68, 'produk.png', 'odio quis facere architecto reiciendis optio', 100000),
(69, 'produk.png', 'fugiat quod pariatur odit minima', 100000),
(70, 'produk.png', 'voluptatem laborum magni', 100000),
(71, 'produk.png', 'et iusto veniam et illum aut fuga', 100000),
(72, 'produk.png', 'sint hic doloribus consequatur eos non id', 100000),
(73, 'produk.png', 'consequuntur deleniti eos quia temporibus ab aliquid at', 100000),
(74, 'produk.png', 'enim unde ratione doloribus quas enim ut sit sapiente', 100000),
(75, 'produk.png', 'dignissimos eum dolor ut enim et delectus in', 100000),
(76, 'produk.png', 'doloremque officiis ad et non perferendis', 100000),
(77, 'produk.png', 'necessitatibus quasi exercitationem odio', 100000),
(78, 'produk.png', 'quam voluptatibus rerum veritatis', 100000),
(79, 'produk.png', 'pariatur consequatur quia magnam autem omnis non amet', 100000),
(80, 'produk.png', 'labore in ex et explicabo corporis aut quas', 100000),
(81, 'produk.png', 'tempora rem veritatis voluptas quo dolores vero', 100000),
(82, 'produk.png', 'laudantium voluptate suscipit sunt enim enim', 100000),
(83, 'produk.png', 'odit et voluptates doloribus alias odio et', 100000),
(84, 'produk.png', 'optio ipsam molestias necessitatibus occaecati facilis veritatis dolores aut', 100000),
(85, 'produk.png', 'dolore veritatis porro provident adipisci blanditiis et sunt', 100000),
(86, 'produk.png', 'placeat quia et porro iste', 100000),
(87, 'produk.png', 'nostrum quis quasi placeat', 100000),
(88, 'produk.png', 'sapiente omnis fugit eos', 100000),
(89, 'produk.png', 'sint soluta et vel magnam aut ut sed qui', 100000),
(90, 'produk.png', 'ad iusto omnis odit dolor voluptatibus', 100000),
(91, 'produk.png', 'aut amet sed', 100000),
(92, 'produk.png', 'ratione ex tenetur perferendis', 100000),
(93, 'produk.png', 'beatae soluta recusandae', 100000),
(94, 'produk.png', 'qui qui voluptates illo iste minima', 100000),
(95, 'produk.png', 'id minus libero illum nam ad officiis', 100000),
(96, 'produk.png', 'quaerat velit veniam amet cupiditate aut numquam ut sequi', 100000),
(97, 'produk.png', 'quas fugiat ut perspiciatis vero provident', 100000),
(98, 'produk.png', 'laboriosam dolor voluptates', 100000),
(99, 'produk.png', 'temporibus sit alias delectus eligendi possimus magni', 100000),
(100, 'produk.png', 'at nam consequatur ea labore ea harum', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_produk`, `jumlah_produk`, `tgl_transaksi`) VALUES
(3, 8, 9, '2009-09-09'),
(18, 50, 32, '2017-11-06'),
(64, 20, 34, '2018-11-23'),
(110, 96, 29, '2017-05-08'),
(111, 65, 31, '2019-07-08'),
(173, 61, 20, '2019-11-16'),
(194, 18, 30, '2018-08-16');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `level`) VALUES
(1, 'user', '$2y$10$IUz55Clm/McsWxrXzAnWheMBms8fxFcD8lUJZutSQTYqVDtl//QEG', 'user', 'user'),
(3, 'barqibarqibar', '$2y$10$XDjytOdSur0Y6xCQ9ATHZuCsrYe5KWfWJyRrdM7pel4KQG5L3Xa2S', 'Barqi', 'user'),
(12, 'username 19', '$2a$12$dMeAP.s5uSrLnLsPeShruunW1YiaWrDp4HsYtjK6xknE7YPHTLMw6', 'lorem saf aso fopasf aopsf 48', 'user'),
(13, 'username 14', '$2a$12$dMeAP.s5uSrLnLsPeShruunW1YiaWrDp4HsYtjK6xknE7YPHTLMw6', 'lorem saf aso fopasf aopsf 52', 'user'),
(18, 'username 2', '$2a$12$dMeAP.s5uSrLnLsPeShruunW1YiaWrDp4HsYtjK6xknE7YPHTLMw6', 'lorem saf aso fopasf aopsf 64', 'user'),
(19, 'username 1', '$2a$12$dMeAP.s5uSrLnLsPeShruunW1YiaWrDp4HsYtjK6xknE7YPHTLMw6', 'lorem saf aso fopasf aopsf 66', 'user'),
(20, 'username 4', '$2a$12$dMeAP.s5uSrLnLsPeShruunW1YiaWrDp4HsYtjK6xknE7YPHTLMw6', 'lorem saf aso fopasf aopsf 83', 'user'),
(21, 'username 20', '$2a$12$dMeAP.s5uSrLnLsPeShruunW1YiaWrDp4HsYtjK6xknE7YPHTLMw6', 'lorem saf aso fopasf aopsf 17', 'user'),
(22, 'username 19', '$2a$12$dMeAP.s5uSrLnLsPeShruunW1YiaWrDp4HsYtjK6xknE7YPHTLMw6', 'lorem saf aso fopasf aopsf 48', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
