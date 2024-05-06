-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2024 at 05:10 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `commerce and connect`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `pass`) VALUES
(1, 'Admin', 'thorgshare');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(200) NOT NULL,
  `name` varchar(100) NOT NULL,
  `prod_name` varchar(100) NOT NULL,
  `quantity` varchar(1000) NOT NULL DEFAULT '1',
  `uploader` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `id` int(20) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `username` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat_messages`
--

INSERT INTO `chat_messages` (`id`, `message`, `timestamp`, `username`) VALUES
(8, 'hi', '2024-03-01 09:19:32', 'Galib'),
(9, 'hello', '2024-03-01 09:19:39', 'Asadullah'),
(14, 'hello', '2024-03-01 18:14:15', 'Galib'),
(15, 'hello', '2024-03-03 16:10:03', 'Asadullah');

-- --------------------------------------------------------

--
-- Table structure for table `clubs_member`
--

CREATE TABLE `clubs_member` (
  `serial` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Department` varchar(100) NOT NULL,
  `Batch` varchar(100) NOT NULL,
  `Id` int(100) NOT NULL,
  `Position` varchar(255) NOT NULL,
  `clubs` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clubs_member`
--

INSERT INTO `clubs_member` (`serial`, `Name`, `Department`, `Batch`, `Id`, `Position`, `clubs`) VALUES
(7, 'Nayem', 'CSE', '53', 2012020036, 'Treasurer', 'LUCC'),
(13, 'Asadullah', 'President', '53', 2012020303, 'President', 'GSHARE');

-- --------------------------------------------------------

--
-- Table structure for table `community_forum_general`
--

CREATE TABLE `community_forum_general` (
  `id` int(20) NOT NULL,
  `post_title` varchar(800) NOT NULL,
  `description` varchar(800) NOT NULL,
  `link` varchar(300) NOT NULL,
  `uploader` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `community_forum_general`
--

INSERT INTO `community_forum_general` (`id`, `post_title`, `description`, `link`, `uploader`) VALUES
(3, 'Git & Github', 'Git Bangla tutorial: ভার্সন কন্ট্রোল (Version control) এর জন্য গিট একটি জরুরি সফটওয়ার। গিট এবং গিটহাব (Git and GitHub) বড় আকারে টিমওয়ার্ক করার জন্য খুবই জরুরি সংযোজন। একইসাথে অসংখ্য ওপেন-সোর্স প্রজেক্টে কাজ করার জন্য একটি মাধ্যম গিট এবং গিটহাব। তাই বর্তমানে টিমওয়ার্ক করার জন্য গিট এবং গিটহাবে নিজেকে অভ্যস্ত করা খুবই জরুরি। তাই গিট এবং গিটহাব নিয়ে একটি সংক্ষিপ্ত আকারে লিখার চেষ্টা করেছি।\r\n', 'https://docs.google.com/document/d/1A26lqNadMdUv2D3UFt5yZ35qBJIY7UAhv8nBov_jFGg/edit', 'Admin'),
(19, 'Gemini AI', 'AI has been the focus of my life\\\'s work, as for many of my research colleagues. Ever since programming AI for computer games as a teenager, and throughout my years as a neuroscience researcher trying to understand the workings of the brain, I’ve always believed that if we could build smarter machines, we could harness them to benefit humanity in incredible ways.', 'https://blog.google/technology/ai/google-gemini-ai/#introducing-gemini', 'Galib');

-- --------------------------------------------------------

--
-- Table structure for table `community_forum_programming`
--

CREATE TABLE `community_forum_programming` (
  `id` int(20) NOT NULL,
  `post_title` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `link` varchar(200) NOT NULL,
  `uploader` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `community_forum_programming`
--

INSERT INTO `community_forum_programming` (`id`, `post_title`, `description`, `link`, `uploader`) VALUES
(7, 'What is Flutter', 'Flutter is an open source framework by Google for building beautiful, natively compiled, multi-platform applications from a single codebase.', 'https://flutter.dev/', 'admin'),
(8, 'How to Become a Mobile App Developer?', 'The mobile app development industry is a competitive environment and it is a competitive market that is only continuing to grow. With the availability of low-cost and easy-to-use development tools, as', 'https://www.simplilearn.com/building-career-in-mobile-app-development-article', 'Galib');

-- --------------------------------------------------------

--
-- Table structure for table `community_forum_tech`
--

CREATE TABLE `community_forum_tech` (
  `id` int(20) NOT NULL,
  `post_title` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `link` varchar(200) NOT NULL,
  `uploader` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `community_forum_tech`
--

INSERT INTO `community_forum_tech` (`id`, `post_title`, `description`, `link`, `uploader`) VALUES
(10, 'Apple Vision Pro', 'With Apple Vision Pro, you have an infinite canvas that transforms how you use the apps you love. Arrange apps anywhere and scale them to the perfect size, making the workspace of your dreams a realit', 'https://www.apple.com/apple-vision-pro/', 'admin'),
(11, 'What is generative AI?', 'Generative AI is a type of artificial intelligence technology that can produce various types of content, including text, imagery, audio and synthetic data. The recent buzz around generative AI has bee', 'https://www.techtarget.com/searchenterpriseai/definition/generative-AI', 'Galib');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(255) NOT NULL,
  `username` varchar(1000) NOT NULL,
  `subject` varchar(1000) NOT NULL,
  `messages` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `username`, `subject`, `messages`) VALUES
(1, 'admin', 'Testing entry', 'Sucesfully entered'),
(2, 'admin', 'Testing entry 2', 'Sucesfully entered 2nd time');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `Filename` varchar(200) NOT NULL,
  `file` varchar(200) NOT NULL,
  `CourseTeacher` varchar(200) NOT NULL,
  `CourseTitle` varchar(200) NOT NULL,
  `CourseName` varchar(200) NOT NULL,
  `uploader` varchar(200) NOT NULL,
  `id` int(11) NOT NULL,
  `isApprove` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`Filename`, `file`, `CourseTeacher`, `CourseTitle`, `CourseName`, `uploader`, `id`, `isApprove`) VALUES
('machine learning ex-1', 'ex1.pdf', 'SKB', 'CSE-4111', 'Machine Learning', 'Galib', 56, 1),
('Os chapter 3', 'OS_Chapter 3.pdf', 'SRK', 'CSE-3319', 'Operating System', 'Galib', 57, 1),
('Os Chapter 9', 'OS_Chapter 9.pdf', 'SRK', 'CSE-4212', 'Operating System', 'Asadullah', 58, 1),
('SWE lecture 1', 'Lecture_1.pdf', 'AHQ', 'CSE-3319', 'Software Engineering ', 'Galib', 59, 1),
('Data Communication And Networking', 'Data Communications and Networking 4th Edition.pdf', 'AHQ', 'CSE-3319', 'Computer Networks', 'Asadullah', 60, 1);

-- --------------------------------------------------------

--
-- Table structure for table `material_request`
--

CREATE TABLE `material_request` (
  `id` int(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `topic` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `material_request`
--

INSERT INTO `material_request` (`id`, `name`, `topic`, `username`) VALUES
(7, 'Data structure', 'Linked list', 'Galib'),
(8, 'Algorithm and complexity', 'Coin change', 'Galib'),
(9, 'Algorithm and complexity', 'Huffman Coding', 'Asadullah'),
(10, 'Operating system', 'Deadlock', 'Galib'),
(11, 'TOC', 'CFG', 'Galib'),
(12, 'TOC', 'Parse tree', 'Galib'),
(13, 'Data structure', 'Binary sort', 'Galib'),
(14, 'C programming', 'String', 'Galib'),
(15, 'DLD', 'Gate', 'Galib'),
(18, 'C programming', 'SQL ', 'Galib'),
(19, 'Algorithm and complexity', 'DP', 'Asadullah');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `body` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `image`, `body`) VALUES
(8, 'LU remain Close', 'uploads/LU-will-remain-closed-from-.jpg', 'Leading University Remain close'),
(10, 'Mid Exam is here', 'uploads/examWhatsApp-Image-2024-02-25-at-13.20.16_00dda68c.jpg', 'Mid term exam is here, held on march 8 2024');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `bill_id` varchar(100) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `order_by` varchar(255) DEFAULT NULL,
  `email` varchar(1000) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `mob` varchar(100) NOT NULL,
  `payment` varchar(1000) NOT NULL,
  `time` varchar(1000) NOT NULL,
  `date` varchar(1000) NOT NULL,
  `products` text DEFAULT NULL,
  `total` varchar(20) DEFAULT NULL,
  `status` varchar(200) NOT NULL,
  `uploader` varchar(200) NOT NULL,
  `accepted_time_date` varchar(200) NOT NULL,
  `in_transit_time_date` varchar(200) NOT NULL,
  `out_for_delivery_time_date` varchar(200) NOT NULL,
  `delivered_time_date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `bill_id`, `name`, `order_by`, `email`, `address`, `mob`, `payment`, `time`, `date`, `products`, `total`, `status`, `uploader`, `accepted_time_date`, `in_transit_time_date`, `out_for_delivery_time_date`, `delivered_time_date`) VALUES
(15, 'ANpiyg2L379h', 'Galib', 'nayeem789', 'nayeem789@gmail.com', 'ff', '34123431243124', 'COD', '20:09', '03-03-2024', 'Mens Premium Classic T-Shirt -  Memento - 1 ', '596.7', 'placed', 'nayeem789', '', '', '', ''),
(16, 'ihweAMVIYKEP', 'Galib', 'Galib', 'algalib@gmail.com', 'Sylhet', '01734462323', 'COD', '21:10', '03-03-2024', 'Women Premium Tee - urban - 1 ', '596.7', 'placed', 'nayeem789', '', '', '', ''),
(17, 'zkTWbI7jKyFs', 'Galib', 'Galib', 'algalib@gmail.com', 'Golapgonj', '01734462323', 'COD', '21:16', '03-03-2024', 'Women Premium Tee - Cream grey - 1 ', '596.7', 'placed', 'Galib', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(250) NOT NULL,
  `prod_name` varchar(1000) NOT NULL,
  `ref` varchar(20) DEFAULT NULL,
  `catagory` varchar(1000) NOT NULL,
  `rating` varchar(1000) NOT NULL,
  `stock` varchar(1000) NOT NULL,
  `price` varchar(1000) NOT NULL,
  `old_price` varchar(1000) NOT NULL,
  `img` varchar(1000) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `uploader` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `prod_name`, `ref`, `catagory`, `rating`, `stock`, `price`, `old_price`, `img`, `description`, `uploader`) VALUES
(85, ' Premium Designer Edition T Shirt - Nostalgia', 'Y2024_P0085', '', '0', 'In Stock', '585', '685', 'proimg/2.jpg', 'Men\'s Premium Quality t-shirt offers a much smoother, silky feel and more structured, mid-weight fit than regular t-shirts. The t-shirts are made with the finest quality Combed Compact Cotton, which features astonishing ~175 GSM on just 26\'s cotton, giving a smooth and compact construction.', 'nayeem789'),
(86, 'Mens Premium Classic T-Shirt - Luminous', 'Y2024_P0086', 'Men Fashion', '0', 'In Stock', '585', '', 'proimg/8.jpg', ' Mens Premium Quality t-shirt that offers a much smoother, silky feel and more structured, mid-weight fit than the regular t-shirts . The t-shirts are made with finest quality Combed Compact Cotton , features astonishing ~175 GSM on just 26\'s cotton which gives an smooth and compact construction.', 'nayeem789'),
(87, 'Mens Premium Classic T-Shirt - Nebula', 'Y2024_P0087', 'Men Fashion', '0', 'In Stock', '585', '', 'proimg/5.jpg', ' Mens Premium Quality t-shirt that offers a much smoother, silky feel and more structured, mid-weight fit than the regular t-shirts . The t-shirts are made with finest quality Combed Compact Cotton , features astonishing ~175 GSM on just 26\'s cotton which gives an smooth and compact construction.', 'nayeem789'),
(88, 'Mens Premium Classic T-Shirt - Black', 'Y2024_P0088', 'Men Fashion', '0', 'In Stock', '585', '', 'proimg/61507e01ee991-square.jpg', ' Mens Premium Quality t-shirt that offers a much smoother, silky feel and more structured, mid-weight fit than the regular t-shirts . The t-shirts are made with finest quality Combed Compact Cotton , features astonishing ~175 GSM on just 26\'s cotton which gives an smooth and compact construction.', 'nayeem789'),
(89, 'Mens Premium Classic T-Shirt - cream ', 'Y2024_P0089', 'Men Fashion', '0', 'In Stock', '585', '', 'proimg/4.jpg', ' Mens Premium Quality t-shirt that offers a much smoother, silky feel and more structured, mid-weight fit than the regular t-shirts . The t-shirts are made with finest quality Combed Compact Cotton , features astonishing ~175 GSM on just 26\'s cotton which gives an smooth and compact construction.', 'nayeem789'),
(90, 'Mens Premium Classic T-Shirt - Luminous Time', 'Y2024_P0090', 'Men Fashion', '0', 'In Stock', '585', '', 'proimg/3.jpg', ' Mens Premium Quality t-shirt that offers a much smoother, silky feel and more structured, mid-weight fit than the regular t-shirts . The t-shirts are made with finest quality Combed Compact Cotton , features astonishing ~175 GSM on just 26\'s cotton which gives an smooth and compact construction.', 'nayeem789'),
(91, 'Mens Premium Sports Active Wear T-shirt - Black Dot', 'Y2024_P0091', 'Men Fashion', '0', 'In Stock', '585', '', 'proimg/8.png', 'Men\'s Premium Quality Sports t-shirts are smooth and comfortable. The t-shirts are made with the finest quality polyester fabric, perfect for casual or sports wear.', 'nayeem789'),
(92, 'Mens Premium Classic T-Shirt -  Memento', 'Y2024_P0092', 'Men Fashion', '0', 'In Stock', '585', '', 'proimg/9.jpg', 'Men\'s Premium Quality t-shirt offers a much smoother, silky feel and more structured, mid-weight fit than regular t-shirts. The t-shirts are made with the finest quality Combed Compact Cotton, which features astonishing ~175 GSM on just 26\'s cotton, giving a smooth and compact construction.', 'nayeem789'),
(93, 'Premium T-shirt -priority', 'Y2024_P0093', 'Men Fashion', '0', 'In Stock', '585', '', 'proimg/1.jpg', 'Mens Premium Quality t-shirt that offers a much smoother, silky feel and more structured, mid-weight fit than the regular t-shirts . The t-shirts are made with finest quality Combed Compact Cotton , features astonishing ~175 GSM on just 26\'s cotton which gives a smooth and compact construction.', 'nayeem789'),
(94, 'Women Premium Tee - blue', 'Y2024_P0094', 'Men Fashion', '0', 'In Stock', '585', '', 'proimg/5.jpg', 'Mens Premium Quality t-shirt that offers a much smoother, silky feel and more structured, mid-weight fit than the regular t-shirts . The t-shirts are made with finest quality Combed Compact Cotton , features astonishing ~175 GSM on just 26\'s cotton which gives a smooth and compact construction.', 'nayeem789'),
(95, 'Women Premium Tee - urban', 'Y2024_P0095', 'Men Fashion', '0', 'In Stock', '585', '', 'proimg/7.jpg', 'Mens Premium Quality t-shirt that offers a much smoother, silky feel and more structured, mid-weight fit than the regular t-shirts . The t-shirts are made with finest quality Combed Compact Cotton , features astonishing ~175 GSM on just 26\'s cotton which gives a smooth and compact construction.', 'nayeem789'),
(96, 'Women Premium Tee - Cream grey', 'Y2024_P0096', 'Men Fashion', '0', 'In Stock', '585', '', 'proimg/6.jpg', 'Mens Premium Quality t-shirt that offers a much smoother, silky feel and more structured, mid-weight fit than the regular t-shirts . The t-shirts are made with finest quality Combed Compact Cotton , features astonishing ~175 GSM on just 26\'s cotton which gives a smooth and compact construction.', 'nayeem789');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(250) NOT NULL,
  `db_fullname` varchar(255) DEFAULT NULL,
  `db_username` varchar(1000) NOT NULL,
  `db_email` varchar(1000) NOT NULL,
  `db_phone` varchar(1000) NOT NULL,
  `db_pass` varchar(1000) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `nid_img` varchar(255) DEFAULT NULL,
  `student_id_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `db_fullname`, `db_username`, `db_email`, `db_phone`, `db_pass`, `role`, `image`, `nid_img`, `student_id_img`) VALUES
(3, 'Adminul Admin', 'admin', 'admin12345@gmail.com', '0156355355   ', 'admin', 'admin', 'userImages/300x300_image.JPG', 'seller_request/nid_images/300x300_image.JPG', 'seller_request/student_id_images/65bcbb5f704cc-square.jpeg'),
(5, NULL, 'nayeem789', 'nayeem789@gmail.com', 'nayeem789', 'nayeem789', 'seller', 'userImages/Galib.jfif', NULL, NULL),
(7, NULL, 'nayeem789', 'asds@dsaa.asd', '01718878282', 'Abc123@', 'seller', 'userImages/Galib.jfif', NULL, NULL),
(8, NULL, 'TestUser', 'testuser@gmail.com', '01837361105', 'Test@1234', 'club manager', NULL, NULL, NULL),
(9, NULL, 'testuser2', 'testuser2@gmail.com', '01837361105', 'Test@1234', 'seller', NULL, 'seller_request/nid_images/pfp 300x300.jpg', 'seller_request/student_id_images/DSC_0276.JPG'),
(10, 'Asadullah', 'Galib', 'algalib@gmail.com', '01734462323', '123456', 'buyer', 'userImages/stable-diffusion-xl (3).jpeg', NULL, NULL),
(11, 'naymur', 'naymur', 'n@gmail.com', '01766552244', '123456', 'seller', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE `rent` (
  `serial` int(100) NOT NULL,
  `prod_name` varchar(100) NOT NULL,
  `mobile` int(20) NOT NULL,
  `image` varchar(100) NOT NULL,
  `details` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rent`
--

INSERT INTO `rent` (`serial`, `prod_name`, `mobile`, `image`, `details`) VALUES
(26, 'Guitar', 1214748364, 'rent_prod/guitar.jpg', 'This guitar is known for the warm, natural sound and versatility, making them popular for singer-songwriters and various musical styles.They require regular maintenance, string changes, and occasional adjustments to ensure optimal playing experience and s'),
(27, 'Photographer', 1791331245, 'rent_prod/photograph.png', 'The photographer is an artist with a unique perspective, using light, composition, and a keen eye to freeze moments in time and translate them into visual narratives.'),
(28, 'Band', 1783465723, 'rent_prod/band.png', 'The enduring legacy of The Banned Community lies in their ability to bridge the gap between individual expression and collective experience. They create music that transcends language, cultures, and eras, bringing people together under the unifying power '),
(29, 'Keyboard', 1791831506, 'rent_prod/kb.jpg', 'The accessibility of keyboard instrument is another contributing factor to a widespread appeal. With readily available learning resources and a relatively straightforward layout, it offers a gentle introduction to the world of music for beginners.'),
(30, 'Projector', 17918315, 'rent_prod/projector.jpg', 'These projectors are specifically designed for displaying data and presentations, such as charts, graphs, and text. They typically have higher resolution and better text clarity compared to video projectors.'),
(31, 'Sports Equipment', 179183150, 'rent_prod/sports.png', 'These sports equipment plays a significant role in facilitating participation, enhancing performance, and ensuring safety in athletic endeavors.'),
(32, 'Costumes and Props', 151029222, 'rent_prod/fake.png', 'Cultural clubs often utilize costumes to showcase the traditional attire and cultural significance of different communities. Costumes and props in university clubs go beyond mere decoration. They serve as powerful tools for storytelling, immersing audienc');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `student_id` int(255) DEFAULT NULL,
  `stu_id_img` varchar(255) DEFAULT NULL,
  `nid_img` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `rid` int(11) NOT NULL,
  `db_username` varchar(1000) NOT NULL,
  `prod_name` varchar(1000) NOT NULL,
  `r_desc` mediumtext NOT NULL,
  `rating` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`rid`, `db_username`, `prod_name`, `r_desc`, `rating`) VALUES
(2, 'nayeem789', 'Test Alpha', 'trgfed', 3),
(3, 'nayeem789', 'Test Alpha', 'dededed', 4),
(5, 'nayeem789', 'Test Alpha', 'Sami vai sera', 5),
(6, 'nayeem789', 'Born To Code', 'Nayeem xoss', 1),
(7, 'nayeem789', 'Showmilk Va', 'dfs', 3),
(8, 'nayeem789', 'Showmilk Va', 'jbjhb', 3),
(9, 'nayeem789', 'Showmilk Va', '4.6 rated\r\n', 5),
(10, 'nayeem789', 'Showmilk Va', '2.2 rated\r\n', 2),
(12, 'nayeem789', 'Attack On Titan - Levi T-Shirt', 'Good', 4),
(13, 'nayeem789', 'Galib Chacha - The G_Man', 'gufhg', 3),
(17, 'nayeem789', 'Galib Chacha - The G_Man', '4stra', 4),
(18, 'nayeem789', 'Galib Chacha - The G_Man', '5 hgn', 5),
(20, 'nayeem789', 'Galib Chacha - The G_Man', 'cdsxc', 5),
(21, 'nayeem789', 'Mens Cotton Fabric Hoodie', 'So Good', 4),
(22, 'nayeem789', 'Mens Cotton Fabric Hoodie', 'Bad', 2),
(23, 'admin', 'Galib Chacha - The G_Man', 'so bad', 1),
(24, 'asds@dsa.asdd', 'Mens Cotton Fabric Hoodie', 'so bad', 1),
(25, 'asds@dsa.asdd', 'Mens Cotton Fabric Hoodie', 'kbk', 5),
(26, 'testuser2@gmail.com', 'Test Upload', 'good product', 4),
(27, 'testuser2@gmail.com', 'Test Upload', 'bad product', 2),
(28, 'admin', 'Test0', 'Good Prod', 4),
(29, 'admin', 'Test0', 'so baad', 1),
(30, 'admin', 'Test0', 'So good', 4),
(31, 'admin', 'Mens Premium T-Shirt - Genesis', 'jbczx', 4),
(32, 'admin', 'Last Check', 'jn', 4),
(33, 'admin', 'dfs updated', 'okis', 4),
(34, 'admin', 'dfs updated', 'hello\r\n', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `mobile_no.` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `id` int(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` int(200) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `reset_token` varchar(200) DEFAULT NULL,
  `token_expired` date DEFAULT NULL,
  `verify_code` varchar(200) NOT NULL,
  `is_verified` tinyint(10) NOT NULL DEFAULT 0,
  `fb` varchar(200) NOT NULL,
  `git` varchar(200) NOT NULL,
  `linkedn` varchar(200) NOT NULL,
  `image` varchar(250) NOT NULL,
  `Ban` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`id`, `username`, `email`, `mobile`, `pass`, `reset_token`, `token_expired`, `verify_code`, `is_verified`, `fb`, `git`, `linkedn`, `image`, `Ban`) VALUES
(57, 'Galib ', 'cse_2012020303@lus.ac.bd', 1734462323, 'Aa12345!@', NULL, NULL, '579397fc8314a059cd7db1a1ff66c030', 1, 'https://www.facebook.com/', 'https://github.com/Galib3O3', 'https://www.linkedin.com/in/AlGalib303', '../image/Galib.jfif', 0),
(58, 'Asadullah ', 'cse_2012020999@lus.ac.bd', 1734462323, 'Aa123456!@', NULL, NULL, '92eb111f9441201944a9d34fceaf4264', 1, 'https://www.facebook.com/', 'https://github.com/Galib3O3', 'https://www.linkedin.com/in/AlGalib303', '../image/stable-diffusion-xl (1).jpeg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clubs_member`
--
ALTER TABLE `clubs_member`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `community_forum_general`
--
ALTER TABLE `community_forum_general`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `community_forum_programming`
--
ALTER TABLE `community_forum_programming`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `community_forum_tech`
--
ALTER TABLE `community_forum_tech`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material_request`
--
ALTER TABLE `material_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `clubs_member`
--
ALTER TABLE `clubs_member`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `community_forum_general`
--
ALTER TABLE `community_forum_general`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `community_forum_programming`
--
ALTER TABLE `community_forum_programming`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `community_forum_tech`
--
ALTER TABLE `community_forum_tech`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `material_request`
--
ALTER TABLE `material_request`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `rent`
--
ALTER TABLE `rent`
  MODIFY `serial` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
