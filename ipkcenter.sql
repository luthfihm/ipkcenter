-- phpMyAdmin SQL Dump
-- version 4.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 30, 2014 at 05:58 AM
-- Server version: 5.5.38
-- PHP Version: 5.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ipkcenter`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`id_kat` int(11) NOT NULL,
  `title` varchar(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_kat`, `title`) VALUES
(1, 'Kerja');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
`id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `category` int(11) DEFAULT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `date`, `category`, `content`) VALUES
(5, 'test', '2014-06-30', NULL, '<p>test</p>'),
(6, 'Event1', '2014-06-30', 1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed suscipit sollicitudin tortor, tempus tempor eros feugiat condimentum. Nunc non mattis lectus. Phasellus tempus felis enim, ac malesuada nisl viverra at. Quisque lacinia felis vitae accumsan fringilla. Aenean sed magna congue, adipiscing diam in, egestas ipsum. Proin eu commodo nunc. Proin dui diam, posuere et erat in, varius pretium erat. Integer mollis consequat magna, et eleifend purus sagittis eu. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>\n<p><br />Suspendisse at semper felis, in pulvinar odio. In et odio leo. Proin enim enim, volutpat nec ornare id, gravida scelerisque augue. Ut mattis nisi at porttitor suscipit. Vestibulum iaculis elit nec ullamcorper condimentum. Aliquam fringilla facilisis tortor molestie accumsan. Phasellus auctor condimentum cursus.</p>\n<p><br />Aenean adipiscing, eros et rutrum mattis, ipsum ante varius libero, vel tincidunt elit felis ut nibh. Aenean gravida faucibus libero, sed convallis ligula lacinia at. Donec vel dignissim augue. Nunc turpis nisi, posuere sit amet felis ut, tristique sodales tortor. Nullam eget lectus eu augue pharetra euismod et nec purus. Nulla placerat molestie leo, a lobortis diam varius non. Integer ultrices mauris eleifend, convallis justo nec, tincidunt est. Nulla sodales nunc sit amet ultrices iaculis.</p>\n<p><br />Maecenas purus eros, fringilla ac pharetra eget, tincidunt sed enim. Quisque varius mi a turpis dapibus, eget tristique est dapibus. Praesent tristique sit amet tortor et pharetra. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce gravida metus lorem, sit amet dictum est elementum sed. Aenean enim ante, hendrerit sit amet ultrices id, posuere ut neque. Praesent aliquam eros vitae nibh aliquam, ut aliquet justo mollis. Maecenas suscipit, eros fermentum dictum mollis, turpis felis iaculis lorem, sit amet tincidunt erat ligula in ligula. Donec fermentum mauris ut lorem consectetur dignissim. Sed laoreet rutrum enim, et gravida orci bibendum ut. Aliquam eget mi posuere, laoreet lacus in, viverra urna. Nunc volutpat eu mi ut gravida. Nunc suscipit arcu in orci pharetra, sed blandit augue gravida. Sed feugiat nibh ut arcu iaculis, quis malesuada risus fermentum.</p>\n<p><br />Nam sagittis, massa sed commodo rhoncus, nunc diam malesuada quam, sit amet tempor massa lorem sit amet urna. Ut ut hendrerit orci. Phasellus eu felis a massa imperdiet elementum vitae quis nibh. Vestibulum aliquam eros dui, vitae tempor urna placerat vel. Vivamus mattis diam non nibh bibendum, non faucibus ligula venenatis. In sed vestibulum eros. Donec justo tellus, ornare et luctus a, tempus vitae enim. Fusce sapien lorem, imperdiet vitae faucibus vel, pulvinar quis ligula. Fusce justo diam, placerat sed iaculis ac, malesuada non leo. </p>'),
(7, 'Event2', '2014-06-30', 1, '<div id="lipsum">\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed suscipit sollicitudin tortor, tempus tempor eros feugiat condimentum. Nunc non mattis lectus. Phasellus tempus felis enim, ac malesuada nisl viverra at. Quisque lacinia felis vitae accumsan fringilla. Aenean sed magna congue, adipiscing diam in, egestas ipsum. Proin eu commodo nunc. Proin dui diam, posuere et erat in, varius pretium erat. Integer mollis consequat magna, et eleifend purus sagittis eu. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>\n<p>Suspendisse at semper felis, in pulvinar odio. In et odio leo. Proin enim enim, volutpat nec ornare id, gravida scelerisque augue. Ut mattis nisi at porttitor suscipit. Vestibulum iaculis elit nec ullamcorper condimentum. Aliquam fringilla facilisis tortor molestie accumsan. Phasellus auctor condimentum cursus.</p>\n<p>Aenean adipiscing, eros et rutrum mattis, ipsum ante varius libero, vel tincidunt elit felis ut nibh. Aenean gravida faucibus libero, sed convallis ligula lacinia at. Donec vel dignissim augue. Nunc turpis nisi, posuere sit amet felis ut, tristique sodales tortor. Nullam eget lectus eu augue pharetra euismod et nec purus. Nulla placerat molestie leo, a lobortis diam varius non. Integer ultrices mauris eleifend, convallis justo nec, tincidunt est. Nulla sodales nunc sit amet ultrices iaculis.</p>\n<p>Maecenas purus eros, fringilla ac pharetra eget, tincidunt sed enim. Quisque varius mi a turpis dapibus, eget tristique est dapibus. Praesent tristique sit amet tortor et pharetra. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce gravida metus lorem, sit amet dictum est elementum sed. Aenean enim ante, hendrerit sit amet ultrices id, posuere ut neque. Praesent aliquam eros vitae nibh aliquam, ut aliquet justo mollis. Maecenas suscipit, eros fermentum dictum mollis, turpis felis iaculis lorem, sit amet tincidunt erat ligula in ligula. Donec fermentum mauris ut lorem consectetur dignissim. Sed laoreet rutrum enim, et gravida orci bibendum ut. Aliquam eget mi posuere, laoreet lacus in, viverra urna. Nunc volutpat eu mi ut gravida. Nunc suscipit arcu in orci pharetra, sed blandit augue gravida. Sed feugiat nibh ut arcu iaculis, quis malesuada risus fermentum.</p>\n<p>Nam sagittis, massa sed commodo rhoncus, nunc diam malesuada quam, sit amet tempor massa lorem sit amet urna. Ut ut hendrerit orci. Phasellus eu felis a massa imperdiet elementum vitae quis nibh. Vestibulum aliquam eros dui, vitae tempor urna placerat vel. Vivamus mattis diam non nibh bibendum, non faucibus ligula venenatis. In sed vestibulum eros. Donec justo tellus, ornare et luctus a, tempus vitae enim. Fusce sapien lorem, imperdiet vitae faucibus vel, pulvinar quis ligula. Fusce justo diam, placerat sed iaculis ac, malesuada non leo.</p>\n</div>');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL,
  `tag` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `tag`) VALUES
(5, 'test'),
(6, 'kantor'),
(6, 'kerja'),
(7, 'bagus'),
(7, 'sekali');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`username`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`id_kat`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
 ADD PRIMARY KEY (`id`), ADD KEY `category` (`category`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
 ADD PRIMARY KEY (`id`,`tag`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `id_kat` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`category`) REFERENCES `category` (`id_kat`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tags`
--
ALTER TABLE `tags`
ADD CONSTRAINT `tags_ibfk_1` FOREIGN KEY (`id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
