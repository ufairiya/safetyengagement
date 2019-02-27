-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 27, 2017 at 06:12 PM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.25-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `metronic`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_privileges`
--

CREATE TABLE `access_privileges` (
  `id_access_privileges` int(11) NOT NULL,
  `access_privileges_name` varchar(255) NOT NULL,
  `access_privileges_key` varchar(255) NOT NULL,
  `access_privileges_desc` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access_privileges`
--

INSERT INTO `access_privileges` (`id_access_privileges`, `access_privileges_name`, `access_privileges_key`, `access_privileges_desc`, `status`) VALUES
(1, 'Create New User', 'create_new_user', 'Create New User', 1),
(2, 'Create New Customer', 'create_new_customer', 'Create New Customer', 1),
(3, 'Create PO', 'create_po', 'Create Purchase Order', 1),
(4, 'View Sales Rep', 'view_sales_rep', 'View Sales Rep', 1),
(5, 'view customer', 'view_customer', 'Customer Info view', 1),
(6, 'Edit Customer', 'edit_customer', 'customer info edit', 1),
(7, 'view invoice', 'view_invoice', 'view invoice', 1),
(8, 'create invoice', 'create_invoice', 'create invoice', 1),
(9, 'delete invoice', 'delete_invoice', 'delete invoice', 1),
(10, 'view commission', 'view_commission', 'view commission', 1),
(11, 'create commission', 'create_commission', 'create commission', 1),
(12, 'Delete Customer', 'delete_customer', 'Delete Customer', 1),
(13, 'Edit Invoice', 'edit_invoice', 'edit Invoice', 1),
(14, 'Delete commission', 'delete_commission', 'Delete commission', 1),
(15, 'Edit commission', 'edit_commission', 'Edit commission', 1),
(0, 'Add Commission Payment', 'add_commission_payment', 'Add Commission Payment', 1),
(0, 'Add Commission Payment', 'add_commission_payment', 'Add Commission Payment', 1),
(0, 'Add Commission Payment', 'add_commission_payment', 'Add Commission Payment', 1),
(0, 'Add Commission Payment', 'add_commission_payment', 'Add Commission Payment', 1),
(0, 'test', 'test', 'test', 1),
(0, 'test124', 'test124', 'test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usertracking`
--

CREATE TABLE `usertracking` (
  `id` int(11) NOT NULL,
  `session_id` varchar(100) NOT NULL,
  `user_identifier` varchar(255) NOT NULL,
  `request_uri` text NOT NULL,
  `timestamp` varchar(20) NOT NULL,
  `client_ip` varchar(50) NOT NULL,
  `client_user_agent` text NOT NULL,
  `referer_page` text NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usertracking`
--

INSERT INTO `usertracking` (`id`, `session_id`, `user_identifier`, `request_uri`, `timestamp`, `client_ip`, `client_user_agent`, `referer_page`, `message`) VALUES
(1, '2uqs14o5m8k909sr2rjsh82fuk5ceq5b', '0', '/523/login/logout', '1502454291', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/dashboard', 'Logout'),
(2, '76pbu45ianqof5utt7tp7bcr5004003q', '0', '/523/login/processlogin', '1502454299', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/login', 'Login'),
(3, '76pbu45ianqof5utt7tp7bcr5004003q', '0', '/523/privileges/privileges_save', '1502455155', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/privileges/create', 'New Privilege Created'),
(4, '76pbu45ianqof5utt7tp7bcr5004003q', '0', '/523/privileges/privileges_save', '1502455176', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/privileges/create', 'New Privilege Created'),
(5, '76pbu45ianqof5utt7tp7bcr5004003q', '0', '/523/privileges/privileges_save', '1502455205', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/privileges/create', 'New Privilege Created'),
(6, '76pbu45ianqof5utt7tp7bcr5004003q', '0', '/523/user/save_user_access', '1502455342', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/user/user_access', 'Changing Permission For Users'),
(7, '76pbu45ianqof5utt7tp7bcr5004003q', '0', '/523//type/customer_type_save', '1502455454', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/type/customer_type_add', 'Customer Type Inserted'),
(8, '76pbu45ianqof5utt7tp7bcr5004003q', '0', '/523//type/customer_type_save', '1502455472', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/type/customer_type_add', 'Customer Type Inserted'),
(9, '76pbu45ianqof5utt7tp7bcr5004003q', '0', '/523//user/create_new_user', '1502456474', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/user/create', 'New  user create'),
(10, '76pbu45ianqof5utt7tp7bcr5004003q', '0', '/523/login/logout', '1502456600', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/user', 'Logout'),
(11, '6esl9pjigf7lkp00flvrkb7rrtppke01', '0', '/523/login/processlogin', '1502456610', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/login', 'Login'),
(12, '6esl9pjigf7lkp00flvrkb7rrtppke01', '0', '/523/login/logout', '1502456619', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/dashboard', 'Logout'),
(13, 'gfn0ql2cjcjfqfgkbnn71jltm34qaqr6', '0', '/523/login/processlogin', '1502456635', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/login', 'Login'),
(14, 'gfn0ql2cjcjfqfgkbnn71jltm34qaqr6', '0', '/523/login/logout', '1502457146', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/dashboard', 'Logout'),
(15, 'ak7j555lqjfkt4tcuq6hnda722lio4ae', '0', '/523/login/processlogin', '1502457154', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/login', 'Login'),
(16, 'dtcjt7di3vsbks182p73qr7iarhekoip', '0', '/523/login/processlogin', '1502509599', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/', 'Login'),
(17, 'dtcjt7di3vsbks182p73qr7iarhekoip', '0', '/523//user/create_new_user', '1502513531', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/user/create', 'New  user create'),
(18, 'dtcjt7di3vsbks182p73qr7iarhekoip', '0', '/523/login/logout', '1502518038', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/user', 'Logout'),
(19, 'cpknpfljq04s8dto99vlqmf2gojo9j9n', '0', '/523/login/processlogin', '1502523075', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/', 'Login'),
(20, 'cpknpfljq04s8dto99vlqmf2gojo9j9n', '0', '/523//user/create_new_user', '1502524702', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/user/create', 'New  user create'),
(21, 'cpknpfljq04s8dto99vlqmf2gojo9j9n', '0', '/523//user/create_new_user', '1502524749', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/user/create', 'New  user create'),
(22, 'cpknpfljq04s8dto99vlqmf2gojo9j9n', '0', '/523//user/create_new_user', '1502524753', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/user/create', 'New  user create'),
(23, 'cpknpfljq04s8dto99vlqmf2gojo9j9n', '0', '/523//user/create_new_user', '1502524837', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/user/create', 'New  user create'),
(24, 'cpknpfljq04s8dto99vlqmf2gojo9j9n', '0', '/523/login/logout', '1502528781', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/user/create', 'Logout'),
(25, '5rggvt2fflait60h8hdh51rj64ogp2ps', '0', '/523/login/processlogin', '1502528845', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/login', 'Login'),
(26, '5rggvt2fflait60h8hdh51rj64ogp2ps', '0', '/523//user/create_new_user', '1502529156', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/user/create', 'New  user create'),
(27, '5rggvt2fflait60h8hdh51rj64ogp2ps', '0', '/523//user/create_new_user', '1502533647', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/user/create', 'New  user create'),
(28, '5rggvt2fflait60h8hdh51rj64ogp2ps', '', '/523//user/create_new_user', '1502533747', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/user/create', 'New  user create'),
(29, '5rggvt2fflait60h8hdh51rj64ogp2ps', '', '/523//user/create_new_user', '1502533750', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/user/create', 'New  user create'),
(30, '5rggvt2fflait60h8hdh51rj64ogp2ps', '', '/523//user/create_new_user', '1502533750', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/user/create', 'New  user create'),
(31, '5rggvt2fflait60h8hdh51rj64ogp2ps', '', '/523//user/create_new_user', '1502533857', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/user/create', 'New  user create'),
(32, '5rggvt2fflait60h8hdh51rj64ogp2ps', '', '/523//user/create_new_user', '1502533890', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/user/create', 'New  user create'),
(33, '5rggvt2fflait60h8hdh51rj64ogp2ps', '', '/523//user/create_new_user', '1502534009', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/user/create', 'New  user create'),
(34, '5rggvt2fflait60h8hdh51rj64ogp2ps', '', '/523//user/create_new_user', '1502534343', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/user/create', 'New  user create'),
(35, '5rggvt2fflait60h8hdh51rj64ogp2ps', '', '/523//user/delete_user', '1502534507', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/user', 'Deleting User'),
(36, '5rggvt2fflait60h8hdh51rj64ogp2ps', '', '/523//user/delete_user', '1502534512', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/user', 'Deleting user permanently'),
(37, '5rggvt2fflait60h8hdh51rj64ogp2ps', '', '/523//user/create_new_user', '1502534547', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/user/create', 'New  user create'),
(38, '5rggvt2fflait60h8hdh51rj64ogp2ps', '', '/523//user/update_user', '1502534945', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/user', 'Updating User '),
(39, '5rggvt2fflait60h8hdh51rj64ogp2ps', '', '/523//user/update_user', '1502534956', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/user', 'Updating User '),
(40, '5rggvt2fflait60h8hdh51rj64ogp2ps', '', '/523//user/update_user', '1502536110', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/user', 'Updating User '),
(41, '5rggvt2fflait60h8hdh51rj64ogp2ps', '', '/523//user/update_user', '1502536575', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/user', 'Updating User '),
(42, '5rggvt2fflait60h8hdh51rj64ogp2ps', '', '/523//user/update_user', '1502536586', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/user', 'Updating User '),
(43, '5rggvt2fflait60h8hdh51rj64ogp2ps', '', '/523//user/update_user', '1502536595', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/user', 'Updating User '),
(44, '5rggvt2fflait60h8hdh51rj64ogp2ps', '', '/523//user/update_user', '1502536604', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/user', 'Updating User '),
(45, '5rggvt2fflait60h8hdh51rj64ogp2ps', '', '/523//user/update_user', '1502536631', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/user', 'Updating User '),
(46, '5rggvt2fflait60h8hdh51rj64ogp2ps', '', '/523//user/update_user', '1502536680', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/user', 'Updating User '),
(47, '5rggvt2fflait60h8hdh51rj64ogp2ps', '', '/523//user/update_user', '1502536691', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/user', 'Updating User '),
(48, '5rggvt2fflait60h8hdh51rj64ogp2ps', '', '/523//user/update_user', '1502536794', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/user', 'Updating User '),
(49, '5rggvt2fflait60h8hdh51rj64ogp2ps', '', '/523//user/update_user', '1502536805', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/user', 'Updating User '),
(50, '5rggvt2fflait60h8hdh51rj64ogp2ps', '', '/523//user/create_new_user', '1502543593', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/user/sales_rep', 'New  user create'),
(51, '5rggvt2fflait60h8hdh51rj64ogp2ps', '', '/523//user/update_user', '1502543610', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/user/view_sales_rep', 'Updating User '),
(52, '5rggvt2fflait60h8hdh51rj64ogp2ps', '', '/523//user/update_user', '1502543850', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/user/view_sales_rep', 'Updating User '),
(53, '5rggvt2fflait60h8hdh51rj64ogp2ps', '', '/523//user/update_user', '1502543877', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/user/view_sales_rep', 'Updating User '),
(54, '5rggvt2fflait60h8hdh51rj64ogp2ps', '', '/523//user/update_user', '1502543916', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/user', 'Updating User '),
(55, '5rggvt2fflait60h8hdh51rj64ogp2ps', '', '/523/privileges/privileges_save', '1502544019', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/privileges/create', 'New Privilege Created'),
(56, '5rggvt2fflait60h8hdh51rj64ogp2ps', '', '/523/user/save_user_access', '1502544047', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/user/user_access', 'Changing Permission For Users'),
(57, '5rggvt2fflait60h8hdh51rj64ogp2ps', '', '/523/login/logout', '1502544053', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/user/user_access', 'Logout'),
(58, 'qjqdr9vj7uih6qcikfqdmfira39fu8pk', '', '/523/login/processlogin', '1502544086', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/login', 'Login'),
(59, 'qjqdr9vj7uih6qcikfqdmfira39fu8pk', '', '/523/login/logout', '1502544107', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/dashboard', 'Logout'),
(60, 'udfr2thploa77go4jjb2dle59bf3lnub', '', '/523/login/processlogin', '1502682620', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/', 'Login'),
(61, 'udfr2thploa77go4jjb2dle59bf3lnub', '', '/523/login/logout', '1502682712', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/dashboard', 'Logout'),
(62, '2bisk9mpt8vdhme24dkvehpsp212mo64', '', '/523/login/processlogin', '1502682765', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/login', 'Login'),
(63, '2bisk9mpt8vdhme24dkvehpsp212mo64', '', '/523//user/update_user', '1502685915', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/user/view_sales_rep', 'Updating User '),
(64, '2bisk9mpt8vdhme24dkvehpsp212mo64', '', '/523//user/update_user', '1502685966', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/user/view_sales_rep', 'Updating User '),
(65, 'd4597a0805ed7d516577c1bb90962c132e087a80', '', '/523/login/processlogin', '1502687355', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(66, 'd4597a0805ed7d516577c1bb90962c132e087a80', '', '/523//user/update_user', '1502687463', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/user/view_sales_rep', 'Updating User '),
(67, 'd4597a0805ed7d516577c1bb90962c132e087a80', '', '/523//user/update_user', '1502687516', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/user/view_sales_rep', 'Updating User '),
(68, 'd4597a0805ed7d516577c1bb90962c132e087a80', '', '/523/login/logout', '1502687719', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/user/view_sales_rep', 'Logout'),
(69, '8a51ca0043de005f58daf95384ca7456331033b2', '', '/523/login/processlogin', '1502687784', '203.223.190.107', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(70, '8a51ca0043de005f58daf95384ca7456331033b2', '', '/523/login/logout', '1502687929', '203.223.190.107', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', 'http://stallioni.in/523/user', 'Logout'),
(71, '1502688214', '', '/523/forgot/process_forgot', '1502688214', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/login', 'Mail Send To kesavamoorthi m<kesav@stallioni.com> Subject :Forgot Password Reset Link'),
(72, 'f94864d4892a0547be564bc1e7eb8831ec280bd5', '', '/523/login/processlogin', '1502707313', '203.223.190.107', 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/51.0.2704.79 Chrome/51.0.2704.79 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(73, 'f94864d4892a0547be564bc1e7eb8831ec280bd5', '', '/523/login/logout', '1502709140', '203.223.190.107', 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/51.0.2704.79 Chrome/51.0.2704.79 Safari/537.36', 'http://stallioni.in/523/user', 'Logout'),
(74, '0dbfa8ca9e17d8c760c3c03a309cdf370ec16903', '', '/523/login/processlogin', '1502711785', '203.223.190.107', 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/51.0.2704.79 Chrome/51.0.2704.79 Safari/537.36', 'http://stallioni.in/523/login', 'Login'),
(75, '12e5a4e889ae57156772929052acce03fe55cdf0', '', '/523/login/processlogin', '1502717303', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(76, '9ba0cdb6c0dfdfa63bc6bc18e66da72cc601e80a', '', '/523/login/processlogin', '1502744130', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/', 'Login'),
(77, 'fe60618676dc8cf126af63742713607143b8e888', '', '/523/login/processlogin', '1502768870', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/login', 'Login'),
(78, 'fe60618676dc8cf126af63742713607143b8e888', '', '/523/login/logout', '1502768881', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/dashboard', 'Logout'),
(79, '7d9bc225931e577957d352dcc16d2f7b0ec76692', '', '/523/login/processlogin', '1502789542', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(80, 'c229973d0ba4c652ea5eb7e03b1217cc25b1a93c', '', '/523/login/processlogin', '1502789748', '203.223.190.107', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(81, '7d9bc225931e577957d352dcc16d2f7b0ec76692', '', '/523/login/logout', '1502790348', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/company/info/3', 'Logout'),
(82, '9430e1b239fba7843d4f75b73cf5b101a690a3a2', '', '/523/login/processlogin', '1502790359', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/login', 'Login'),
(83, '9430e1b239fba7843d4f75b73cf5b101a690a3a2', '', '/523/login/logout', '1502791227', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/company/info/4', 'Logout'),
(84, 'b77546d9c3926884370e68ce3e110fd5d7b53eba', '', '/523/login/processlogin', '1502795123', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/', 'Login'),
(85, '081069a06cf516cfedc9b3b9a826a3e7b72d3a5c', '', '/523/login/processlogin', '1502797320', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(86, '081069a06cf516cfedc9b3b9a826a3e7b72d3a5c', '', '/523/login/logout', '1502798264', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/company/create', 'Logout'),
(87, '7d3c086e8f17d778e7acc728a84a5db07b6e04bd', '', '/523/login/processlogin', '1502804303', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(88, '7d3c086e8f17d778e7acc728a84a5db07b6e04bd', '', '/523/login/logout', '1502804319', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/company', 'Logout'),
(89, '675688ad39bc3bd11e82080341bfc37c6b2ca7bc', '', '/523/login/processlogin', '1502807616', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/login', 'Login'),
(90, '0b9a642d83348d152eda40f3387fc5c7cf9430dd', '', '/523/login/processlogin', '1502817278', '98.214.94.65', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/login', 'Login'),
(91, 'e412ba7b187c98010e1e07185dd446154835b64d', '', '/523/login/processlogin', '1502860849', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(92, 'e412ba7b187c98010e1e07185dd446154835b64d', '', '/523/login/logout', '1502861294', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/dashboard', 'Logout'),
(93, '648b83dab4072baa668d99c747d64d103831bd1d', '', '/523/login/processlogin', '1502864444', '203.223.190.107', 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/51.0.2704.79 Chrome/51.0.2704.79 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(94, '82af1630ecde790d620e2807d0616386855e437b', '', '/523/login/processlogin', '1502885166', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(95, 'a2f2de477e4d340cf51ed1e5e80a449c5f8a105e', '', '/523/login/processlogin', '1502892505', '203.223.190.107', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:55.0) Gecko/20100101 Firefox/55.0', 'http://stallioni.in/523/', 'Login'),
(96, 'fc9e78589ca5c71c8d237021dc6b2140c5d52ece', '', '/523/login/processlogin', '1502899914', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/login', 'Login'),
(97, 'fc9e78589ca5c71c8d237021dc6b2140c5d52ece', '', '/523//user/update_user', '1502900035', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/user/view_sales_rep', 'Updating User '),
(98, 'e51d25baf9bdc306915a6fc4ff9ea159ea150508', '', '/523/login/processlogin', '1502914822', '98.214.94.65', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/login', 'Login'),
(99, 'f4a909c746eeb2ee6ce66b9c241a36a34d09055e', '', '/523/login/processlogin', '1502934409', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/login', 'Login'),
(100, 'f4a909c746eeb2ee6ce66b9c241a36a34d09055e', '', '/523/useractivity', '1502934442', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/dashboard', 'Viewing User Activity List'),
(101, 'f4a909c746eeb2ee6ce66b9c241a36a34d09055e', '', '/523/useractivity/view/2', '1502934450', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/useractivity', 'Viewing User Activity'),
(102, 'f4a909c746eeb2ee6ce66b9c241a36a34d09055e', '', '/523/useractivity/view/favicon.ico', '1502934451', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/useractivity/view/2', 'Viewing User Activity'),
(103, 'ca9e8a0a39beeb92fa84b22d0797d9b0e457e5f1', '', '/523/login/processlogin', '1502946088', '59.99.84.199', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.79 Safari/537.36 Edge/14.14393', 'http://stallioni.in/523/', 'Login'),
(104, '4c2fc97c356eefea6f5ba1ab4322e4e23ba8f150', '', '/523/login/processlogin', '1502951144', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(105, '4c2fc97c356eefea6f5ba1ab4322e4e23ba8f150', '', '/523/login/logout', '1502951556', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/company', 'Logout'),
(106, 'b38cd3a3ba752e0fe1968cff81e6fb155ae5ebca', '', '/523/login/processlogin', '1502965850', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(107, 'b38cd3a3ba752e0fe1968cff81e6fb155ae5ebca', '', '/523/login/logout', '1502970036', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/user/view_sales_rep', 'Logout'),
(108, '1502971089', '', '/523/login/logout', '1502971089', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/user/sales_rep', 'Logout'),
(109, '23e765b0583204765bf7cfa87924faf5144fcce1', '', '/523/login/processlogin', '1502972816', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(110, 'd5666470c2811d11cab426d1a1804a3bbf468493', '', '/523/login/processlogin', '1502973132', '203.223.190.107', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0', 'http://stallioni.in/523/', 'Login'),
(111, 'd5666470c2811d11cab426d1a1804a3bbf468493', '', '/523/login/logout', '1502973346', '203.223.190.107', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0', 'http://stallioni.in/523/company/create', 'Logout'),
(112, '23e765b0583204765bf7cfa87924faf5144fcce1', '', '/523/login/logout', '1502974088', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/company/info/1', 'Logout'),
(113, 'ca0f6219b5e3f314936a52ac9dcc8a90dd53ebe6', '', '/523/login/processlogin', '1502977175', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(114, 'f849e7834877a5a24345e5bcc6d0994ddf7e7e3d', '', '/523/login/processlogin', '1502989446', '166.216.165.113', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/', 'Login'),
(115, 'f849e7834877a5a24345e5bcc6d0994ddf7e7e3d', '', '/523//type/customer_type_save', '1502989539', '166.216.165.113', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/type/customer_type_add', 'Customer Type Inserted'),
(116, '6b9a21fb48ae5b441d17ad63396e2879a0d497ae', '', '/523/login/processlogin', '1503035108', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(117, '6b9a21fb48ae5b441d17ad63396e2879a0d497ae', '', '/523/login/logout', '1503039496', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/user/view_sales_rep', 'Logout'),
(118, '1503039508', '', '/523/login/logout', '1503039508', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/user/view_sales_rep', 'Logout'),
(119, 'c6671a26eab1d1e52e923dea523d8912231ed289', '', '/523/login/processlogin', '1503046973', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(120, 'c6671a26eab1d1e52e923dea523d8912231ed289', '', '/523/login/logout', '1503047093', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/company', 'Logout'),
(121, '6718a27fa5b75168ee77e29fca913f48b89c1586', '', '/523/login/processlogin', '1503053025', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(122, 'ef08a940394071baadf219a1412aaa8c60deddb7', '', '/523/login/processlogin', '1503056759', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/', 'Login'),
(123, '0cdf5f3c7cc6e305eb01b13ebca3ac410b9f0eeb', '', '/523/login/processlogin', '1503071888', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/login', 'Login'),
(124, '29af86282311ba2ed1e9d15c01b5dd92da792e46', '', '/523/login/processlogin', '1503115883', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(125, '29af86282311ba2ed1e9d15c01b5dd92da792e46', '', '/523/login/logout', '1503116094', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/user/sales_rep', 'Logout'),
(126, '60feccb61884de65b490522b20d4b9fa38acfa3d', '', '/523/login/processlogin', '1503127592', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(127, '60feccb61884de65b490522b20d4b9fa38acfa3d', '', '/523//company/update_user', '1503127635', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/user/view_sales_rep', 'Updating User '),
(128, '60feccb61884de65b490522b20d4b9fa38acfa3d', '', '/523//company/update_user', '1503127668', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/user/view_sales_rep', 'Updating User '),
(129, '60feccb61884de65b490522b20d4b9fa38acfa3d', '', '/523//company/update_user', '1503127679', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/user/view_sales_rep', 'Updating User '),
(130, '60feccb61884de65b490522b20d4b9fa38acfa3d', '', '/523//company/update_user', '1503127712', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/user/info/12', 'Updating User '),
(131, '60feccb61884de65b490522b20d4b9fa38acfa3d', '', '/523/login/logout', '1503127718', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/user/info/12', 'Logout'),
(132, '5379c9410d063ea146c8af0372e6d5c26a7f1166', '', '/523/login/processlogin', '1503129092', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(133, '5379c9410d063ea146c8af0372e6d5c26a7f1166', '', '/523//company/update_user', '1503129390', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/user/info/12', 'Updating User '),
(134, '5379c9410d063ea146c8af0372e6d5c26a7f1166', '', '/523//company/update_user', '1503129392', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/user/info/12', 'Updating User '),
(135, '5379c9410d063ea146c8af0372e6d5c26a7f1166', '', '/523//company/update_user', '1503129408', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/user/info/12', 'Updating User '),
(136, 'd90efb163ba3b3e20132996fc1ba51d4af5834d6', '', '/523/login/processlogin', '1503129461', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/user/info/12', 'Login'),
(137, 'd90efb163ba3b3e20132996fc1ba51d4af5834d6', '', '/523/login/logout', '1503129501', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/user/view_sales_rep', 'Logout'),
(138, '307839aa13979069f7b945c197a6908dd92acd0f', '', '/523/login/processlogin', '1503132885', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(139, '307839aa13979069f7b945c197a6908dd92acd0f', '', '/523/login/logout', '1503132924', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/purchase_order/create/2', 'Logout'),
(140, '96d2199bf14ef61125ce3ce70b492f7d5827d7cc', '', '/523/login/processlogin', '1503138058', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(141, '96d2199bf14ef61125ce3ce70b492f7d5827d7cc', '', '/523//company/create_new_user', '1503138195', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/user/sales_rep', 'New  user create'),
(142, '96d2199bf14ef61125ce3ce70b492f7d5827d7cc', '', '/523/login/logout', '1503138248', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/user/sales_rep', 'Logout'),
(143, '22379fd698a2fe30cca594158bd439342bf082ae', '', '/523/login/processlogin', '1503138769', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(144, '22379fd698a2fe30cca594158bd439342bf082ae', '', '/523//company/update_user', '1503138787', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/user/view_sales_rep', 'Updating User '),
(145, '22379fd698a2fe30cca594158bd439342bf082ae', '', '/523//company/update_user', '1503138803', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/user/view_sales_rep', 'Updating User '),
(146, '22379fd698a2fe30cca594158bd439342bf082ae', '', '/523//company/update_user', '1503138813', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/user/view_sales_rep', 'Updating User '),
(147, '22379fd698a2fe30cca594158bd439342bf082ae', '', '/523//company/update_user', '1503138822', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/user/view_sales_rep', 'Updating User '),
(148, '75327a466647cda509b712e6b0e2e2d228e3a4a8', '', '/523/login/processlogin', '1503150126', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/', 'Login'),
(149, 'ae5a3125de2f0a556d1ad86be055581e86be876e', '', '/523/login/processlogin', '1503150432', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(150, 'c9070608ae10f98b56e0a3cb23588c980f7e250a', '', '/523/login/processlogin', '1503247994', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/', 'Login'),
(151, 'd5a7f5e0a71580ad576fdcb236db8bfed635f43d', '', '/523/login/processlogin', '1503259065', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/login', 'Login'),
(152, '17eae6f165e8989f2ec90f11eab5460b33b29ecc', '', '/523/login/processlogin', '1503309765', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(153, '17eae6f165e8989f2ec90f11eab5460b33b29ecc', '', '/523/login/logout', '1503309920', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/purchase_order/create/1', 'Logout'),
(154, '6534d8e46f974c8769af11b200a7cce67b08f13b', '', '/523/login/processlogin', '1503310184', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/login', 'Login'),
(155, '3f2aa8b15c6969b92ec3087b96a2d16f052d2f48', '', '/523/login/processlogin', '1503355225', '107.77.85.79', 'Mozilla/5.0 (iPhone; CPU iPhone OS 10_3_1 like Mac OS X) AppleWebKit/603.1.30 (KHTML, like Gecko) Version/10.0 Mobile/14E304 Safari/602.1', 'http://stallioni.in/523/login', 'Login'),
(156, 'f4ca56cb4750e6fddb74e8419b2ea841fd6eebff', '', '/523/login/processlogin', '1503391531', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(157, 'f4ca56cb4750e6fddb74e8419b2ea841fd6eebff', '', '/523/login/logout', '1503398367', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/dashboard', 'Logout'),
(158, 'bd866a646933647c8149b4e8abb1086152e6202d', '', '/523/login/processlogin', '1503398541', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(159, 'bd866a646933647c8149b4e8abb1086152e6202d', '', '/523/login/logout', '1503398665', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/dashboard', 'Logout'),
(160, 'a95fa900544680b74a5914dab9af45e5e31d7d44', '', '/523/login/processlogin', '1503403154', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/login', 'Login'),
(161, 'a537eb2449a76d9f8f4613ea054d21052973c04d', '', '/523/login/processlogin', '1503403277', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(162, '17d27697099a1db5cbb81744569eafb5564b191e', '', '/523/login/processlogin', '1503413971', '98.214.94.65', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/login', 'Login'),
(163, 'b8655e66b5514cbecfb362f43e74debee188089b', '', '/523/login/processlogin', '1503469512', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(164, 'b8655e66b5514cbecfb362f43e74debee188089b', '', '/523/login/logout', '1503469942', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/purchase_order', 'Logout'),
(165, '8ba38d11b4cfa90de8b7fbd1e23c98582d00d8a2', '', '/523/login/processlogin', '1503471043', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(166, '8ba38d11b4cfa90de8b7fbd1e23c98582d00d8a2', '', '/523/login/logout', '1503471796', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/purchase_order/edit/1', 'Logout'),
(167, '7ced3cd1d581af1bd1dba3944f8c386635c77d89', '', '/523/login/processlogin', '1503472466', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/login', 'Login'),
(168, '7ced3cd1d581af1bd1dba3944f8c386635c77d89', '', '/523/login/logout', '1503472532', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/dashboard', 'Logout'),
(169, 'ec3de2d7f3bcffa9288a226b27711b625d5c8a04', '', '/523/login/processlogin', '1503473864', '203.223.190.107', 'Mozilla/5.0 (iPad; CPU OS 10_3_3 like Mac OS X) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.0 Mobile/14G60 Safari/602.1', 'http://stallioni.in/523/', 'Login'),
(170, 'ec3de2d7f3bcffa9288a226b27711b625d5c8a04', '', '/523/login/logout', '1503474081', '203.223.190.107', 'Mozilla/5.0 (iPad; CPU OS 10_3_3 like Mac OS X) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.0 Mobile/14G60 Safari/602.1', 'http://stallioni.in/523/purchase_order/edit/1', 'Logout'),
(171, '6138a1f27a33177ac7eba2cba217504fd189d5ef', '', '/523/login/processlogin', '1503474838', '203.223.190.107', 'Mozilla/5.0 (iPad; CPU OS 10_3_3 like Mac OS X) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.0 Mobile/14G60 Safari/602.1', 'http://stallioni.in/523/', 'Login'),
(172, '6138a1f27a33177ac7eba2cba217504fd189d5ef', '', '/523/login/logout', '1503475061', '203.223.190.107', 'Mozilla/5.0 (iPad; CPU OS 10_3_3 like Mac OS X) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.0 Mobile/14G60 Safari/602.1', 'http://stallioni.in/523/purchase_order/edit/1', 'Logout'),
(173, 'd7c6068f0230282df82a202c92053b836519d580', '', '/523/login/processlogin', '1503492788', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(174, '46783f2032310de2399ff1fb563a30af41ba86cb', '', '/523/login/processlogin', '1503493705', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(175, 'd7c6068f0230282df82a202c92053b836519d580', '', '/523/login/logout', '1503494943', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/commission', 'Logout'),
(176, 'd99958527b14691e707377f31bb47fb23bbf4738', '', '/523/login/processlogin', '1503497285', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/login', 'Login'),
(177, 'd99958527b14691e707377f31bb47fb23bbf4738', '', '/523//company/create_new_user', '1503497711', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/user/sales_rep', 'New  user create'),
(178, '6e1141d897f10978e264e198bbde42017bd6b5a2', '', '/523/login/processlogin', '1503546461', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(179, '6e1141d897f10978e264e198bbde42017bd6b5a2', '', '/523/login/logout', '1503554358', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/purchase_order/create/2', 'Logout'),
(180, '567e78e05344fbde3082cf5deddf4d5364eefe9f', '', '/523/login/processlogin', '1503555193', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(181, '567e78e05344fbde3082cf5deddf4d5364eefe9f', '', '/523/login/logout', '1503555248', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/company/info/1', 'Logout'),
(182, '9173418cd471a311480ee1b2186c1ee95524b610', '', '/523/login/processlogin', '1503575218', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(183, 'db3ac60d1a0b081a82e394d3e50814d467e24c3c', '', '/523/login/processlogin', '1503575371', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/login', 'Login'),
(184, '081ab05da1645b3e6e4dda5644e2040df8514a46', '', '/523/login/processlogin', '1503587010', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/login', 'Login'),
(185, '081ab05da1645b3e6e4dda5644e2040df8514a46', '', '/523//company/update_user', '1503587128', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/user/view_sales_rep', 'Updating User '),
(186, '081ab05da1645b3e6e4dda5644e2040df8514a46', '', '/523//type/customer_type_save', '1503587295', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/type/customer_type_add', 'Customer Type Inserted');
INSERT INTO `usertracking` (`id`, `session_id`, `user_identifier`, `request_uri`, `timestamp`, `client_ip`, `client_user_agent`, `referer_page`, `message`) VALUES
(187, '5b4fa29746b884c15856b330b4bfd6b8d0380dfe', '', '/523/login/processlogin', '1503627475', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/login', 'Login'),
(188, '96bcc1c294e14ca32b11a857a568a192573549c8', '', '/523/login/processlogin', '1503639106', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(189, '96bcc1c294e14ca32b11a857a568a192573549c8', '', '/523/login/logout', '1503639535', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/commission', 'Logout'),
(190, '86a3ab71babad5d85a5e20ef64c5a722339a9203', '', '/523/login/processlogin', '1503641182', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(191, '86a3ab71babad5d85a5e20ef64c5a722339a9203', '', '/523/items/add_item_save', '1503641204', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/items', 'items Updated'),
(192, '86a3ab71babad5d85a5e20ef64c5a722339a9203', '', '/523/items/add_item_save', '1503641211', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/items', 'items Updated'),
(193, '86a3ab71babad5d85a5e20ef64c5a722339a9203', '', '/523/productitem/add_pdtitem_save', '1503641231', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/productitem', 'Product items Updated'),
(194, '86a3ab71babad5d85a5e20ef64c5a722339a9203', '', '/523/productitem/add_pdtitem_save', '1503641260', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/productitem', 'Product items Updated'),
(195, '86a3ab71babad5d85a5e20ef64c5a722339a9203', '', '/523/productitem/add_pdtitem_save', '1503641276', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/productitem', 'Product items Updated'),
(196, '86a3ab71babad5d85a5e20ef64c5a722339a9203', '', '/523/productitem/add_pdtitem_save', '1503641292', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/productitem', 'Product items Updated'),
(197, '86a3ab71babad5d85a5e20ef64c5a722339a9203', '', '/523/productitem/add_pdtitem_save', '1503641308', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/productitem', 'Product items Updated'),
(198, '86a3ab71babad5d85a5e20ef64c5a722339a9203', '', '/523/productitem/add_pdtitem_save', '1503641323', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/productitem', 'Product items Updated'),
(199, '86a3ab71babad5d85a5e20ef64c5a722339a9203', '', '/523/productitem/add_pdtitem_save', '1503641339', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/productitem', 'Product items Updated'),
(200, '86a3ab71babad5d85a5e20ef64c5a722339a9203', '', '/523/productitem/add_pdtitem_save', '1503641358', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/productitem', 'Product items Updated'),
(201, '86a3ab71babad5d85a5e20ef64c5a722339a9203', '', '/523/productitem/add_pdtitem_save', '1503641376', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/productitem', 'Product items Updated'),
(202, '86a3ab71babad5d85a5e20ef64c5a722339a9203', '', '/523/productitem/add_pdtitem_save', '1503641398', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/productitem', 'Product items Updated'),
(203, '86a3ab71babad5d85a5e20ef64c5a722339a9203', '', '/523/productitem/add_pdtitem_save', '1503641414', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/productitem', 'Product items Updated'),
(204, '86a3ab71babad5d85a5e20ef64c5a722339a9203', '', '/523/productitem/add_pdtitem_save', '1503641431', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/productitem', 'Product items Updated'),
(205, '86a3ab71babad5d85a5e20ef64c5a722339a9203', '', '/523/productitem/add_pdtitem_save', '1503641453', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/productitem', 'Product items Updated'),
(206, '86a3ab71babad5d85a5e20ef64c5a722339a9203', '', '/523/login/logout', '1503645703', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/purchase_order/create/3', 'Logout'),
(207, 'f88db7cb6ab978f553aa010a4602db0771fc9b74', '', '/523/login/processlogin', '1503647053', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(208, 'f88db7cb6ab978f553aa010a4602db0771fc9b74', '', '/523/login/logout', '1503661016', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/commission/add/1', 'Logout'),
(209, '1359cae39ebe159dcd322b68ab63cc997a2dfa83', '', '/523/login/processlogin', '1503661081', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/login', 'Login'),
(210, 'efbf8183320a9fe7a10548b3cf0f9447f1ea6587', '', '/523/login/processlogin', '1503661345', '59.99.84.18', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:55.0) Gecko/20100101 Firefox/55.0', 'http://stallioni.in/523/', 'Login'),
(211, 'e297dd18a3695307fa53d6b0f68d7d8cf5deacc5', '', '/523/login/processlogin', '1503661445', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/login', 'Login'),
(212, '1359cae39ebe159dcd322b68ab63cc997a2dfa83', '', '/523/login/logout', '1503661507', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/productitem', 'Logout'),
(213, 'ae004d217855aa00b89695a5ddea5a8351f058df', '', '/523/login/processlogin', '1503661511', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/login', 'Login'),
(214, 'ae004d217855aa00b89695a5ddea5a8351f058df', '', '/523/login/logout', '1503668088', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/company/info/1', 'Logout'),
(215, '3ea326ff4d7c331eecb6c6b3367c9179fdb932be', '', '/523/login/processlogin', '1503688211', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/login', 'Login'),
(216, '2c4075113d10e2e2acb524d6eb6bf46a4bf0060c', '', '/523/login/processlogin', '1503721600', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(217, '2c4075113d10e2e2acb524d6eb6bf46a4bf0060c', '', '/523/login/logout', '1503721625', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/company', 'Logout'),
(218, 'c1dd901e19e15904856a312eb62f4aa18cd5650f', '', '/523/login/processlogin', '1503721629', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/login', 'Login'),
(219, 'c302ff8e40606fab81919b796cc744275309ebfd', '', '/523/login/processlogin', '1503744841', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(220, 'c302ff8e40606fab81919b796cc744275309ebfd', '', '/523/login/logout', '1503754079', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/company/info/1', 'Logout'),
(221, 'f6f14cfeb62365918712e2129a104eefbf484009', '', '/523/login/processlogin', '1503756571', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/login', 'Login'),
(222, 'f6f14cfeb62365918712e2129a104eefbf484009', '', '/523//company/create_new_user', '1503757610', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/user/sales_rep', 'New  user create'),
(223, 'f6f14cfeb62365918712e2129a104eefbf484009', '', '/523//type/customer_type_save', '1503757701', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/type/customer_type_add', 'Customer Type Inserted'),
(224, '472f61a422dd147c6d10d44055e7cc1cc6deed81', '', '/523/login/processlogin', '1503978893', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(225, '472f61a422dd147c6d10d44055e7cc1cc6deed81', '', '/523/login/logout', '1503979048', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/company/info/1', 'Logout'),
(226, 'd249390a9635c8968f084693215f5ceb7e91fd97', '', '/523/login/processlogin', '1504001395', '59.99.84.224', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(227, 'd249390a9635c8968f084693215f5ceb7e91fd97', '', '/523//company/update_user', '1504005551', '59.99.84.224', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/user/info/3', 'Updating User '),
(228, '637e883adabd8b3001cfffeacd852b71fe198c05', '', '/523/login/processlogin', '1504010785', '166.137.126.83', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/login', 'Login'),
(229, 'd249390a9635c8968f084693215f5ceb7e91fd97', '', '/523/login/logout', '1504010894', '59.99.84.224', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/commission/add/5', 'Logout'),
(230, '38dcdb8703e33ddde01486088d4667c03f10b864', '', '/523/login/processlogin', '1504010992', '59.99.84.224', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(231, '38dcdb8703e33ddde01486088d4667c03f10b864', '', '/523/login/logout', '1504014018', '59.99.84.224', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/dashboard', 'Logout'),
(232, 'a1db284ec40bb8dd64bc2d908a398f921f6a356e', '', '/523/login/processlogin', '1504014129', '166.137.126.83', 'Mozilla/5.0 (iPhone; CPU iPhone OS 10_3_1 like Mac OS X) AppleWebKit/603.1.30 (KHTML, like Gecko) Mobile/14E304', 'http://stallioni.in/523/', 'Login'),
(233, 'ded57843a41c0f3c3ddc1e2c58c3befc1f9fb8e1', '', '/523/login/processlogin', '1504064509', '203.223.190.107', 'Mozilla/5.0 (Linux; Android 6.0.1; SM-J700F Build/MMB29K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.125 Mobile Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(234, 'cca1784d5f0bc83a7068f7e87e5d410e1e9cb613', '', '/523/login/processlogin', '1504067006', '203.223.190.107', 'Mozilla/5.0 (Linux; Android 6.0.1; SM-J700F Build/MMB29K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.125 Mobile Safari/537.36', 'http://stallioni.in/523/login', 'Login'),
(235, '233a5a6b530a80cb6cf5a1f561a72cde311aa653', '', '/523/login/processlogin', '1504068987', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(236, '233a5a6b530a80cb6cf5a1f561a72cde311aa653', '', '/523/login/logout', '1504069151', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/company', 'Logout'),
(237, '522c03c98d57033b8262c1a422686edd89c49f58', '', '/523/login/processlogin', '1504069522', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.101 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(238, '84607c7ca95edebb39506f582956777f25841c10', '', '/523/login/processlogin', '1504070361', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(239, '84607c7ca95edebb39506f582956777f25841c10', '', '/523//company/update_user', '1504070384', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/user/view_sales_rep', 'Updating User '),
(240, '84607c7ca95edebb39506f582956777f25841c10', '', '/523//company/update_user', '1504070402', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/user/view_sales_rep', 'Updating User '),
(241, '84607c7ca95edebb39506f582956777f25841c10', '', '/523//company/update_user', '1504070433', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/user/view_sales_rep', 'Updating User '),
(242, '84607c7ca95edebb39506f582956777f25841c10', '', '/523//company/create_new_user', '1504070542', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/user/sales_rep', 'New  user create'),
(243, '84607c7ca95edebb39506f582956777f25841c10', '', '/523/login/logout', '1504070581', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/user/view_sales_rep', 'Logout'),
(244, 'b452e30c6c3470de9976d0cd7b17aa77d3f20132', '', '/523/login/processlogin', '1504074222', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(245, 'daccc0e7aefd96680fb331419ecb561e5bfa653d', '', '/523/login/processlogin', '1504083918', '59.99.84.176', 'Mozilla/5.0 (iPad; CPU OS 10_3_3 like Mac OS X) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.0 Mobile/14G60 Safari/602.1', 'http://stallioni.in/523/', 'Login'),
(246, '4b77b41da281a397071f6a3cf3d84d9b54199817', '', '/523/login/processlogin', '1504084121', '59.99.84.176', 'Mozilla/5.0 (iPad; CPU OS 10_3_3 like Mac OS X) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.0 Mobile/14G60 Safari/602.1', 'http://stallioni.in/523/', 'Login'),
(247, '4b77b41da281a397071f6a3cf3d84d9b54199817', '', '/523//company/update_user', '1504085351', '59.99.84.176', 'Mozilla/5.0 (iPad; CPU OS 10_3_3 like Mac OS X) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.0 Mobile/14G60 Safari/602.1', 'http://stallioni.in/523/user/view_sales_rep', 'Updating User '),
(248, '4b77b41da281a397071f6a3cf3d84d9b54199817', '', '/523//company/update_user', '1504085352', '59.99.84.176', 'Mozilla/5.0 (iPad; CPU OS 10_3_3 like Mac OS X) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.0 Mobile/14G60 Safari/602.1', 'http://stallioni.in/523/user/view_sales_rep', 'Updating User '),
(249, '4b77b41da281a397071f6a3cf3d84d9b54199817', '', '/523//company/update_user', '1504085384', '59.99.84.176', 'Mozilla/5.0 (iPad; CPU OS 10_3_3 like Mac OS X) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.0 Mobile/14G60 Safari/602.1', 'http://stallioni.in/523/user/view_sales_rep', 'Updating User '),
(250, '4b77b41da281a397071f6a3cf3d84d9b54199817', '', '/523//company/update_user', '1504085431', '59.99.84.176', 'Mozilla/5.0 (iPad; CPU OS 10_3_3 like Mac OS X) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.0 Mobile/14G60 Safari/602.1', 'http://stallioni.in/523/user/view_sales_rep', 'Updating User '),
(251, '133dc8f0639e68b7e3c7857f67397cc460373437', '', '/523/login/processlogin', '1504085800', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.101 Safari/537.36', 'http://stallioni.in/523/login', 'Login'),
(252, '39b206f2f22aee2329cadd1de72625b7ff4d6d1b', '', '/523/login/processlogin', '1504087307', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(253, '39b206f2f22aee2329cadd1de72625b7ff4d6d1b', '', '/523/login/logout', '1504087425', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/company/info/1', 'Logout'),
(254, '43774abcf941d18f0928af592835db2c74fda385', '', '/523/login/processlogin', '1504094277', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(255, '43774abcf941d18f0928af592835db2c74fda385', '', '/523/productitem/add_poitem_save', '1504094339', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/purchase_order/create/1', 'New Product items Created'),
(256, '43774abcf941d18f0928af592835db2c74fda385', '', '/523/login/logout', '1504095240', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/purchase_order/edit/5', 'Logout'),
(257, '4a93b570c0a96b6659cd8d0eea56a0dc36a8b850', '', '/523/login/processlogin', '1504095714', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(258, '4a93b570c0a96b6659cd8d0eea56a0dc36a8b850', '', '/523/login/logout', '1504095843', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/purchase_order', 'Logout'),
(259, '0d0a29ff0a0b030ee6fcbd2b728cdb981e06f84f', '', '/523/login/processlogin', '1504096367', '12.217.225.199', 'Mozilla/5.0 (iPhone; CPU iPhone OS 10_3_1 like Mac OS X) AppleWebKit/603.1.30 (KHTML, like Gecko) Mobile/14E304', 'http://stallioni.in/523/', 'Login'),
(260, 'f42314b29d5b38725e5a1cb23598bbc9bd98773e', '', '/523/login/processlogin', '1504098153', '72.204.180.109', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/login', 'Login'),
(261, '26a7b3e06ed24f6ecb424f92e2dc8b9083e16238', '', '/523/login/processlogin', '1504099274', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(262, '26a7b3e06ed24f6ecb424f92e2dc8b9083e16238', '', '/523/login/logout', '1504100868', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/purchase_order', 'Logout'),
(263, '522a63c47027c87ded0c6a0cbfd7c5c1a0f92292', '', '/523/login/processlogin', '1504132836', '12.217.225.199', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/login', 'Login'),
(264, 'c9f933694f76cc691057b607721a21b42e91dbff', '', '/523/login/processlogin', '1504146324', '12.217.225.199', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/login', 'Login'),
(265, '8bac07d508684f79f7198484fc3f23f423528bdc', '', '/523/login/processlogin', '1504175895', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(266, '8bac07d508684f79f7198484fc3f23f423528bdc', '', '/523/login/logout', '1504177356', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/purchase_order/edit/4', 'Logout'),
(267, 'b56458174865b2e1d1e2cb1c4ac36d693f6773af', '', '/523/login/processlogin', '1504185561', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(268, 'b56458174865b2e1d1e2cb1c4ac36d693f6773af', '', '/523/login/logout', '1504186418', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/purchase_order/edit/5', 'Logout'),
(269, '6fc639fe0922af1653c7b422c015866a67c1b71b', '', '/523/login/processlogin', '1504211702', '166.137.126.83', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/login', 'Login'),
(270, '8c4cbb4f1c5b805d0eb1e74ae1f42d69543ac243', '', '/523/login/processlogin', '1504241229', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(271, '8c4cbb4f1c5b805d0eb1e74ae1f42d69543ac243', '', '/523/login/logout', '1504241859', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice', 'Logout'),
(272, 'ff0af0cf3019696a7d06756246632a9058809f85', '', '/523/login/processlogin', '1504246282', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.101 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(273, 'f1d7348e857b0c130edbe7a627bf1fe41453fcff', '', '/523/login/processlogin', '1504247359', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(274, '5ef083c5a1332523b2287d15543dfd70dd8f856f', '', '/523/login/processlogin', '1504261479', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(275, '5ef083c5a1332523b2287d15543dfd70dd8f856f', '', '/523/login/logout', '1504261744', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/commission/edit/2', 'Logout'),
(276, '26b6c808d672be5ac50572a0966399f919cd7f5e', '', '/523/login/processlogin', '1504262765', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/login', 'Login'),
(277, 'a291af9ce7f70326f2d839223a945646974475b6', '', '/523/login/processlogin', '1504327402', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.101 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(278, '7a08a0ce5fe9c8d3e634f13e62a597905d88d69c', '', '/523/login/processlogin', '1504343966', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(279, '7a08a0ce5fe9c8d3e634f13e62a597905d88d69c', '', '/523/login/logout', '1504344413', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/commission/edit/3', 'Logout'),
(280, '1504344419', '', '/523/login/logout', '1504344419', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/commission', 'Logout'),
(281, '8d0f72c69d828586b77cb89449e701f9d42c936d', '', '/523/login/processlogin', '1504347734', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(282, '8d0f72c69d828586b77cb89449e701f9d42c936d', '', '/523/login/logout', '1504348016', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/commission/edit/2', 'Logout'),
(283, 'e069a98ae03fef33044f0080eeb6823c27337d89', '', '/523/login/processlogin', '1504348145', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/login', 'Login'),
(284, 'e069a98ae03fef33044f0080eeb6823c27337d89', '', '/523/login/logout', '1504348529', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/company/view/4/', 'Logout'),
(285, '2ae4a0d7a2e7a2aad1f2d9219240d494a18a03a1', '', '/523/login/processlogin', '1504356046', '203.223.190.107', 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/51.0.2704.79 Chrome/51.0.2704.79 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(286, '2ae4a0d7a2e7a2aad1f2d9219240d494a18a03a1', '', '/523/login/logout', '1504356343', '203.223.190.107', 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/51.0.2704.79 Chrome/51.0.2704.79 Safari/537.36', 'http://stallioni.in/523/company/view/4', 'Logout'),
(287, '504215f15635dd91d19b909b0bf708c972a236b6', '', '/523/login/processlogin', '1504356438', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(288, 'fb14c5537ef64803e2fb733c13d3fa46054ee26d', '', '/523/login/processlogin', '1504356452', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/login', 'Login'),
(289, 'd7925677ed3dda07a43a4d9a0ab0795dda35ca97', '', '/523/login/processlogin', '1504357964', '203.223.190.107', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:55.0) Gecko/20100101 Firefox/55.0', 'http://stallioni.in/523/login', 'Login'),
(290, 'd1bc747364a8c9b8a480da3452c7d1734fe8b068', '', '/523/login/processlogin', '1504492107', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/login', 'Login'),
(291, 'd1bc747364a8c9b8a480da3452c7d1734fe8b068', '', '/523/productitem/add_pdtitem_save', '1504492244', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/productitem', 'New Product items Created'),
(292, 'd1bc747364a8c9b8a480da3452c7d1734fe8b068', '', '/523/items/add_item_save', '1504492426', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/items', 'New items Created'),
(293, '3e498ba0454e12bd62bb785e9b01876710a1968c', '', '/523/login/processlogin', '1504497462', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(294, '3e498ba0454e12bd62bb785e9b01876710a1968c', '', '/523/login/logout', '1504508010', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/company/view/4', 'Logout'),
(295, 'fd4c413c159504a55d1b8bb31835480db78724ea', '', '/523/login/processlogin', '1504516683', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(296, '2c8aa3cabdf2c3f7e32c322e396d6bd451118e6b', '', '/523/login/processlogin', '1504527773', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(297, '2c8aa3cabdf2c3f7e32c322e396d6bd451118e6b', '', '/523/login/logout', '1504528224', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/commission/edit/5', 'Logout'),
(298, '83163d509eb86ac77ad7f702b4bd63227ab92e0c', '', '/523/login/processlogin', '1504610957', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(299, 'b28965540d64ad28ca609c0b0db0931fcedfa428', '', '/523/login/processlogin', '1504668109', '107.77.85.87', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/login', 'Login'),
(300, '17fbb1d0a006b102c7ca6d7fcfe0607ab6ae2847', '', '/523/login/processlogin', '1504670072', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(301, 'b28965540d64ad28ca609c0b0db0931fcedfa428', '', '/523/productitem/add_pdtitem_save', '1504671012', '107.77.85.87', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/productitem', 'New Product items Created'),
(302, '6d12e7dd8468b5a3b99b3a8cf4a005d4697ecc8a', '', '/523/login/processlogin', '1504699752', '107.77.85.87', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/login', 'Login'),
(303, '17fbb1d0a006b102c7ca6d7fcfe0607ab6ae2847', '', '/523/login/logout', '1504700740', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/company/view/4', 'Logout'),
(304, 'c891e0fe7dd4dbcf6b7eb6d4bf4fe4d2bd9c81f3', '', '/523/login/processlogin', '1504761348', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(305, 'a01d4089cbe890174710e2428616a65f6700c80d', '', '/523/login/processlogin', '1504769274', '203.223.190.107', 'Mozilla/5.0 (iPad; CPU OS 10_3_3 like Mac OS X) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.0 Mobile/14G60 Safari/602.1', 'http://stallioni.in/523/', 'Login'),
(306, '2dc2e6197224b80ec9bc6e551cd2a3dec4e15f63', '', '/523/login/processlogin', '1504769751', '203.223.190.107', 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/51.0.2704.79 Chrome/51.0.2704.79 Safari/537.36', 'http://stallioni.in/523/login', 'Login'),
(307, 'a5c9ae329c58b85daf66b527dc298bfc0d576bc1', '', '/523/login/processlogin', '1504769851', '203.223.190.107', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/', 'Login'),
(308, 'd263fe466a6dff96f3b322e41c5b5625903f8a77', '', '/523/login/processlogin', '1504778975', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(309, '8f50bd3bfbca254522158644b060efb165e1146e', '', '/523/login/processlogin', '1504788773', '107.77.64.33', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/login', 'Login'),
(310, '8f50bd3bfbca254522158644b060efb165e1146e', '', '/523/useractivity', '1504792417', '98.160.82.39', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/user/user_level', 'Viewing User Activity List'),
(311, '8f50bd3bfbca254522158644b060efb165e1146e', '', '/523/useractivity/view/1', '1504792431', '98.160.82.39', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/useractivity', 'Viewing User Activity'),
(312, '8f50bd3bfbca254522158644b060efb165e1146e', '', '/523/useractivity/view/favicon.ico', '1504792432', '98.160.82.39', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/useractivity/view/1', 'Viewing User Activity'),
(313, 'bcb1a585ea718667318c0083c21b4925cbff76a0', '', '/523/login/processlogin', '1504792739', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(314, 'bcb1a585ea718667318c0083c21b4925cbff76a0', '', '/523/login/logout', '1504793124', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/dashboard', 'Logout'),
(315, 'ad6f17479a4166421098158f211a5bf98bb6a41f', '', '/523/login/processlogin', '1504793132', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/login', 'Login'),
(316, 'ad6f17479a4166421098158f211a5bf98bb6a41f', '', '/523/login/logout', '1504793283', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/user/user_access', 'Logout'),
(317, '8f50bd3bfbca254522158644b060efb165e1146e', '', '/523/privileges/privileges_save', '1504797756', '98.160.82.30', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/privileges', 'Privilege Updated'),
(318, '8f50bd3bfbca254522158644b060efb165e1146e', '', '/523/privileges/privileges_save', '1504797759', '98.160.82.30', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/privileges', 'Privilege Updated'),
(319, '8f50bd3bfbca254522158644b060efb165e1146e', '', '/523/privileges/privileges_save', '1504797766', '98.160.82.30', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/privileges', 'Privilege Updated'),
(320, '8f50bd3bfbca254522158644b060efb165e1146e', '', '/523/privileges/privileges_save', '1504797878', '98.160.82.30', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/privileges', 'Privilege Updated'),
(321, 'f43b0c5836a58fd4a18f1e1c86e9ecc8218a8154', '', '/523/login/processlogin', '1504842709', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(322, 'f43b0c5836a58fd4a18f1e1c86e9ecc8218a8154', '', '/523/privileges/privileges_save', '1504842729', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/privileges', 'Privilege Updated'),
(323, 'f43b0c5836a58fd4a18f1e1c86e9ecc8218a8154', '', '/523/privileges/privileges_save', '1504842742', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/privileges', 'Privilege Updated'),
(324, 'f43b0c5836a58fd4a18f1e1c86e9ecc8218a8154', '', '/523/privileges/privileges_save', '1504842831', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/privileges', 'Privilege Updated'),
(325, 'f43b0c5836a58fd4a18f1e1c86e9ecc8218a8154', '', '/523/privileges/privileges_save', '1504842841', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/privileges', 'Privilege Updated'),
(326, 'f43b0c5836a58fd4a18f1e1c86e9ecc8218a8154', '', '/523/login/logout', '1504843821', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice/view/14', 'Logout'),
(327, '37965d34b9a673e46221ac0979dd61b19b0b2159', '', '/523/login/processlogin', '1504849296', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(328, '37965d34b9a673e46221ac0979dd61b19b0b2159', '', '/523/login/logout', '1504850738', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice/view/14', 'Logout'),
(329, '6e47470f9bfc095fb10514a837d61e8ecbcb85a9', '', '/523/login/processlogin', '1504872812', '98.160.82.27', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/login', 'Login'),
(330, '6e47470f9bfc095fb10514a837d61e8ecbcb85a9', '', '/523/login/logout', '1504873249', '98.160.82.27', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/user/user_access', 'Logout'),
(331, 'f25d37266a3efbf139576100e36f8f1b18955ef8', '', '/523/login/processlogin', '1504873270', '98.160.82.27', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/login', 'Login'),
(332, '712155797ae16fd8efc9558d6c110229599cfb9c', '', '/523/login/processlogin', '1504873518', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(333, '712155797ae16fd8efc9558d6c110229599cfb9c', '', '/523/login/logout', '1504873524', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/company', 'Logout'),
(334, 'f25d37266a3efbf139576100e36f8f1b18955ef8', '', '/523/login/logout', '1504873590', '98.160.82.27', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/company/view/4', 'Logout'),
(335, 'd5806e09c20a5dc9c5a49c1f3cc2dbea72bbfe76', '', '/523/login/processlogin', '1504873594', '98.160.82.27', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/login', 'Login'),
(336, '4bc9913980b98fe34c74718481bfe2859ac7fe5e', '', '/523/login/processlogin', '1504874249', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(337, '4bc9913980b98fe34c74718481bfe2859ac7fe5e', '', '/523//company/update_user', '1504874491', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/SalesRep/', 'Updating User '),
(338, '4bc9913980b98fe34c74718481bfe2859ac7fe5e', '', '/523//company/update_user', '1504874568', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/SalesRep/', 'Updating User '),
(339, '1504876016', '', '/523/login/logout', '1504876016', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/SalesRep/', 'Logout'),
(340, '5578d5d5c0ded300ba6af2389a44bd03468a8934', '', '/523/login/processlogin', '1504938476', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(341, '5578d5d5c0ded300ba6af2389a44bd03468a8934', '', '/523/login/logout', '1504941979', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/commission/edit/4', 'Logout'),
(342, '49dea739bdf0534ef92298006d678c122145e3ca', '', '/523/login/processlogin', '1504968102', '107.77.64.33', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/login', 'Login'),
(343, '0884a38d6921040adfdced68df3df53a7c625aec', '', '/523/login/processlogin', '1505009048', '98.160.82.6', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/productitem', 'Login'),
(344, '0884a38d6921040adfdced68df3df53a7c625aec', '', '/523/items/add_item_save', '1505009129', '98.160.82.6', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/items', 'New items Created'),
(345, '0884a38d6921040adfdced68df3df53a7c625aec', '', '/523/productitem/add_pdtitem_save', '1505009177', '98.160.82.6', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/productitem', 'Product items Updated'),
(346, '0884a38d6921040adfdced68df3df53a7c625aec', '', '/523/productitem/add_pdtitem_save', '1505009207', '98.160.82.6', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/productitem', 'Product items Updated'),
(347, 'f7e14cbe9857c38e6afef512323d42f335f39382', '', '/523/login/processlogin', '1505009919', '107.77.64.33', 'Mozilla/5.0 (iPhone; CPU iPhone OS 10_3_3 like Mac OS X) AppleWebKit/603.3.8 (KHTML, like Gecko) Mobile/14G60', 'http://stallioni.in/523/login', 'Login'),
(348, 'e247a69501673116788ccba53356f814f97cc5f0', '', '/523/login/processlogin', '1505102258', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(349, 'e247a69501673116788ccba53356f814f97cc5f0', '', '/523/login/logout', '1505102903', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/productitem', 'Logout'),
(350, '9d444559a07cada80d57ffe23cfb3cb50dbf682b', '', '/523/login/processlogin', '1505128122', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(351, '7dfdfeb6baf15d73aa178ef0109febd5859cf4f6', '', '/523/login/processlogin', '1505131076', '203.223.190.107', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:55.0) Gecko/20100101 Firefox/55.0', 'http://stallioni.in/523/', 'Login'),
(352, '9d444559a07cada80d57ffe23cfb3cb50dbf682b', '', '/523//company/update_user', '1505133367', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/SalesRep/', 'Updating User '),
(353, '9d444559a07cada80d57ffe23cfb3cb50dbf682b', '', '/523//company/update_user', '1505133369', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/SalesRep/', 'Updating User '),
(354, '9d444559a07cada80d57ffe23cfb3cb50dbf682b', '', '/523//company/update_user', '1505133384', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/SalesRep/', 'Updating User '),
(355, '9d444559a07cada80d57ffe23cfb3cb50dbf682b', '', '/523//company/update_user', '1505133412', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/SalesRep/', 'Updating User '),
(356, '9d444559a07cada80d57ffe23cfb3cb50dbf682b', '', '/523//company/update_user', '1505133515', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/SalesRep/', 'Updating User '),
(357, 'd75395ac20028c20ee14fb82f979c2a1bdc35800', '', '/523/login/processlogin', '1505135737', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/login', 'Login'),
(358, 'd62be414b419e6b905c06b646f8f76da2778fd2d', '', '/523/login/processlogin', '1505282589', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(359, 'd62be414b419e6b905c06b646f8f76da2778fd2d', '', '/523/login/logout', '1505282951', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/commission', 'Logout'),
(360, 'fa9d12cd487310fd6aa2894dd0d0f191039efc35', '', '/523/login/processlogin', '1505296668', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(361, 'fa9d12cd487310fd6aa2894dd0d0f191039efc35', '', '/523/login/logout', '1505297128', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/commission', 'Logout'),
(362, 'eae4fe267437bf79fa8fb030b8e7a997094d79dc', '', '/523/login/processlogin', '1505299394', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(363, 'eae4fe267437bf79fa8fb030b8e7a997094d79dc', '', '/523/login/logout', '1505299651', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/commission', 'Logout'),
(364, '8313248ef86a19368b7aeac6665960122eab5435', '', '/523/login/processlogin', '1505305703', '59.99.84.237', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(365, '316d5f353314c3b976240bbae896c3b76ba435d0', '', '/523/login/processlogin', '1505305841', '59.99.84.237', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/login', 'Login'),
(366, '37669c5b0df81bb8c23055bf8e28b6f8a7ab89b6', '', '/523/login/processlogin', '1505305999', '59.99.84.237', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:55.0) Gecko/20100101 Firefox/55.0', 'http://stallioni.in/523/login', 'Login'),
(367, '1eba40e0d24e38826aacf0cc6c7dbca73ea6d611', '', '/523/login/processlogin', '1505307132', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/login', 'Login'),
(368, '1505310799', '', '/523/login/logout', '1505310799', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/commission', 'Logout');
INSERT INTO `usertracking` (`id`, `session_id`, `user_identifier`, `request_uri`, `timestamp`, `client_ip`, `client_user_agent`, `referer_page`, `message`) VALUES
(369, '5663e9e173caa7274077814f810588a30f9809ac', '', '/523/login/processlogin', '1505357549', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/login', 'Login'),
(370, '5663e9e173caa7274077814f810588a30f9809ac', '', '/523//user/create_new_user', '1505357685', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/user/create', 'New  user create'),
(371, '5663e9e173caa7274077814f810588a30f9809ac', '', '/523/useractivity', '1505357976', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/user/create_user_level', 'Viewing User Activity List'),
(372, '62da561a081cdf311a97dd105ada9231a1a77d32', '', '/523/login/processlogin', '1505386656', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(373, '62da561a081cdf311a97dd105ada9231a1a77d32', '', '/523/login/processlogin', '1505386657', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(374, 'e8b41cea7cd640252a2f2f56e3a487c0f3c0f146', '', '/523/login/processlogin', '1505388829', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/login', 'Login'),
(375, 'e8b41cea7cd640252a2f2f56e3a487c0f3c0f146', '', '/523/login/logout', '1505389063', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/commission', 'Logout'),
(376, '0b272de064845dcd7e1481f25e5c8e801389c39e', '', '/523/login/processlogin', '1505389067', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/login', 'Login'),
(377, '0b272de064845dcd7e1481f25e5c8e801389c39e', '', '/523/useractivity', '1505389436', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/user/user_access', 'Viewing User Activity List'),
(378, '0b272de064845dcd7e1481f25e5c8e801389c39e', '', '/523/useractivity/view/2', '1505389455', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/useractivity', 'Viewing User Activity'),
(379, '0b272de064845dcd7e1481f25e5c8e801389c39e', '', '/523/useractivity/view/favicon.ico', '1505389456', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/useractivity/view/2', 'Viewing User Activity'),
(380, '0b272de064845dcd7e1481f25e5c8e801389c39e', '', '/523/useractivity', '1505389472', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/useractivity/view/2', 'Viewing User Activity List'),
(381, '0b272de064845dcd7e1481f25e5c8e801389c39e', '', '/523/useractivity/view/2', '1505389488', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/useractivity', 'Viewing User Activity'),
(382, '0b272de064845dcd7e1481f25e5c8e801389c39e', '', '/523/useractivity', '1505389498', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/useractivity/view/2', 'Viewing User Activity List'),
(383, '0b272de064845dcd7e1481f25e5c8e801389c39e', '', '/523/useractivity/view/17', '1505389503', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/useractivity', 'Viewing User Activity'),
(384, '0b272de064845dcd7e1481f25e5c8e801389c39e', '', '/523/useractivity', '1505389513', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/useractivity/view/17', 'Viewing User Activity List'),
(385, '0b272de064845dcd7e1481f25e5c8e801389c39e', '', '/523//company/update_user', '1505389911', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/SalesRep/', 'Updating User '),
(386, '94719f6b1882818ed1dc4221bf7887075e14d6a3', '', '/523/login/processlogin', '1505395421', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(387, '94719f6b1882818ed1dc4221bf7887075e14d6a3', '', '/523/login/logout', '1505395834', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/commission', 'Logout'),
(388, '4cafd6b9b76b210f00e47b7faf1de6f9fb6e9f86', '', '/523/login/processlogin', '1505400245', '107.77.85.113', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/login', 'Login'),
(389, '68ca6c296088e464b25d4836b938ce2b7e92ddc4', '', '/523/login/processlogin', '1505449440', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(390, '68ca6c296088e464b25d4836b938ce2b7e92ddc4', '', '/523/useractivity', '1505449464', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/user/user_level', 'Viewing User Activity List'),
(391, '68ca6c296088e464b25d4836b938ce2b7e92ddc4', '', '/523/useractivity', '1505449805', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/user/user_level', 'Viewing User Activity List'),
(392, '68ca6c296088e464b25d4836b938ce2b7e92ddc4', '', '/523/login/logout', '1505456752', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/dashboard', 'Logout'),
(393, '1736cb3c7111dd423d1a789ba58106dd117e5a23', '', '/523/login/processlogin', '1505457354', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/login', 'Login'),
(394, '1736cb3c7111dd423d1a789ba58106dd117e5a23', '', '/523/login/logout', '1505457386', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice/edit/21', 'Logout'),
(395, 'b9a38d1d08c0836a48b56be5998ca57c73c32489', '', '/523/login/processlogin', '1505457566', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(396, '11fa969c7ab6a690493d30b444427f7eb11a324d', '', '/523/login/processlogin', '1505460769', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(397, 'c7df44d41df194103f0862e7be8ad9391afdb6b2', '', '/523/login/processlogin', '1505471530', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(398, 'a9b82b81cfbfdcea31e277e6a9dad55e39a6856f', '', '/523/login/processlogin', '1505481113', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'http://stallioni.in/523/login', 'Login'),
(399, 'f5fe6cb8e6ed796c6fc5d7e18a00a8066e856e83', '', '/523/login/processlogin', '1505482279', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/login', 'Login'),
(400, 'b25dab0290156c17b2d01d11d911671a974739e9', '', '/523/login/processlogin', '1505501948', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/login', 'Login'),
(401, '7d6a549ed3dc74b694460247a88592f6e4e469c8', '', '/523/login/processlogin', '1505533928', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(402, '7d6a549ed3dc74b694460247a88592f6e4e469c8', '', '/523/login/logout', '1505534571', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/company/view/4', 'Logout'),
(403, '213049bc17c511362bcf0035da962dea982026a9', '', '/523/login/processlogin', '1505535558', '203.223.190.107', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:55.0) Gecko/20100101 Firefox/55.0', 'http://stallioni.in/523/', 'Login'),
(404, '7e8a70a7aeaec0244a8e296365fc669d562a5ee8', '', '/523/login/processlogin', '1505536459', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(405, '7e8a70a7aeaec0244a8e296365fc669d562a5ee8', '', '/523/login/logout', '1505537399', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice/edit/21', 'Logout'),
(406, '6595e39ef2f3619c8da2232b5a95f93bc205e147', '', '/523/login/processlogin', '1505540046', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(407, '35b1179529001f61edebbe86865c238c1b0b8f8e', '', '/523/login/processlogin', '1505566049', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(408, '92e2a4c760f098d9f85585e00dac422fde450de2', '', '/523/login/processlogin', '1505566709', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/login', 'Login'),
(409, 'd5e4dc3359ef4751718b12b6adf82319fadad024', '', '/523/login/processlogin', '1505567037', '107.77.111.46', 'Mozilla/5.0 (iPhone; CPU iPhone OS 10_3_3 like Mac OS X) AppleWebKit/603.3.8 (KHTML, like Gecko) Mobile/14G60', 'http://stallioni.in/523/login', 'Login'),
(410, 'e85a66d8871cccb274dfe2ada2a2eab9d33a2e95', '', '/523/login/processlogin', '1505706483', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(411, '1505709414', '', '/523/login/logout', '1505709414', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice/edit/21', 'Logout'),
(412, '558c1b1162d5a993ad4bd0fdd394dcc673dd602d', '', '/523/login/processlogin', '1505714560', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(413, '0cc676a317aba439dab663d1e7c6d6b32f6aa4a1', '', '/523/login/processlogin', '1505730875', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(414, 'be44c8ba871d790b69f36c209dc36ecf24e46fe0', '', '/523/login/processlogin', '1505739838', '203.223.190.107', 'Mozilla/5.0 (Linux; Android 6.0.1; SM-J700F Build/MMB29K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.116 Mobile Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(415, '127b31062c605a59b92755d326bb4c35bad23b25', '', '/523/login/processlogin', '1505740763', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/login', 'Login'),
(416, '71409083ad33acbc7885ece7d3191f51d6b139fc', '', '/523/login/processlogin', '1505741530', '107.77.87.45', 'Mozilla/5.0 (iPhone; CPU iPhone OS 10_3_3 like Mac OS X) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.0 Mobile/14G60 Safari/602.1', 'http://stallioni.in/523/login', 'Login'),
(417, '127b31062c605a59b92755d326bb4c35bad23b25', '', '/523//company/update_user', '1505741890', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/SalesRep/', 'Updating User '),
(418, '127b31062c605a59b92755d326bb4c35bad23b25', '', '/523//company/update_user', '1505741905', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/SalesRep/', 'Updating User '),
(419, '127b31062c605a59b92755d326bb4c35bad23b25', '', '/523//company/update_user', '1505741920', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/SalesRep/', 'Updating User '),
(420, '127b31062c605a59b92755d326bb4c35bad23b25', '', '/523//company/update_user', '1505741931', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/SalesRep/', 'Updating User '),
(421, '127b31062c605a59b92755d326bb4c35bad23b25', '', '/523//company/update_user', '1505741945', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/SalesRep/', 'Updating User '),
(422, '127b31062c605a59b92755d326bb4c35bad23b25', '', '/523//company/update_user', '1505741960', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/SalesRep/', 'Updating User '),
(423, '127b31062c605a59b92755d326bb4c35bad23b25', '', '/523//company/update_user', '1505742010', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/SalesRep/', 'Updating User '),
(424, '127b31062c605a59b92755d326bb4c35bad23b25', '', '/523//company/update_user', '1505742025', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/SalesRep/', 'Updating User '),
(425, '127b31062c605a59b92755d326bb4c35bad23b25', '', '/523//company/update_user', '1505742055', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/SalesRep/', 'Updating User '),
(426, 'b9f2fb7861cb6b1679ff6f7610103df93848bed3', '', '/523/login/processlogin', '1505742122', '59.99.84.253', 'Mozilla/5.0 (iPad; CPU OS 10_3_3 like Mac OS X) AppleWebKit/603.1.30 (KHTML, like Gecko) CriOS/60.0.3112.89 Mobile/14G60 Safari/602.1', 'http://stallioni.in/523/', 'Login'),
(427, '0cc676a317aba439dab663d1e7c6d6b32f6aa4a1', '', '/523/login/logout', '1505742653', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice', 'Logout'),
(428, 'b39c16d69e7310f76701571a55b1c6295bbd19fb', '', '/523/login/processlogin', '1505794561', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/login', 'Login'),
(429, 'd5a3880a46979008f3a5d2c2f2118b3d2e2f0b44', '', '/523/login/processlogin', '1505814064', '203.223.190.107', 'Mozilla/5.0 (Linux; Android 6.0.1; SM-J700F Build/MMB29K; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/60.0.3112.116 Mobile Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(430, 'd5a3880a46979008f3a5d2c2f2118b3d2e2f0b44', '', '/523/login/logout', '1505814092', '203.223.190.107', 'Mozilla/5.0 (Linux; Android 6.0.1; SM-J700F Build/MMB29K; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/60.0.3112.116 Mobile Safari/537.36', 'http://stallioni.in/523/dashboard', 'Logout'),
(431, 'd5a3880a46979008f3a5d2c2f2118b3d2e2f0b44', '', '/523/login/processlogin', '1505814132', '203.223.190.107', 'Mozilla/5.0 (Linux; Android 6.0.1; SM-J700F Build/MMB29K; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/60.0.3112.116 Mobile Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(432, 'd5a3880a46979008f3a5d2c2f2118b3d2e2f0b44', '', '/523/login/logout', '1505814557', '203.223.190.107', 'Mozilla/5.0 (Linux; Android 6.0.1; SM-J700F Build/MMB29K; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/60.0.3112.116 Mobile Safari/537.36', 'http://stallioni.in/523/dashboard', 'Logout'),
(433, '5ef67865f569fe16f2cdbb53e1c51d3585d5080b', '', '/523/login/processlogin', '1505814898', '203.223.190.107', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:55.0) Gecko/20100101 Firefox/55.0', 'http://www.appsgeyser.com/widget_preview/widget/5662196/6442296/', 'Login'),
(434, '5ef67865f569fe16f2cdbb53e1c51d3585d5080b', '', '/523/login/processlogin', '1505814924', '203.223.190.107', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:55.0) Gecko/20100101 Firefox/55.0', 'http://www.appsgeyser.com/widget_preview/widget/5662196/6442296/', 'Login'),
(435, '8bcafeb6fa672787bf17ffbe7163574ce8034560', '', '/523/login/processlogin', '1505816349', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(436, '8bcafeb6fa672787bf17ffbe7163574ce8034560', '', '/523/login/logout', '1505816391', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice', 'Logout'),
(437, 'c1e6544b337ba4a1b8927f0934def6b63c222360', '', '/523/login/processlogin', '1505816704', '59.99.84.210', 'Mozilla/5.0 (iPad; CPU OS 10_3_3 like Mac OS X) AppleWebKit/603.1.30 (KHTML, like Gecko) CriOS/60.0.3112.89 Mobile/14G60 Safari/602.1', 'http://stallioni.in/523/login', 'Login'),
(438, '9fbb685f6f8d617b7d1c6aa3e41cbe72d4c005d1', '', '/523/login/processlogin', '1505817813', '59.99.84.210', 'Mozilla/5.0 (iPad; CPU OS 10_3_3 like Mac OS X) AppleWebKit/603.1.30 (KHTML, like Gecko) CriOS/60.0.3112.89 Mobile/14G60 Safari/602.1', 'http://stallioni.in/523/login', 'Login'),
(439, 'f3c4e1269ab0951532cf8327fb408d1f44006bfb', '', '/523/login/processlogin', '1505818578', '59.99.84.210', 'Mozilla/5.0 (iPad; CPU OS 10_3_3 like Mac OS X) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.0 Mobile/14G60 Safari/602.1', 'http://stallioni.in/523/', 'Login'),
(440, '7fe13701ca4ae56cc893af1517cb030aa06865c2', '', '/523/login/processlogin', '1505819751', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(441, '7fe13701ca4ae56cc893af1517cb030aa06865c2', '', '/523/invoice/PDF/23?action=email', '1505820684', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice/view/23?action=view', 'Mail Send To kesav<kesav.stallioni@gmail.com> Subject :test'),
(442, '7fe13701ca4ae56cc893af1517cb030aa06865c2', '', '/523/invoice/send_email', '1505824170', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice/view/23?action=view', 'Mail Send To kesav.stallioni@gmail.com Subject :test message'),
(443, '7fe13701ca4ae56cc893af1517cb030aa06865c2', '', '/523/invoice/send_email', '1505824170', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice/view/23?action=view', 'Mail Send To kesav@stallioni.com Subject :test message'),
(444, '7fe13701ca4ae56cc893af1517cb030aa06865c2', '', '/523/invoice/send_email', '1505824444', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice/view/23?action=view', 'Mail Send To kesav.stallioni@gmail.com Subject :test message'),
(445, '7fe13701ca4ae56cc893af1517cb030aa06865c2', '', '/523/invoice/send_email', '1505824444', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice/view/23?action=view', 'Mail Send To kesav@stallioni.com Subject :test message'),
(446, '7fe13701ca4ae56cc893af1517cb030aa06865c2', '', '/523/invoice/send_email', '1505824446', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice/view/23?action=view', 'Mail Send To kesav.stallioni@gmail.com Subject :test message'),
(447, '7fe13701ca4ae56cc893af1517cb030aa06865c2', '', '/523/invoice/send_email', '1505824446', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice/view/23?action=view', 'Mail Send To kesav@stallioni.com Subject :test message'),
(448, '7fe13701ca4ae56cc893af1517cb030aa06865c2', '', '/523/invoice/send_email', '1505824449', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice/view/23?action=view', 'Mail Send To kesav.stallioni@gmail.com Subject :test message'),
(449, '7fe13701ca4ae56cc893af1517cb030aa06865c2', '', '/523/invoice/send_email', '1505824449', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice/view/23?action=view', 'Mail Send To kesav@stallioni.com Subject :test message'),
(450, '7fe13701ca4ae56cc893af1517cb030aa06865c2', '', '/523/invoice/send_email', '1505824451', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice/view/23?action=view', 'Mail Send To kesav.stallioni@gmail.com Subject :test message'),
(451, '7fe13701ca4ae56cc893af1517cb030aa06865c2', '', '/523/invoice/send_email', '1505824451', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice/view/23?action=view', 'Mail Send To kesav@stallioni.com Subject :test message'),
(452, '7fe13701ca4ae56cc893af1517cb030aa06865c2', '', '/523/invoice/send_email', '1505824454', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice/view/23?action=view', 'Mail Send To kesav.stallioni@gmail.com Subject :test message'),
(453, '7fe13701ca4ae56cc893af1517cb030aa06865c2', '', '/523/invoice/send_email', '1505824454', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice/view/23?action=view', 'Mail Send To kesav@stallioni.com Subject :test message'),
(454, '7fe13701ca4ae56cc893af1517cb030aa06865c2', '', '/523/invoice/send_email', '1505824456', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice/view/23?action=view', 'Mail Send To kesav.stallioni@gmail.com Subject :test message'),
(455, '7fe13701ca4ae56cc893af1517cb030aa06865c2', '', '/523/invoice/send_email', '1505824456', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice/view/23?action=view', 'Mail Send To kesav@stallioni.com Subject :test message'),
(456, '7fe13701ca4ae56cc893af1517cb030aa06865c2', '', '/523/invoice/send_email', '1505824458', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice/view/23?action=view', 'Mail Send To kesav.stallioni@gmail.com Subject :test message'),
(457, '7fe13701ca4ae56cc893af1517cb030aa06865c2', '', '/523/invoice/send_email', '1505824458', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice/view/23?action=view', 'Mail Send To kesav@stallioni.com Subject :test message'),
(458, '7fe13701ca4ae56cc893af1517cb030aa06865c2', '', '/523/invoice/send_email', '1505824466', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice/view/23?action=view', 'Mail Send To kesav.stallioni@gmail.com Subject :test message'),
(459, '7fe13701ca4ae56cc893af1517cb030aa06865c2', '', '/523/invoice/send_email', '1505824466', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice/view/23?action=view', 'Mail Send To kesav@stallioni.com Subject :test message'),
(460, '7fe13701ca4ae56cc893af1517cb030aa06865c2', '', '/523/invoice/send_email', '1505824474', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice/view/23?action=view', 'Mail Send To kesav.stallioni@gmail.com Subject :test message'),
(461, '7fe13701ca4ae56cc893af1517cb030aa06865c2', '', '/523/invoice/send_email', '1505824474', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice/view/23?action=view', 'Mail Send To kesav@stallioni.com Subject :test message'),
(462, '7fe13701ca4ae56cc893af1517cb030aa06865c2', '', '/523/invoice/send_email', '1505824486', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice/view/23?action=view', 'Mail Send To kesav.stallioni@gmail.com Subject :test message'),
(463, '7fe13701ca4ae56cc893af1517cb030aa06865c2', '', '/523/invoice/send_email', '1505824486', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice/view/23?action=view', 'Mail Send To kesav@stallioni.com Subject :test message'),
(464, '7fe13701ca4ae56cc893af1517cb030aa06865c2', '', '/523/invoice/send_email', '1505824488', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice/view/23?action=view', 'Mail Send To kesav.stallioni@gmail.com Subject :test message'),
(465, '7fe13701ca4ae56cc893af1517cb030aa06865c2', '', '/523/invoice/send_email', '1505824489', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice/view/23?action=view', 'Mail Send To kesav@stallioni.com Subject :test message'),
(466, '7fe13701ca4ae56cc893af1517cb030aa06865c2', '', '/523/invoice/send_email', '1505824491', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice/view/23?action=view', 'Mail Send To kesav.stallioni@gmail.com Subject :test message'),
(467, '7fe13701ca4ae56cc893af1517cb030aa06865c2', '', '/523/invoice/send_email', '1505824491', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice/view/23?action=view', 'Mail Send To kesav@stallioni.com Subject :test message'),
(468, '7fe13701ca4ae56cc893af1517cb030aa06865c2', '', '/523/invoice/send_email', '1505824493', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice/view/23?action=view', 'Mail Send To kesav.stallioni@gmail.com Subject :test message'),
(469, '7fe13701ca4ae56cc893af1517cb030aa06865c2', '', '/523/invoice/send_email', '1505824493', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice/view/23?action=view', 'Mail Send To kesav@stallioni.com Subject :test message'),
(470, '7fe13701ca4ae56cc893af1517cb030aa06865c2', '', '/523/invoice/send_email', '1505825014', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice/view/23?action=view', 'Mail Send To kesav.stallioni@gmail.com Subject :Test'),
(471, '7fe13701ca4ae56cc893af1517cb030aa06865c2', '', '/523/invoice/send_email', '1505825059', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice/view/23?action=view', 'Mail Send To kesav.stallioni@gmail.com Subject :Test'),
(472, '7fe13701ca4ae56cc893af1517cb030aa06865c2', '', '/523/invoice/send_email', '1505825077', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice/view/23?action=view', 'Mail Send To kesav.stallioni@gmail.com Subject :Test'),
(473, '7fe13701ca4ae56cc893af1517cb030aa06865c2', '', '/523/invoice/send_email', '1505825079', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice/view/23?action=view', 'Mail Send To kesav.stallioni@gmail.com Subject :Test'),
(474, '7fe13701ca4ae56cc893af1517cb030aa06865c2', '', '/523/invoice/send_email', '1505825082', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice/view/23?action=view', 'Mail Send To kesav.stallioni@gmail.com Subject :Test'),
(475, '7fe13701ca4ae56cc893af1517cb030aa06865c2', '', '/523/invoice/send_email', '1505825084', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice/view/23?action=view', 'Mail Send To kesav.stallioni@gmail.com Subject :Test'),
(476, '7fe13701ca4ae56cc893af1517cb030aa06865c2', '', '/523/invoice/send_email', '1505825086', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice/view/23?action=view', 'Mail Send To kesav.stallioni@gmail.com Subject :Test'),
(477, '7fe13701ca4ae56cc893af1517cb030aa06865c2', '', '/523/invoice/send_email', '1505825089', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice/view/23?action=view', 'Mail Send To kesav.stallioni@gmail.com Subject :Test'),
(478, '7fe13701ca4ae56cc893af1517cb030aa06865c2', '', '/523/invoice/send_email', '1505825091', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice/view/23?action=view', 'Mail Send To kesav.stallioni@gmail.com Subject :Test'),
(479, '7fe13701ca4ae56cc893af1517cb030aa06865c2', '', '/523/invoice/send_email', '1505825362', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice/view/23?action=view', 'Mail Send To kesav.stallioni@gmail.com Subject :test subjest'),
(480, '7fe13701ca4ae56cc893af1517cb030aa06865c2', '', '/523/invoice/send_email', '1505825476', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice/view/23?action=view', 'Mail Send To kesav.stallioni@gmail.com Subject :test message '),
(481, '7fe13701ca4ae56cc893af1517cb030aa06865c2', '', '/523/invoice/send_email', '1505825680', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice/view/23?action=view', 'Mail Send To kesav.stallioni@gmail.com Subject :Invoice - test Email'),
(482, '7fe13701ca4ae56cc893af1517cb030aa06865c2', '', '/523/invoice/send_email', '1505825772', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice/view/23?action=view', 'Mail Send To kesav.stallioni@gmail.com Subject :Test Subject Invoice'),
(483, '7fe13701ca4ae56cc893af1517cb030aa06865c2', '', '/523/invoice/send_email', '1505825773', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice/view/23?action=view', 'Mail Send To techhead.stallioni@gmail.com Subject :Test Subject Invoice'),
(484, '7fe13701ca4ae56cc893af1517cb030aa06865c2', '', '/523/invoice/send_email', '1505825835', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice/view/23?action=view', 'Mail Send To kesav.stallioni@gmail.com Subject :Test Subject Invoice'),
(485, 'e50021e8f6ab56c77ead1403171334322a275f60', '', '/523/login/processlogin', '1505837075', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/login', 'Login'),
(486, 'e50021e8f6ab56c77ead1403171334322a275f60', '', '/523/invoice/send_email', '1505837345', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/invoice/view/23?action=view', 'Mail Send To Purcellwa@gmail.com Subject :Test Email'),
(487, '56ffcdf9465416a6ee1026bd170d1f3eeb54f660', '', '/523/login/processlogin', '1505879668', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/login', 'Login'),
(488, '14588da8964df16a8337c95e9a05fa1f905fa47a', '', '/523/login/processlogin', '1505880413', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(489, '56ffcdf9465416a6ee1026bd170d1f3eeb54f660', '', '/523/useractivity', '1505880910', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/user', 'Viewing User Activity List'),
(490, '56ffcdf9465416a6ee1026bd170d1f3eeb54f660', '', '/523/useractivity/view/2', '1505880921', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/useractivity', 'Viewing User Activity'),
(491, '56ffcdf9465416a6ee1026bd170d1f3eeb54f660', '', '/523/useractivity/view/favicon.ico', '1505880922', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/useractivity/view/2', 'Viewing User Activity'),
(492, '56ffcdf9465416a6ee1026bd170d1f3eeb54f660', '', '/523/useractivity', '1505880928', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/user/user_level', 'Viewing User Activity List'),
(493, '94b7a279c2bec4437b5d7585bb51d8259aafe393', '', '/523/login/processlogin', '1505883988', '203.223.190.107', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/', 'Login'),
(494, '94b7a279c2bec4437b5d7585bb51d8259aafe393', '', '/523/login/logout', '1505884132', '203.223.190.107', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'http://stallioni.in/523/invoice', 'Logout'),
(495, 'ff2bfd4a621d6659ddd2f5a45883116dc46ce4c5', '', '/523/login/processlogin', '1505887979', '59.99.84.212', 'Mozilla/5.0 (iPad; CPU OS 10_3_3 like Mac OS X) AppleWebKit/603.1.30 (KHTML, like Gecko) CriOS/60.0.3112.89 Mobile/14G60 Safari/602.1', 'http://stallioni.in/523/login', 'Login'),
(496, '4ac90be6384cd77401daa894aeabb4c1cbcbb039', '', '/523/login/processlogin', '1505889127', '203.223.190.107', 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/51.0.2704.79 Chrome/51.0.2704.79 Safari/537.36', 'http://stallioni.in/523/login', 'Login'),
(497, '2bf9711a5cf09dd1f22b565572c1cb934b440fc7', '', '/523/login/processlogin', '1505891217', '203.223.190.107', 'Mozilla/5.0 (Linux; Android 6.0.1; SM-J700F Build/MMB29K; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/60.0.3112.116 Mobile Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(498, 'b31e09e0dadd248c46b57023de1d76b2ddedd959', '', '/523/login/processlogin', '1505898071', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(499, 'b31e09e0dadd248c46b57023de1d76b2ddedd959', '', '/523/invoice/send_email', '1505898095', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice/view/23?action=view', 'Mail Send To kesav.stallioni@gmail.com Subject :Test Invoice'),
(500, 'b31e09e0dadd248c46b57023de1d76b2ddedd959', '', '/523/invoice/send_email', '1505902077', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice/package/23?action=view', 'Mail Send To kesav.stallioni@gmail.com Subject :Test PackingSlip'),
(501, 'b31e09e0dadd248c46b57023de1d76b2ddedd959', '', '/523/invoice/send_email', '1505902289', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice/package/23?action=view', 'Mail Send To kesav.stallioni@gmail.com Subject :Test PackingSlip'),
(502, 'b31e09e0dadd248c46b57023de1d76b2ddedd959', '', '/523//user/update_user', '1505902789', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/user', 'Updating User '),
(503, 'b31e09e0dadd248c46b57023de1d76b2ddedd959', '', '/523/useractivity', '1505902865', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/user/user_level', 'Viewing User Activity List'),
(504, 'b31e09e0dadd248c46b57023de1d76b2ddedd959', '', '/523/useractivity/view/1', '1505902868', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/useractivity', 'Viewing User Activity'),
(505, 'b31e09e0dadd248c46b57023de1d76b2ddedd959', '', '/523/useractivity/view/favicon.ico', '1505902869', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/useractivity/view/1', 'Viewing User Activity'),
(506, 'b31e09e0dadd248c46b57023de1d76b2ddedd959', '', '/523/useractivity', '1505902870', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/user/user_level', 'Viewing User Activity List'),
(507, 'ac73dc28eab14f0562023b0fdc48c3f7eb219337', '16', '/523/login/processlogin', '1505913776', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(508, 'fcce95ce88e8cb81a1934350a699cccd62968b09', '16', '/523/login/processlogin', '1505913815', '203.223.190.107', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:55.0) Gecko/20100101 Firefox/55.0', 'http://www.stallioni.in/523/', 'Login'),
(509, 'ac73dc28eab14f0562023b0fdc48c3f7eb219337', '16', '/523/login/logout', '1505914284', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/commission', 'Logout'),
(510, 'eb5adc4a1a16015b0b766e870afa7a0cf680b64f', '16', '/523/login/processlogin', '1506060474', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(511, 'eb5adc4a1a16015b0b766e870afa7a0cf680b64f', '16', '/523/login/logout', '1506060650', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/company', 'Logout'),
(512, '143272a5fa93be71d6ac999b7265434b76955b34', '16', '/523/login/processlogin', '1506061896', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(513, '143272a5fa93be71d6ac999b7265434b76955b34', '16', '/523/login/logout', '1506063977', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/SalesRep/', 'Logout'),
(514, 'd4e05a80a5784a37a9c71fb65ffb98a7ca2ef7c7', '16', '/523/login/processlogin', '1506080985', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(515, 'd4e05a80a5784a37a9c71fb65ffb98a7ca2ef7c7', '16', '/523/login/logout', '1506081031', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/company', 'Logout'),
(516, 'e7de089aa8fd81d9ef3fda1dab77d308d6f3ccf9', '16', '/523/login/processlogin', '1506081561', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Safari/604.1.38', 'http://stallioni.in/523/login', 'Login'),
(517, '8e806e024b6a3813ad956a4c9ca7304990c4e2d0', '16', '/523/login/processlogin', '1506082043', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/login', 'Login'),
(518, 'e7de089aa8fd81d9ef3fda1dab77d308d6f3ccf9', '16', '/523/login/logout', '1506082958', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Safari/604.1.38', 'http://stallioni.in/523/SalesRep/', 'Logout'),
(519, 'ef1fe653985fc84750054c467390175642329e94', '16', '/523/login/processlogin', '1506083030', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Safari/604.1.38', 'http://stallioni.in/523/login', 'Login'),
(520, 'ef1fe653985fc84750054c467390175642329e94', '16', '/523/login/logout', '1506083879', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Safari/604.1.38', 'http://stallioni.in/523/SalesRep/', 'Logout'),
(521, '8e806e024b6a3813ad956a4c9ca7304990c4e2d0', '16', '/523/login/logout', '1506084282', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/company', 'Logout'),
(522, '5a5bd873b852341cbe08ff582c79267a9f041b12', '2', '/523/login/processlogin', '1506084294', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/login', 'Login'),
(523, 'daa16404d9cccd3474a25509e1c7f79ef6bd85db', '16', '/523/login/processlogin', '1506084304', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Safari/604.1.38', 'http://stallioni.in/523/login', 'Login'),
(524, 'daa16404d9cccd3474a25509e1c7f79ef6bd85db', '16', '/523/login/logout', '1506084854', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Safari/604.1.38', 'http://stallioni.in/523/SalesRep/', 'Logout'),
(525, '6dd1b1bed5926d832accb6374364adeb670a3ad2', '2', '/523/login/processlogin', '1506084866', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Safari/604.1.38', 'http://stallioni.in/523/login', 'Login'),
(526, '6dd1b1bed5926d832accb6374364adeb670a3ad2', '2', '/523/login/logout', '1506092572', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Safari/604.1.38', 'http://stallioni.in/523/SalesRep/', 'Logout'),
(527, 'b20022cd984838d162fa1c2dad163a9bb6bac573', '2', '/523/login/processlogin', '1506093215', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Safari/604.1.38', 'http://stallioni.in/523/login', 'Login'),
(528, '14b590dfb7edbcf930e1b9490c108d3fb24d02b2', '16', '/523/login/processlogin', '1506161064', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(529, '14b590dfb7edbcf930e1b9490c108d3fb24d02b2', '16', '/523//invoice/save', '1506168943', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice/create/2', 'Mail Send To kesav<kesav.stallioni@gmail.com> Subject :New Invoice Created For the Customer AND PO #30'),
(530, 'a7df208b275ecaab5a568cecbe45867445805eaa', '16', '/523/login/processlogin', '1506169188', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Safari/604.1.38', 'http://stallioni.in/523/login', 'Login'),
(531, '14b590dfb7edbcf930e1b9490c108d3fb24d02b2', '16', '/523//invoice/save', '1506169437', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice/create/2', 'Mail Send To kesav<kesav.stallioni@gmail.com> Subject :New Invoice Created For the Customer And PO #SG-004'),
(532, '14b590dfb7edbcf930e1b9490c108d3fb24d02b2', '16', '/523//invoice/save', '1506170257', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice/create/2', 'Mail Send To kesav<kesav.stallioni@gmail.com> Subject :New Invoice Created For the Customer And PO #SG-007'),
(533, '7f049883eed6e32b7242274c4071e0bd47c54290', '16', '/523/login/processlogin', '1506338107', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(534, '7f049883eed6e32b7242274c4071e0bd47c54290', '16', '/523//invoice/save', '1506338229', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice/create/2', 'Mail Send To kesav<kesav.stallioni@gmail.com> Subject :New Invoice Created For the Customer And PO #SG-789'),
(535, '7f049883eed6e32b7242274c4071e0bd47c54290', '16', '/523//invoice/save', '1506338692', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice/create/6', 'Mail Send To kesav<kesav.stallioni@gmail.com> Subject :New Invoice Created For the Customer And PO #WP-125');
INSERT INTO `usertracking` (`id`, `session_id`, `user_identifier`, `request_uri`, `timestamp`, `client_ip`, `client_user_agent`, `referer_page`, `message`) VALUES
(536, '7f049883eed6e32b7242274c4071e0bd47c54290', '16', '/523/login/logout', '1506341543', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/invoice', 'Logout'),
(537, 'e185ec15239a25febd30b62b0011ae8a6097ed2a', '18', '/523/login/processlogin', '1506393712', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Safari/604.1.38', 'http://stallioni.in/523/login', 'Login'),
(538, 'e185ec15239a25febd30b62b0011ae8a6097ed2a', '18', '/523/login/logout', '1506393759', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Safari/604.1.38', 'http://stallioni.in/523/company', 'Logout'),
(539, '02ca1197c09e30148e4e85d99df0dfea9537a86d', '17', '/523/login/processlogin', '1506393888', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Safari/604.1.38', 'http://stallioni.in/523/login', 'Login'),
(540, '02ca1197c09e30148e4e85d99df0dfea9537a86d', '17', '/523/login/logout', '1506394033', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Safari/604.1.38', 'http://stallioni.in/523/invoice/create/4', 'Logout'),
(541, '64fd2f25575361c32a193be59ac9ffdcf290217f', '18', '/523/login/processlogin', '1506394038', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Safari/604.1.38', 'http://stallioni.in/523/login', 'Login'),
(542, '64fd2f25575361c32a193be59ac9ffdcf290217f', '18', '/523/login/logout', '1506394041', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Safari/604.1.38', 'http://stallioni.in/523/dashboard', 'Logout'),
(543, 'dd12b2514fec6670359277f8bb447aad6a4c39d7', '16', '/523/login/processlogin', '1506394046', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Safari/604.1.38', 'http://stallioni.in/523/login', 'Login'),
(544, 'dd12b2514fec6670359277f8bb447aad6a4c39d7', '16', '/523/login/logout', '1506395043', '108.227.235.214', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Safari/604.1.38', 'http://stallioni.in/523/company/view/4', 'Logout'),
(545, '25993528b342292537d5007ab24932f7f650edba', '11', '/523/login/processlogin', '1506399469', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/', 'Login'),
(546, '25993528b342292537d5007ab24932f7f650edba', '11', '/523/login/logout', '1506399853', '203.223.190.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://stallioni.in/523/commission', 'Logout'),
(547, 'aovslgj4o2h8ei1542314kl3u54ugf1p', '11', '/523/login/processlogin', '1506578238', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/', 'Login'),
(548, 'des1hnqftdiefc3rd4c65cos84078v32', '16', '/523/login/processlogin', '1506659862', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/', 'Login'),
(549, 'ai9kb6e51hhdkv75vjdb1d3h63is6744', '16', '/523/login/processlogin', '1507002661', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/', 'Login'),
(550, 'ai9kb6e51hhdkv75vjdb1d3h63is6744', '16', '/523/login/logout', '1507003118', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/invoice', 'Logout'),
(551, 'a1902mtj6r8kfd7mn58mepf249c447ue', '16', '/523/login/processlogin', '1507003303', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/login', 'Login'),
(552, 'a1902mtj6r8kfd7mn58mepf249c447ue', '16', '/523/login/logout', '1507003447', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 'http://localhost/523/company/view/2', 'Logout');

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `id_user_address` int(11) NOT NULL,
  `pk_id_user` int(11) NOT NULL,
  `address_1` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `address_2` int(11) DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `counry` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_label` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `address_created_on` datetime DEFAULT NULL,
  `address_modified_on` datetime DEFAULT NULL,
  `address_status` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`id_user_address`, `pk_id_user`, `address_1`, `address_2`, `city`, `state`, `post_code`, `counry`, `phone_number`, `address_type`, `address_label`, `address_created_on`, `address_modified_on`, `address_status`) VALUES
(1, 2, '100 Bountry Street', NULL, 'Atlanda', 'AL', '65001', 'US', ' ', 'address_1', 'Address', '2017-09-18 08:40:55', '2017-09-21 01:51:17', 1),
(2, 3, '606-3727 Ullamcorper. Street', NULL, 'Roseville', 'NH', '11523', 'US', NULL, 'address_1', 'Address', '2017-09-18 08:38:40', NULL, 1),
(6, 11, 'test', NULL, 'test', 'test', '7878888', 'US', '(758) 585-8558', '', '', '2017-08-12 16:49:54', NULL, 1),
(7, 12, '711-2880 Nulla St. ', NULL, 'Mankato', 'MI', '96522', 'US', NULL, 'address_1', 'Office Address', '2017-09-18 08:40:25', '2017-08-29 06:18:38', 1),
(8, 12, '711-2880 Nulla Street', NULL, 'New York', 'KY', '55555', 'US', NULL, 'address_2', 'Home Address', '2017-09-18 08:40:25', '2017-08-29 06:18:51', 1),
(9, 3, 'Test', NULL, 'test', 'AR', '435436', 'US', NULL, 'address_2', 'Office Address', '2017-09-18 08:38:40', '2017-08-29 06:19:37', 1),
(10, 2, 'Test1', NULL, 'test', 'AL', '436436', 'US', ' ', 'address_2', 'Address', '2017-08-18 01:15:31', '2017-09-21 06:39:12', 1),
(11, 13, '44 Shirley Ave.  ', NULL, 'West Chicago', 'IL', '60185', 'US', NULL, 'address_1', 'Address', '2017-09-18 08:39:05', NULL, 1),
(12, 14, '7676 able road', NULL, 'Jonesville', 'OH', '34213', 'US', NULL, 'address_1', 'Address', '2017-09-18 08:39:20', NULL, 1),
(13, 15, '100 West Coast Road', NULL, 'Seattle', 'WA', '10000', 'US', NULL, 'address_1', 'Address', '2017-09-18 08:38:51', NULL, 1),
(14, 16, 'Test', NULL, 'test', 'KS', '532553', 'US', NULL, 'address_1', 'Address', '2017-09-18 08:38:25', NULL, 1),
(15, 17, '100 West test st', NULL, 'Rockville', 'AL', '46100', 'US', NULL, 'address_1', 'Address', '2017-09-18 08:40:10', NULL, 1),
(16, 18, '100 Test Rd', NULL, 'Test City', 'IN', '46123', 'US', '', 'address_1', 'Address', '2017-09-24 11:38:31', NULL, 1),
(17, 19, 'test', NULL, 'madurai', 'tamilnadu', '641653', 'IN', '(901) 325-3638', '', '', '2017-10-26 14:34:39', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_contact`
--

CREATE TABLE `user_contact` (
  `id_user_contact` int(11) NOT NULL,
  `pk_id_user` int(11) NOT NULL,
  `contact_type` int(11) NOT NULL,
  `contact_label` varchar(100) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `contact_created_on` datetime NOT NULL,
  `contact_modified_on` datetime DEFAULT NULL,
  `contact_status` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_contact`
--

INSERT INTO `user_contact` (`id_user_contact`, `pk_id_user`, `contact_type`, `contact_label`, `contact_number`, `contact_created_on`, `contact_modified_on`, `contact_status`) VALUES
(1, 2, 1, 'contact_0', '(441) 235-1878', '2017-08-19 02:27:15', '2017-09-18 08:40:55', 1),
(2, 12, 1, 'contact_0', '(543) 543-6436', '2017-08-19 02:27:48', '2017-09-18 08:40:25', 1),
(3, 3, 1, 'contact_0', '(366) 546-5465', '2017-08-19 02:27:59', '2017-09-18 08:38:40', 1),
(4, 12, 3, 'contact_1', '(346) 436-4364', '2017-08-19 02:28:32', '2017-09-18 08:40:25', 1),
(5, 13, 1, 'contact_0', '(345) 643-6436', '2017-08-19 05:23:15', '2017-09-18 08:39:05', 1),
(6, 14, 1, 'contact_0', '(321) 245-6789', '2017-08-23 09:15:11', '2017-09-18 08:39:20', 1),
(7, 15, 1, 'contact_0', '(311) 311-3111', '2017-08-26 09:26:50', '2017-09-18 08:38:51', 1),
(8, 16, 1, 'contact_0', '(325) 235-2352', '2017-08-30 00:22:22', '2017-09-18 08:38:25', 1),
(9, 17, 1, 'contact_0', '(216) 420-4949', '2017-09-18 08:40:10', NULL, 1),
(10, 18, 5, 'contact_0', '(317) 418-2929', '2017-09-24 11:38:31', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_levels`
--

CREATE TABLE `user_levels` (
  `id_user_levels` int(11) NOT NULL,
  `level_name` varchar(255) NOT NULL,
  `level_key` varchar(255) NOT NULL,
  `default` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1-Active,2-Delete'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_levels`
--

INSERT INTO `user_levels` (`id_user_levels`, `level_name`, `level_key`, `default`, `status`) VALUES
(1, 'Super Admin', 'superuser', 1, 1),
(2, 'Sales Representative', 'sales_rep', 1, 1),
(3, 'Accountant', 'accountant', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE `user_master` (
  `id_user_master` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `country_code` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `user_notes` text,
  `user_type` varchar(255) NOT NULL,
  `user_cust_code` varchar(255) DEFAULT NULL,
  `profile_image` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL,
  `update_on` datetime NOT NULL,
  `last_login_time` datetime NOT NULL,
  `last_logout_time` datetime NOT NULL,
  `otp` varchar(255) NOT NULL,
  `reset_pwd` varchar(255) NOT NULL,
  `blocked` int(11) NOT NULL DEFAULT '0' COMMENT '0-unblocked,1-blocked',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '0-Not Active,1- Active,2-Delete',
  `site_admin` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`id_user_master`, `first_name`, `last_name`, `username`, `email`, `password`, `country_code`, `phone`, `user_notes`, `user_type`, `user_cust_code`, `profile_image`, `created_on`, `update_on`, `last_login_time`, `last_logout_time`, `otp`, `reset_pwd`, `blocked`, `status`, `site_admin`) VALUES
(1, 'superuser', '', 'superuser', 'admin@stallioni.com', '8e67bb26b358e2ed20fe552ed6fb832f397a507d', '', '', NULL, 'superuser', '0000', '', '2017-08-12 00:00:00', '2017-08-12 00:00:00', '2017-11-25 18:15:11', '2017-11-25 18:14:54', '', '', 0, 1, 0),
(2, 'Warren', 'price', 'warren', 'WarrenP@gmail.com', 'a28619226c54212765dc15864ceee11ed0278250', NULL, NULL, '', 'sales_rep', 'WP3', '', '2017-08-12 14:42:36', '2017-09-18 08:40:55', '2017-09-22 10:13:35', '2017-09-22 10:02:52', '', '', 0, 1, 0),
(3, 'Ram', 'kumar', 'ram', 'ram@stallioni.com', '6a660357993859347877bfe7399d962626fe352e', NULL, NULL, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\n', 'sales_rep', 'RK2', '', '2017-08-12 16:00:57', '2017-09-18 08:38:40', '2017-09-08 07:21:10', '2017-09-08 07:26:30', '', '', 0, 1, 0),
(11, 'kesavamoorthi', 'm', 'kesav', 'kesav@stallioni.com', '9309035ac3107c61b7c07e3587003f9e1003c3a0', NULL, '(758) 585-8558', NULL, 'accountant', '1', '', '2017-08-12 16:12:27', '2017-09-25 23:08:49', '2017-09-28 11:27:19', '2017-09-25 23:24:13', '', 'ExTGwnalQ8', 0, 1, 0),
(12, 'karthigesh', 'G', 'karthigesh', 'karthigesh@stallioni.com', 'bffbe3aec5a29b11984acdd3ac7e6ac1559154cf', NULL, '(643) 643-6436', '', 'sales_rep', '1', '', '2017-08-12 18:43:13', '2017-09-20 05:19:49', '2017-08-12 18:51:26', '2017-08-12 18:51:47', '', '', 0, 1, 0),
(13, 'Neil', 'P', 'Neil', 'NeilP@airfeet.com', 'c7c3ef52119e55790b7dd5b1603c355338efe6f0', NULL, NULL, '<h2>Standard rep.&nbsp;</h2>\n', 'sales_rep', 'NP4', '', '2017-08-19 05:23:15', '2017-09-18 08:39:05', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 0, 1, 0),
(14, 'Paul ', 'Johns', 'PJ123', 'pj@gmail.com', '100c4e57374fc998e57164d4c0453bd3a4876a58', NULL, NULL, '<p>New worker in Ohio district.&nbsp;</p>\n', 'sales_rep', 'PJ5', '', '2017-08-23 09:15:11', '2017-09-18 08:39:20', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 0, 1, 0),
(15, 'Kurt', 'McFad', 'Kurt', 'KurtM@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL, NULL, '<p>New rep on West Coast - Testing Program</p>\n', 'sales_rep', 'KM6', '', '2017-08-26 09:26:50', '2017-09-18 08:38:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 0, 1, 0),
(16, 'Subash', 'G', 'subash', 'subash@stallioni.com', '20529d6cf1d9e49f128731da1cf721982775c567', NULL, NULL, '<p>Subash Info</p>\n', 'sales_rep', 'SU1', '', '2017-08-30 00:22:22', '2017-09-18 08:38:25', '2017-10-03 09:31:43', '2017-10-03 09:34:07', '', '', 0, 1, 0),
(17, 'Warren ', 'Patrick', 'WPatrick', 'purcellwa@gmail.com', 'cbb7353e6d953ef360baf960c122346276c6e320', NULL, NULL, '', 'sales_rep', 'WP2', '', '2017-09-13 21:54:45', '2017-09-18 08:40:10', '2017-09-25 21:44:48', '2017-09-25 21:47:13', '', '', 0, 1, 0),
(18, 'WP', 'WP Surname', 'WPtestRep', 'wayne@myairfeet.com', '22e067a920e39db4d3c796edefce11898fac5762', NULL, '', '', 'sales_rep', 'WP Test Rep', '', '2017-09-24 11:38:31', '0000-00-00 00:00:00', '2017-09-25 21:47:18', '2017-09-25 21:47:21', '', '', 0, 1, 0),
(19, 'mari', 'maju', 'marimaju', 'mari@stallioni.com', '4e1d3c18297a7a77f67198fa4f174663f8973855', NULL, '(901) 325-3638', NULL, 'sales_rep', '1', '', '2017-10-26 14:34:39', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_privileges`
--

CREATE TABLE `user_privileges` (
  `id_user_privileges` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `user_type_key` varchar(255) NOT NULL,
  `id_privileges` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_privileges`
--

INSERT INTO `user_privileges` (`id_user_privileges`, `id_user`, `user_type_key`, `id_privileges`) VALUES
(1, 1, 'sales_rep', 4),
(2, 1, 'sales_rep', 5),
(3, 1, 'sales_rep', 7),
(4, 1, 'sales_rep', 10),
(9, 3, 'sales_rep', 4),
(10, 3, 'sales_rep', 7),
(11, 3, 'sales_rep', 10),
(12, 12, 'sales_rep', 4),
(13, 12, 'sales_rep', 5),
(14, 12, 'sales_rep', 7),
(15, 12, 'sales_rep', 10),
(16, 12, 'sales_rep', 15),
(17, 14, 'sales_rep', 4),
(18, 14, 'sales_rep', 5),
(19, 14, 'sales_rep', 7),
(20, 14, 'sales_rep', 10),
(21, 15, 'sales_rep', 4),
(22, 15, 'sales_rep', 5),
(23, 15, 'sales_rep', 7),
(24, 15, 'sales_rep', 10),
(25, 16, 'sales_rep', 4),
(26, 16, 'sales_rep', 5),
(27, 16, 'sales_rep', 7),
(28, 16, 'sales_rep', 10),
(29, 17, 'sales_rep', 4),
(30, 17, 'sales_rep', 5),
(31, 17, 'sales_rep', 7),
(32, 17, 'sales_rep', 10),
(37, 2, 'sales_rep', 4),
(38, 2, 'sales_rep', 5),
(39, 2, 'sales_rep', 7),
(40, 2, 'sales_rep', 10),
(41, 11, 'accountant', 4),
(42, 11, 'accountant', 5),
(43, 11, 'accountant', 7),
(44, 11, 'accountant', 10),
(45, 11, 'accountant', 15),
(46, 11, 'accountant', 0),
(47, 11, 'accountant', 0),
(48, 19, 'sales_rep', 4),
(49, 19, 'sales_rep', 5),
(50, 19, 'sales_rep', 7),
(51, 19, 'sales_rep', 10),
(52, 19, 'sales_rep', 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `usertracking`
--
ALTER TABLE `usertracking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`id_user_address`);

--
-- Indexes for table `user_contact`
--
ALTER TABLE `user_contact`
  ADD PRIMARY KEY (`id_user_contact`);

--
-- Indexes for table `user_levels`
--
ALTER TABLE `user_levels`
  ADD PRIMARY KEY (`id_user_levels`),
  ADD UNIQUE KEY `level_key` (`level_key`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
  ADD PRIMARY KEY (`id_user_master`),
  ADD UNIQUE KEY `username` (`username`,`email`);

--
-- Indexes for table `user_privileges`
--
ALTER TABLE `user_privileges`
  ADD PRIMARY KEY (`id_user_privileges`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usertracking`
--
ALTER TABLE `usertracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=553;
--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id_user_address` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `user_contact`
--
ALTER TABLE `user_contact`
  MODIFY `id_user_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user_levels`
--
ALTER TABLE `user_levels`
  MODIFY `id_user_levels` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `id_user_master` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `user_privileges`
--
ALTER TABLE `user_privileges`
  MODIFY `id_user_privileges` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
