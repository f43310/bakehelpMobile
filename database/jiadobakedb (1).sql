-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2014-08-28 11:16:35
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jiadobakedb`
--

-- --------------------------------------------------------

--
-- 表的结构 `ingres`
--

CREATE TABLE IF NOT EXISTS `ingres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `recipeName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `recipeId` int(11) NOT NULL,
  `metric` float NOT NULL,
  `percent` float NOT NULL,
  `requireSum` float NOT NULL DEFAULT '0',
  `sum` float NOT NULL DEFAULT '0',
  `perSum` float NOT NULL DEFAULT '0',
  `remark` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1324 ;

--
-- 转存表中的数据 `ingres`
--

INSERT INTO `ingres` (`id`, `name`, `recipeName`, `recipeId`, `metric`, `percent`, `requireSum`, `sum`, `perSum`, `remark`) VALUES
(359, '白砂糖', '糖浆', 76, 400, 100, 0, 630, 157.5, ''),
(360, '水', '糖浆', 76, 180, 45, 0, 630, 157.5, ''),
(361, '柠檬汁', '糖浆', 76, 50, 12.5, 0, 630, 157.5, ''),
(388, '低粉', '小海绵', 80, 386, 100, 0, 2325.2, 602.39, ''),
(389, '淀粉', '小海绵', 80, 26, 6.74, 0, 2325.2, 602.39, ''),
(390, 'TT', '小海绵', 80, 12, 3.11, 0, 2325.2, 602.39, ''),
(391, '盐', '小海绵', 80, 5, 1.3, 0, 2325.2, 602.39, ''),
(392, '香草', '小海绵', 80, 4, 1.04, 0, 2325.2, 602.39, ''),
(393, '砂糖1', '小海绵', 80, 295, 76.42, 0, 2325.2, 602.39, ''),
(394, '砂糖2', '小海绵', 80, 126, 32.64, 0, 2325.2, 602.39, ''),
(395, 'B.P', '小海绵', 80, 3.2, 0.83, 0, 2325.2, 602.39, ''),
(396, '蛋白', '小海绵', 80, 800, 207.25, 0, 2325.2, 602.39, ''),
(397, '蛋黄', '小海绵', 80, 398, 103.11, 0, 2325.2, 602.39, ''),
(398, '色拉油', '小海绵', 80, 152, 39.38, 0, 2325.2, 602.39, ''),
(399, '水', '小海绵', 80, 118, 30.57, 0, 2325.2, 602.39, ''),
(453, '全蛋', '苏菲', 84, 1200, 100, 0, 2727.5, 227.3, ''),
(454, '稳定剂', '苏菲', 84, 10, 0.83, 0, 2727.5, 227.3, ''),
(455, '糖', '苏菲', 84, 450, 37.5, 0, 2727.5, 227.3, ''),
(456, '盐', '苏菲', 84, 4.5, 0.38, 0, 2727.5, 227.3, ''),
(457, '水', '苏菲', 84, 250.5, 20.88, 0, 2727.5, 227.3, ''),
(458, '液态', '苏菲', 84, 201, 16.75, 0, 2727.5, 227.3, ''),
(459, '糖粉', '苏菲', 84, 100.5, 8.38, 0, 2727.5, 227.3, ''),
(460, '低粉', '苏菲', 84, 501, 41.75, 0, 2727.5, 227.3, ''),
(461, 'B.P', '苏菲', 84, 10, 0.83, 0, 2727.5, 227.3, ''),
(841, '牛奶', '高糖面团', 111, 0, 40, 0, 0, 231.25, ''),
(842, '新鲜酵母', '高糖面团', 111, 0, 5, 0, 0, 231.25, ''),
(843, '高粉', '高糖面团', 111, 0, 50, 0, 0, 231.25, ''),
(844, '黄油', '高糖面团', 111, 0, 40, 0, 0, 231.25, ''),
(845, '蔗糖', '高糖面团', 111, 0, 20, 0, 0, 231.25, ''),
(846, '盐', '高糖面团', 111, 0, 1.25, 0, 0, 231.25, ''),
(847, '鸡蛋', '高糖面团', 111, 0, 25, 0, 0, 231.25, ''),
(848, '高粉', '高糖面团', 111, 0, 50, 0, 0, 231.25, ''),
(849, '牛奶', '高糖面团', 111, 204, 40, 1181, 0, 231.25, ''),
(850, '新鲜酵母', '高糖面团', 111, 25.5, 5, 1181, 0, 231.25, ''),
(851, '高粉', '高糖面团', 111, 255, 50, 1181, 0, 231.25, ''),
(852, '黄油', '高糖面团', 111, 204, 40, 1181, 0, 231.25, ''),
(853, '蔗糖', '高糖面团', 111, 102, 20, 1181, 0, 231.25, ''),
(854, '盐', '高糖面团', 111, 6, 1.25, 1181, 0, 231.25, ''),
(855, '鸡蛋', '高糖面团', 111, 127.5, 25, 1181, 0, 231.25, ''),
(856, '高粉', '高糖面团', 111, 255, 50, 1181, 0, 231.25, ''),
(868, '高粉', '爱和自由朋友原方1', 113, 0, 50, 0, 0, 183.3, ''),
(869, '水', '爱和自由朋友原方1', 113, 0, 40, 0, 0, 183.3, ''),
(870, '糖', '爱和自由朋友原方1', 113, 0, 4, 0, 0, 183.3, ''),
(871, '酵母', '爱和自由朋友原方1', 113, 0, 1.3, 0, 0, 183.3, ''),
(872, '植物油', '爱和自由朋友原方1', 113, 0, 8, 0, 0, 183.3, ''),
(873, '蛋', '爱和自由朋友原方1', 113, 0, 13, 0, 0, 183.3, ''),
(874, '盐', '爱和自由朋友原方1', 113, 0, 1, 0, 0, 183.3, ''),
(875, '糖', '爱和自由朋友原方1', 113, 0, 10, 0, 0, 183.3, ''),
(876, '吉士粉', '爱和自由朋友原方1', 113, 0, 1, 0, 0, 183.3, ''),
(877, '水', '爱和自由朋友原方1', 113, 0, 5, 0, 0, 183.3, ''),
(878, '高粉', '爱和自由朋友原方1', 113, 0, 50, 0, 0, 183.3, ''),
(890, '高粉', '爱和自由朋友原方1-修改加水', 115, 0, 50, 0, 0, 172.3, ''),
(891, '水', '爱和自由朋友原方1-修改加水', 115, 0, 25, 0, 0, 172.3, ''),
(892, '糖', '爱和自由朋友原方1-修改加水', 115, 0, 4, 0, 0, 172.3, ''),
(893, '酵母', '爱和自由朋友原方1-修改加水', 115, 0, 1.3, 0, 0, 172.3, ''),
(894, '植物油', '爱和自由朋友原方1-修改加水', 115, 0, 8, 0, 0, 172.3, ''),
(895, '蛋', '爱和自由朋友原方1-修改加水', 115, 0, 13, 0, 0, 172.3, ''),
(896, '盐', '爱和自由朋友原方1-修改加水', 115, 0, 1, 0, 0, 172.3, ''),
(897, '糖', '爱和自由朋友原方1-修改加水', 115, 0, 10, 0, 0, 172.3, ''),
(898, '吉士粉', '爱和自由朋友原方1-修改加水', 115, 0, 1, 0, 0, 172.3, ''),
(899, '水', '爱和自由朋友原方1-修改加水', 115, 0, 9, 0, 0, 172.3, ''),
(900, '高粉', '爱和自由朋友原方1-修改加水', 115, 0, 50, 0, 0, 172.3, ''),
(912, '高粉', '爱和自由朋友原方1-修改加水', 115, 609, 50, 2100, 0, 172.3, ''),
(913, '水', '爱和自由朋友原方1-修改加水', 115, 304.5, 25, 2100, 0, 172.3, ''),
(914, '糖', '爱和自由朋友原方1-修改加水', 115, 48.5, 4, 2100, 0, 172.3, ''),
(915, '酵母', '爱和自由朋友原方1-修改加水', 115, 15.5, 1.3, 2100, 0, 172.3, ''),
(916, '植物油', '爱和自由朋友原方1-修改加水', 115, 97.5, 8, 2100, 0, 172.3, ''),
(917, '蛋', '爱和自由朋友原方1-修改加水', 115, 158, 13, 2100, 0, 172.3, ''),
(918, '盐', '爱和自由朋友原方1-修改加水', 115, 12, 1, 2100, 0, 172.3, ''),
(919, '糖', '爱和自由朋友原方1-修改加水', 115, 121.5, 10, 2100, 0, 172.3, ''),
(920, '吉士粉', '爱和自由朋友原方1-修改加水', 115, 12, 1, 2100, 0, 172.3, ''),
(921, '水', '爱和自由朋友原方1-修改加水', 115, 109.5, 9, 2100, 0, 172.3, ''),
(922, '高粉', '爱和自由朋友原方1-修改加水', 115, 609, 50, 2100, 0, 172.3, ''),
(923, '高粉', '爱和自由朋友原方500', 117, 500, 50, 0, 1833, 183.3, ''),
(924, '水', '爱和自由朋友原方500', 117, 400, 40, 0, 1833, 183.3, ''),
(925, '糖', '爱和自由朋友原方500', 117, 40, 4, 0, 1833, 183.3, ''),
(926, '酵母', '爱和自由朋友原方500', 117, 13, 1.3, 0, 1833, 183.3, ''),
(927, '植物油', '爱和自由朋友原方500', 117, 80, 8, 0, 1833, 183.3, ''),
(928, '蛋', '爱和自由朋友原方500', 117, 130, 13, 0, 1833, 183.3, ''),
(929, '盐', '爱和自由朋友原方500', 117, 10, 1, 0, 1833, 183.3, ''),
(930, '糖', '爱和自由朋友原方500', 117, 100, 10, 0, 1833, 183.3, ''),
(931, '吉士粉', '爱和自由朋友原方500', 117, 10, 1, 0, 1833, 183.3, ''),
(932, '水', '爱和自由朋友原方500', 117, 50, 5, 0, 1833, 183.3, ''),
(933, '高粉', '爱和自由朋友原方500', 117, 500, 50, 0, 1833, 183.3, ''),
(934, '高粉', '爱和自由修改加水量种主分开', 118, 300, 50, 0, 1122, 187, ''),
(935, '糖', '爱和自由修改加水量种主分开', 118, 96, 16, 0, 1122, 187, ''),
(936, '盐', '爱和自由修改加水量种主分开', 118, 6, 1, 0, 1122, 187, ''),
(937, '奶粉', '爱和自由修改加水量种主分开', 118, 24, 4, 0, 1122, 187, ''),
(938, '鸡蛋', '爱和自由修改加水量种主分开', 118, 90, 15, 0, 1122, 187, ''),
(939, '水', '爱和自由修改加水量种主分开', 118, 54, 9, 0, 1122, 187, ''),
(940, '黄油', '爱和自由修改加水量种主分开', 118, 72, 12, 0, 1122, 187, ''),
(941, '糖-种', '爱和自由修改加水量种主分开', 118, 24, 4, 0, 1122, 187, ''),
(942, '酵-种', '爱和自由修改加水量种主分开', 118, 6, 1, 0, 1122, 187, ''),
(943, '水-种', '爱和自由修改加水量种主分开', 118, 150, 25, 0, 1122, 187, ''),
(944, '高粉', '爱和自由修改加水量种主分开', 118, 300, 50, 0, 1122, 187, ''),
(945, '高粉', '工厂老式面包-种主分', 119, 20000, 50, 0, 67100, 167.76, ''),
(946, '酵母-种', '工厂老式面包-种主分', 119, 160, 0.4, 0, 67100, 167.76, ''),
(947, '水-种', '工厂老式面包-种主分', 119, 11200, 28, 0, 67100, 167.76, ''),
(948, '糖', '工厂老式面包-种主分', 119, 4000, 10, 0, 67100, 167.76, ''),
(949, '酵母', '工厂老式面包-种主分', 119, 200, 0.5, 0, 67100, 167.76, ''),
(950, '改良剂', '工厂老式面包-种主分', 119, 60, 0.15, 0, 67100, 167.76, ''),
(951, '蛋', '工厂老式面包-种主分', 119, 2000, 5, 0, 67100, 167.76, ''),
(952, '豆油', '工厂老式面包-种主分', 119, 1000, 2.5, 0, 67100, 167.76, ''),
(953, '盐', '工厂老式面包-种主分', 119, 200, 0.5, 0, 67100, 167.76, ''),
(954, '糖浆', '工厂老式面包-种主分', 119, 250, 0.63, 0, 67100, 167.76, ''),
(955, '水', '工厂老式面包-种主分', 119, 8000, 20, 0, 67100, 167.76, ''),
(956, '丙酸钙', '工厂老式面包-种主分', 119, 15, 0.04, 0, 67100, 167.76, ''),
(957, '脱氢乙酸钠', '工厂老式面包-种主分', 119, 15, 0.04, 0, 67100, 167.76, ''),
(958, '高粉', '工厂老式面包-种主分', 119, 20000, 50, 0, 67100, 167.76, ''),
(959, '高粉', '工厂老式面包-种主分', 119, 625.5, 50, 2100, 0, 167.76, ''),
(960, '酵母-种', '工厂老式面包-种主分', 119, 5, 0.4, 2100, 0, 167.76, ''),
(961, '水-种', '工厂老式面包-种主分', 119, 350.5, 28, 2100, 0, 167.76, ''),
(962, '糖', '工厂老式面包-种主分', 119, 125, 10, 2100, 0, 167.76, ''),
(963, '酵母', '工厂老式面包-种主分', 119, 6, 0.5, 2100, 0, 167.76, ''),
(964, '改良剂', '工厂老式面包-种主分', 119, 1.5, 0.15, 2100, 0, 167.76, ''),
(965, '蛋', '工厂老式面包-种主分', 119, 62.5, 5, 2100, 0, 167.76, ''),
(966, '豆油', '工厂老式面包-种主分', 119, 31, 2.5, 2100, 0, 167.76, ''),
(967, '盐', '工厂老式面包-种主分', 119, 6, 0.5, 2100, 0, 167.76, ''),
(968, '糖浆', '工厂老式面包-种主分', 119, 7.5, 0.63, 2100, 0, 167.76, ''),
(969, '水', '工厂老式面包-种主分', 119, 250, 20, 2100, 0, 167.76, ''),
(970, '丙酸钙', '工厂老式面包-种主分', 119, 0.5, 0.04, 2100, 0, 167.76, ''),
(971, '脱氢乙酸钠', '工厂老式面包-种主分', 119, 0.5, 0.04, 2100, 0, 167.76, ''),
(972, '高粉', '工厂老式面包-种主分', 119, 625.5, 50, 2100, 0, 167.76, ''),
(973, '牛奶', '高糖面团-perfessionalbaking', 111, 363, 40, 2100, 0, 231.25, ''),
(974, '新鲜酵母', '高糖面团-perfessionalbaking', 111, 45, 5, 2100, 0, 231.25, ''),
(975, '高粉', '高糖面团-perfessionalbaking', 111, 454, 50, 2100, 0, 231.25, ''),
(976, '黄油', '高糖面团-perfessionalbaking', 111, 363, 40, 2100, 0, 231.25, ''),
(977, '蔗糖', '高糖面团-perfessionalbaking', 111, 181.5, 20, 2100, 0, 231.25, ''),
(978, '盐', '高糖面团-perfessionalbaking', 111, 11, 1.25, 2100, 0, 231.25, ''),
(979, '鸡蛋', '高糖面团-perfessionalbaking', 111, 227, 25, 2100, 0, 231.25, ''),
(980, '高粉', '高糖面团-perfessionalbaking', 111, 454, 50, 2100, 0, 231.25, ''),
(981, '高粉', '老韩甜面包调整加水量-种主分', 120, 500, 50, 0, 1906, 190.6, ''),
(982, '种-蛋清', '老韩甜面包调整加水量-种主分', 120, 100, 10, 0, 1906, 190.6, ''),
(983, '种-牛奶', '老韩甜面包调整加水量-种主分', 120, 100, 10, 0, 1906, 190.6, ''),
(984, '种-酵母', '老韩甜面包调整加水量-种主分', 120, 12, 1.2, 0, 1906, 190.6, ''),
(985, '种-水', '老韩甜面包调整加水量-种主分', 120, 250, 25, 0, 1906, 190.6, ''),
(986, '改良剂', '老韩甜面包调整加水量-种主分', 120, 2, 0.2, 0, 1906, 190.6, ''),
(987, '糖', '老韩甜面包调整加水量-种主分', 120, 200, 20, 0, 1906, 190.6, ''),
(988, '奶粉', '老韩甜面包调整加水量-种主分', 120, 30, 3, 0, 1906, 190.6, ''),
(989, '水', '老韩甜面包调整加水量-种主分', 120, 80, 8, 0, 1906, 190.6, ''),
(990, '盐', '老韩甜面包调整加水量-种主分', 120, 12, 1.2, 0, 1906, 190.6, ''),
(991, '黄油', '老韩甜面包调整加水量-种主分', 120, 120, 12, 0, 1906, 190.6, ''),
(992, '高粉', '老韩甜面包调整加水量-种主分', 120, 500, 50, 0, 1906, 190.6, ''),
(993, '高粉', '老韩甜面包调整加水量-种主分', 120, 550.5, 50, 2100, 0, 190.6, ''),
(994, '种-蛋清', '老韩甜面包调整加水量-种主分', 120, 110, 10, 2100, 0, 190.6, ''),
(995, '种-牛奶', '老韩甜面包调整加水量-种主分', 120, 110, 10, 2100, 0, 190.6, ''),
(996, '种-酵母', '老韩甜面包调整加水量-种主分', 120, 13, 1.2, 2100, 0, 190.6, ''),
(997, '种-水', '老韩甜面包调整加水量-种主分', 120, 275, 25, 2100, 0, 190.6, ''),
(998, '改良剂', '老韩甜面包调整加水量-种主分', 120, 2, 0.2, 2100, 0, 190.6, ''),
(999, '糖', '老韩甜面包调整加水量-种主分', 120, 220, 20, 2100, 0, 190.6, ''),
(1000, '奶粉', '老韩甜面包调整加水量-种主分', 120, 33, 3, 2100, 0, 190.6, ''),
(1001, '水', '老韩甜面包调整加水量-种主分', 120, 88, 8, 2100, 0, 190.6, ''),
(1002, '盐', '老韩甜面包调整加水量-种主分', 120, 13, 1.2, 2100, 0, 190.6, ''),
(1003, '黄油', '老韩甜面包调整加水量-种主分', 120, 132, 12, 2100, 0, 190.6, ''),
(1004, '高粉', '老韩甜面包调整加水量-种主分', 120, 550.5, 50, 2100, 0, 190.6, ''),
(1016, '面包粉', '52甜面包-种主分修正', 122, 7500, 30, 0, 46575, 186.3, ''),
(1017, '糖', '52甜面包-种主分修正', 122, 4500, 18, 0, 46575, 186.3, ''),
(1018, '盐', '52甜面包-种主分修正', 122, 250, 1, 0, 46575, 186.3, ''),
(1019, '改良剂', '52甜面包-种主分修正', 122, 75, 0.3, 0, 46575, 186.3, ''),
(1020, '奶粉', '52甜面包-种主分修正', 122, 750, 3, 0, 46575, 186.3, ''),
(1021, '水', '52甜面包-种主分修正', 122, 2000, 8, 0, 46575, 186.3, ''),
(1022, '奶油', '52甜面包-种主分修正', 122, 2500, 10, 0, 46575, 186.3, ''),
(1023, '种-鸡蛋', '52甜面包-种主分修正', 122, 3750, 15, 0, 46575, 186.3, ''),
(1024, '种-水', '52甜面包-种主分修正', 122, 7500, 30, 0, 46575, 186.3, ''),
(1025, '种-酵母', '52甜面包-种主分修正', 122, 250, 1, 0, 46575, 186.3, ''),
(1026, '高粉', '52甜面包-种主分修正', 122, 17500, 70, 0, 46575, 186.3, ''),
(1027, '高粉', '工厂老式面包-种主分', 119, 1222, 50, 4100, 0, 167.76, ''),
(1028, '酵母-种', '工厂老式面包-种主分', 119, 9.5, 0.4, 4100, 0, 167.76, ''),
(1029, '水-种', '工厂老式面包-种主分', 119, 684, 28, 4100, 0, 167.76, ''),
(1030, '糖', '工厂老式面包-种主分', 119, 244, 10, 4100, 0, 167.76, ''),
(1031, '酵母', '工厂老式面包-种主分', 119, 12, 0.5, 4100, 0, 167.76, ''),
(1032, '改良剂', '工厂老式面包-种主分', 119, 3.5, 0.15, 4100, 0, 167.76, ''),
(1033, '蛋', '工厂老式面包-种主分', 119, 122, 5, 4100, 0, 167.76, ''),
(1034, '豆油', '工厂老式面包-种主分', 119, 61, 2.5, 4100, 0, 167.76, ''),
(1035, '盐', '工厂老式面包-种主分', 119, 12, 0.5, 4100, 0, 167.76, ''),
(1036, '糖浆', '工厂老式面包-种主分', 119, 15, 0.63, 4100, 0, 167.76, ''),
(1037, '水', '工厂老式面包-种主分', 119, 488.5, 20, 4100, 0, 167.76, ''),
(1038, '丙酸钙', '工厂老式面包-种主分', 119, 1, 0.04, 4100, 0, 167.76, ''),
(1039, '脱氢乙酸钠', '工厂老式面包-种主分', 119, 1, 0.04, 4100, 0, 167.76, ''),
(1040, '高粉', '工厂老式面包-种主分', 119, 1222, 50, 4100, 0, 167.76, ''),
(1049, '蛋', '52蛋奶饼', 124, 900, 30, 0, 5695, 189.84, ''),
(1050, '糖', '52蛋奶饼', 124, 750, 25, 0, 5695, 189.84, ''),
(1051, '盐', '52蛋奶饼', 124, 30, 1, 0, 5695, 189.84, ''),
(1052, '无水酥油', '52蛋奶饼', 124, 350, 11.67, 0, 5695, 189.84, ''),
(1053, '高筋', '52蛋奶饼', 124, 1500, 50, 0, 5695, 189.84, ''),
(1054, '低筋', '52蛋奶饼', 124, 1500, 50, 0, 5695, 189.84, ''),
(1055, '改良剂', '52蛋奶饼', 124, 15, 0.5, 0, 5695, 189.84, ''),
(1056, '酵母', '52蛋奶饼', 124, 50, 1.67, 0, 5695, 189.84, ''),
(1057, '水', '52蛋奶饼', 124, 600, 20, 0, 5695, 189.84, ''),
(1058, '高粉', '爱和自由修改加水量种主分开', 118, 1200, 50, 4488, 0, 187, ''),
(1059, '糖', '爱和自由修改加水量种主分开', 118, 384, 16, 4488, 0, 187, ''),
(1060, '盐', '爱和自由修改加水量种主分开', 118, 24, 1, 4488, 0, 187, ''),
(1061, '奶粉', '爱和自由修改加水量种主分开', 118, 96, 4, 4488, 0, 187, ''),
(1062, '鸡蛋', '爱和自由修改加水量种主分开', 118, 360, 15, 4488, 0, 187, ''),
(1063, '水', '爱和自由修改加水量种主分开', 118, 216, 9, 4488, 0, 187, ''),
(1064, '黄油', '爱和自由修改加水量种主分开', 118, 288, 12, 4488, 0, 187, ''),
(1065, '糖-种', '爱和自由修改加水量种主分开', 118, 96, 4, 4488, 0, 187, ''),
(1066, '酵-种', '爱和自由修改加水量种主分开', 118, 24, 1, 4488, 0, 187, ''),
(1067, '水-种', '爱和自由修改加水量种主分开', 118, 600, 25, 4488, 0, 187, ''),
(1068, '高粉', '爱和自由修改加水量种主分开', 118, 1200, 50, 4488, 0, 187, ''),
(1069, '高粉', '爱和自由修改加水量种主分开', 118, 1500, 50, 5610, 0, 187, ''),
(1070, '糖', '爱和自由修改加水量种主分开', 118, 480, 16, 5610, 0, 187, ''),
(1071, '盐', '爱和自由修改加水量种主分开', 118, 30, 1, 5610, 0, 187, ''),
(1072, '奶粉', '爱和自由修改加水量种主分开', 118, 120, 4, 5610, 0, 187, ''),
(1073, '鸡蛋', '爱和自由修改加水量种主分开', 118, 450, 15, 5610, 0, 187, ''),
(1074, '水', '爱和自由修改加水量种主分开', 118, 270, 9, 5610, 0, 187, ''),
(1075, '黄油', '爱和自由修改加水量种主分开', 118, 360, 12, 5610, 0, 187, ''),
(1076, '糖-种', '爱和自由修改加水量种主分开', 118, 120, 4, 5610, 0, 187, ''),
(1077, '酵-种', '爱和自由修改加水量种主分开', 118, 30, 1, 5610, 0, 187, ''),
(1078, '水-种', '爱和自由修改加水量种主分开', 118, 750, 25, 5610, 0, 187, ''),
(1079, '高粉', '爱和自由修改加水量种主分开', 118, 1500, 50, 5610, 0, 187, ''),
(1080, '高粉', '爱和自由修改加水量种主分开', 118, 1800, 50, 6732, 0, 187, '6盘的量'),
(1081, '糖', '爱和自由修改加水量种主分开', 118, 576, 16, 6732, 0, 187, '6盘的量'),
(1082, '盐', '爱和自由修改加水量种主分开', 118, 36, 1, 6732, 0, 187, '6盘的量'),
(1083, '奶粉', '爱和自由修改加水量种主分开', 118, 144, 4, 6732, 0, 187, '6盘的量'),
(1084, '鸡蛋', '爱和自由修改加水量种主分开', 118, 540, 15, 6732, 0, 187, '6盘的量'),
(1085, '水', '爱和自由修改加水量种主分开', 118, 324, 9, 6732, 0, 187, '6盘的量'),
(1086, '黄油', '爱和自由修改加水量种主分开', 118, 432, 12, 6732, 0, 187, '6盘的量'),
(1087, '糖-种', '爱和自由修改加水量种主分开', 118, 144, 4, 6732, 0, 187, '6盘的量'),
(1088, '酵-种', '爱和自由修改加水量种主分开', 118, 36, 1, 6732, 0, 187, '6盘的量'),
(1089, '水-种', '爱和自由修改加水量种主分开', 118, 900, 25, 6732, 0, 187, '6盘的量'),
(1090, '高粉', '爱和自由修改加水量种主分开', 118, 1800, 50, 6732, 0, 187, '6盘的量'),
(1091, '高粉', '爱和自由修改加水量种主分开', 118, 2192.5, 50, 8200, 0, 187, ''),
(1092, '糖', '爱和自由修改加水量种主分开', 118, 701.5, 16, 8200, 0, 187, ''),
(1093, '盐', '爱和自由修改加水量种主分开', 118, 43.5, 1, 8200, 0, 187, ''),
(1094, '奶粉', '爱和自由修改加水量种主分开', 118, 175, 4, 8200, 0, 187, ''),
(1095, '鸡蛋', '爱和自由修改加水量种主分开', 118, 657.5, 15, 8200, 0, 187, ''),
(1096, '水', '爱和自由修改加水量种主分开', 118, 394.5, 9, 8200, 0, 187, ''),
(1097, '黄油', '爱和自由修改加水量种主分开', 118, 526, 12, 8200, 0, 187, ''),
(1098, '糖-种', '爱和自由修改加水量种主分开', 118, 175, 4, 8200, 0, 187, ''),
(1099, '酵-种', '爱和自由修改加水量种主分开', 118, 43.5, 1, 8200, 0, 187, ''),
(1100, '水-种', '爱和自由修改加水量种主分开', 118, 1096, 25, 8200, 0, 187, ''),
(1101, '高粉', '爱和自由修改加水量种主分开', 118, 2192.5, 50, 8200, 0, 187, ''),
(1102, '低粉', '小海绵', 80, 772, 100, 4650.4, 0, 602.39, '2盘'),
(1103, '淀粉', '小海绵', 80, 52, 6.74, 4650.4, 0, 602.39, '2盘'),
(1104, 'TT', '小海绵', 80, 24, 3.11, 4650.4, 0, 602.39, '2盘'),
(1105, '盐', '小海绵', 80, 10, 1.3, 4650.4, 0, 602.39, '2盘'),
(1106, '香草', '小海绵', 80, 8, 1.04, 4650.4, 0, 602.39, '2盘'),
(1107, '砂糖1', '小海绵', 80, 590, 76.42, 4650.4, 0, 602.39, '2盘'),
(1108, '砂糖2', '小海绵', 80, 252, 32.64, 4650.4, 0, 602.39, '2盘'),
(1109, 'B.P', '小海绵', 80, 6, 0.83, 4650.4, 0, 602.39, '2盘'),
(1110, '蛋白', '小海绵', 80, 1600, 207.25, 4650.4, 0, 602.39, '2盘'),
(1111, '蛋黄', '小海绵', 80, 796, 103.11, 4650.4, 0, 602.39, '2盘'),
(1112, '色拉油', '小海绵', 80, 304, 39.38, 4650.4, 0, 602.39, '2盘'),
(1113, '水', '小海绵', 80, 236, 30.57, 4650.4, 0, 602.39, '2盘'),
(1123, '面包粉', '52甜面包-种主分修正', 122, 338, 30, 2100, 0, 186.3, '一盘'),
(1124, '糖', '52甜面包-种主分修正', 122, 202.5, 18, 2100, 0, 186.3, '一盘'),
(1125, '盐', '52甜面包-种主分修正', 122, 11, 1, 2100, 0, 186.3, '一盘'),
(1126, '改良剂', '52甜面包-种主分修正', 122, 3, 0.3, 2100, 0, 186.3, '一盘'),
(1127, '奶粉', '52甜面包-种主分修正', 122, 33.5, 3, 2100, 0, 186.3, '一盘'),
(1128, '水', '52甜面包-种主分修正', 122, 90, 8, 2100, 0, 186.3, '一盘'),
(1129, '奶油', '52甜面包-种主分修正', 122, 112.5, 10, 2100, 0, 186.3, '一盘'),
(1130, '种-鸡蛋', '52甜面包-种主分修正', 122, 169, 15, 2100, 0, 186.3, '一盘'),
(1131, '种-水', '52甜面包-种主分修正', 122, 338, 30, 2100, 0, 186.3, '一盘'),
(1132, '种-酵母', '52甜面包-种主分修正', 122, 11, 1, 2100, 0, 186.3, '一盘'),
(1133, '高粉', '52甜面包-种主分修正', 122, 789, 70, 2100, 0, 186.3, '一盘'),
(1139, '111', '333333333', 128, 212, 17.49, 0, 1535, 126.65, ''),
(1140, '222', '333333333', 128, 1212, 100, 0, 1535, 126.65, ''),
(1141, '333', '333333333', 128, 111, 9.16, 0, 1535, 126.65, ''),
(1142, '11111', '444444', 129, 312, 100, 0, 477, 152.88, ''),
(1143, '22222222', '444444', 129, 121, 38.78, 0, 477, 152.88, ''),
(1144, '33333333333', '444444', 129, 44, 14.1, 0, 477, 152.88, ''),
(1145, '11111', '555555555', 131, 3453, 100, 0, 5452, 157.89, ''),
(1146, '222', '555555555', 131, 454, 13.15, 0, 5452, 157.89, ''),
(1147, '33333333', '555555555', 131, 1545, 44.74, 0, 5452, 157.89, ''),
(1148, '全蛋', '苏菲', 84, 1244, 100, 2827.5, 0, 227.3, '3p+100'),
(1149, '稳定剂', '苏菲', 84, 10, 0.83, 2827.5, 0, 227.3, '3p+100'),
(1150, '糖', '苏菲', 84, 466.5, 37.5, 2827.5, 0, 227.3, '3p+100'),
(1151, '盐', '苏菲', 84, 4.5, 0.38, 2827.5, 0, 227.3, '3p+100'),
(1152, '水', '苏菲', 84, 259.5, 20.88, 2827.5, 0, 227.3, '3p+100'),
(1153, '液态', '苏菲', 84, 208, 16.75, 2827.5, 0, 227.3, '3p+100'),
(1154, '糖粉', '苏菲', 84, 104, 8.38, 2827.5, 0, 227.3, '3p+100'),
(1155, '低粉', '苏菲', 84, 519, 41.75, 2827.5, 0, 227.3, '3p+100'),
(1156, 'B.P', '苏菲', 84, 10, 0.83, 2827.5, 0, 227.3, '3p+100'),
(1157, '高粉', '爱和自由朋友原方500', 117, 572.5, 50, 2100, 0, 183.3, ''),
(1158, '水', '爱和自由朋友原方500', 117, 458, 40, 2100, 0, 183.3, ''),
(1159, '糖', '爱和自由朋友原方500', 117, 45.5, 4, 2100, 0, 183.3, ''),
(1160, '酵母', '爱和自由朋友原方500', 117, 14.5, 1.3, 2100, 0, 183.3, ''),
(1161, '植物油', '爱和自由朋友原方500', 117, 91.5, 8, 2100, 0, 183.3, ''),
(1162, '蛋', '爱和自由朋友原方500', 117, 148.5, 13, 2100, 0, 183.3, ''),
(1163, '盐', '爱和自由朋友原方500', 117, 11.5, 1, 2100, 0, 183.3, ''),
(1164, '糖', '爱和自由朋友原方500', 117, 114.5, 10, 2100, 0, 183.3, ''),
(1165, '吉士粉', '爱和自由朋友原方500', 117, 11.5, 1, 2100, 0, 183.3, ''),
(1166, '水', '爱和自由朋友原方500', 117, 57, 5, 2100, 0, 183.3, ''),
(1167, '高粉', '爱和自由朋友原方500', 117, 572.5, 50, 2100, 0, 183.3, ''),
(1168, '低粉', '小海绵修改烘焙百分比', 133, 386, 48.25, 0, 2325, 290.66, ''),
(1169, '淀粉', '小海绵修改烘焙百分比', 133, 26, 3.25, 0, 2325, 290.66, ''),
(1170, 'TT', '小海绵修改烘焙百分比', 133, 12, 1.5, 0, 2325, 290.66, ''),
(1171, '盐', '小海绵修改烘焙百分比', 133, 5, 0.63, 0, 2325, 290.66, ''),
(1172, '香草', '小海绵修改烘焙百分比', 133, 4, 0.5, 0, 2325, 290.66, ''),
(1173, '砂糖1', '小海绵修改烘焙百分比', 133, 295, 36.88, 0, 2325, 290.66, ''),
(1174, '砂糖2', '小海绵修改烘焙百分比', 133, 126, 15.75, 0, 2325, 290.66, ''),
(1175, 'B.P', '小海绵修改烘焙百分比', 133, 3, 0.4, 0, 2325, 290.66, ''),
(1176, '蛋白', '小海绵修改烘焙百分比', 133, 800, 100, 0, 2325, 290.66, ''),
(1177, '蛋黄', '小海绵修改烘焙百分比', 133, 398, 49.75, 0, 2325, 290.66, ''),
(1178, '色拉油', '小海绵修改烘焙百分比', 133, 152, 19, 0, 2325, 290.66, ''),
(1179, '水', '小海绵修改烘焙百分比', 133, 118, 14.75, 0, 2325, 290.66, ''),
(1180, '低粉', '小海绵修改烘焙百分比', 133, 771.5, 48.25, 4650, 0, 290.66, '2盘'),
(1181, '淀粉', '小海绵修改烘焙百分比', 133, 52, 3.25, 4650, 0, 290.66, '2盘'),
(1182, 'TT', '小海绵修改烘焙百分比', 133, 24, 1.5, 4650, 0, 290.66, '2盘'),
(1183, '盐', '小海绵修改烘焙百分比', 133, 10, 0.63, 4650, 0, 290.66, '2盘'),
(1184, '香草', '小海绵修改烘焙百分比', 133, 8, 0.5, 4650, 0, 290.66, '2盘'),
(1185, '砂糖1', '小海绵修改烘焙百分比', 133, 590, 36.88, 4650, 0, 290.66, '2盘'),
(1186, '砂糖2', '小海绵修改烘焙百分比', 133, 252, 15.75, 4650, 0, 290.66, '2盘'),
(1187, 'B.P', '小海绵修改烘焙百分比', 133, 6, 0.4, 4650, 0, 290.66, '2盘'),
(1188, '蛋白', '小海绵修改烘焙百分比', 133, 1599.5, 100, 4650, 0, 290.66, '2盘'),
(1189, '蛋黄', '小海绵修改烘焙百分比', 133, 795.5, 49.75, 4650, 0, 290.66, '2盘'),
(1190, '色拉油', '小海绵修改烘焙百分比', 133, 304, 19, 4650, 0, 290.66, '2盘'),
(1191, '水', '小海绵修改烘焙百分比', 133, 236, 14.75, 4650, 0, 290.66, '2盘'),
(1252, '低粉', '小海绵', 80, 1544, 100, 9300.8, 0, 602.39, '4p'),
(1253, '淀粉', '小海绵', 80, 104.5, 6.74, 9300.8, 0, 602.39, '4p'),
(1254, 'TT', '小海绵', 80, 48, 3.11, 9300.8, 0, 602.39, '4p'),
(1255, '盐', '小海绵', 80, 20.5, 1.3, 9300.8, 0, 602.39, '4p'),
(1256, '香草', '小海绵', 80, 16.5, 1.04, 9300.8, 0, 602.39, '4p'),
(1257, '砂糖1', '小海绵', 80, 1180, 76.42, 9300.8, 0, 602.39, '4p'),
(1258, '砂糖2', '小海绵', 80, 504, 32.64, 9300.8, 0, 602.39, '4p'),
(1259, 'B.P', '小海绵', 80, 13, 0.83, 9300.8, 0, 602.39, '4p'),
(1260, '蛋白', '小海绵', 80, 3200, 207.25, 9300.8, 0, 602.39, '4p'),
(1261, '蛋黄', '小海绵', 80, 1592, 103.11, 9300.8, 0, 602.39, '4p'),
(1262, '色拉油', '小海绵', 80, 608, 39.38, 9300.8, 0, 602.39, '4p'),
(1263, '水', '小海绵', 80, 472, 30.57, 9300.8, 0, 602.39, '4p'),
(1276, '低粉', '小海绵修改烘焙百分比', 133, 1544, 48.25, 9300, 0, 290.66, '4p'),
(1277, '淀粉', '小海绵修改烘焙百分比', 133, 104, 3.25, 9300, 0, 290.66, '4p'),
(1278, 'TT', '小海绵修改烘焙百分比', 133, 48, 1.5, 9300, 0, 290.66, '4p'),
(1279, '盐', '小海绵修改烘焙百分比', 133, 20.5, 0.63, 9300, 0, 290.66, '4p'),
(1280, '香草', '小海绵修改烘焙百分比', 133, 16, 0.5, 9300, 0, 290.66, '4p'),
(1281, '砂糖1', '小海绵修改烘焙百分比', 133, 1180, 36.88, 9300, 0, 290.66, '4p'),
(1282, '砂糖2', '小海绵修改烘焙百分比', 133, 504, 15.75, 9300, 0, 290.66, '4p'),
(1283, 'B.P', '小海绵修改烘焙百分比', 133, 13, 0.4, 9300, 0, 290.66, '4p'),
(1284, '蛋白', '小海绵修改烘焙百分比', 133, 3200, 100, 9300, 0, 290.66, '4p'),
(1285, '蛋黄', '小海绵修改烘焙百分比', 133, 1592, 49.75, 9300, 0, 290.66, '4p'),
(1286, '色拉油', '小海绵修改烘焙百分比', 133, 608, 19, 9300, 0, 290.66, '4p'),
(1287, '水', '小海绵修改烘焙百分比', 133, 472, 14.75, 9300, 0, 290.66, '4p'),
(1288, '低粉', '小海绵3', 135, 386, 48.25, 0, 2325.2, 290.66, ''),
(1289, '淀粉', '小海绵3', 135, 26, 3.25, 0, 2325.2, 290.66, ''),
(1290, 'TT', '小海绵3', 135, 12, 1.5, 0, 2325.2, 290.66, ''),
(1291, '盐', '小海绵3', 135, 5, 0.63, 0, 2325.2, 290.66, ''),
(1292, '香草', '小海绵3', 135, 4, 0.5, 0, 2325.2, 290.66, ''),
(1293, '砂糖1', '小海绵3', 135, 295, 36.88, 0, 2325.2, 290.66, ''),
(1294, '砂糖2', '小海绵3', 135, 126, 15.75, 0, 2325.2, 290.66, ''),
(1295, 'B.P', '小海绵3', 135, 3.2, 0.4, 0, 2325.2, 290.66, ''),
(1296, '蛋白', '小海绵3', 135, 800, 100, 0, 2325.2, 290.66, ''),
(1297, '蛋黄', '小海绵3', 135, 398, 49.75, 0, 2325.2, 290.66, ''),
(1298, '色拉油', '小海绵3', 135, 152, 19, 0, 2325.2, 290.66, ''),
(1299, '水', '小海绵3', 135, 118, 14.75, 0, 2325.2, 290.66, ''),
(1300, '低粉', '小海绵2', 136, 386, 48.25, 0, 2325.2, 290.66, ''),
(1301, '淀粉', '小海绵2', 136, 26, 3.25, 0, 2325.2, 290.66, ''),
(1302, 'TT', '小海绵2', 136, 12, 1.5, 0, 2325.2, 290.66, ''),
(1303, '盐', '小海绵2', 136, 5, 0.63, 0, 2325.2, 290.66, ''),
(1304, '香草', '小海绵2', 136, 4, 0.5, 0, 2325.2, 290.66, ''),
(1305, '砂糖1', '小海绵2', 136, 295, 36.88, 0, 2325.2, 290.66, ''),
(1306, '砂糖2', '小海绵2', 136, 126, 15.75, 0, 2325.2, 290.66, ''),
(1307, 'B.P', '小海绵2', 136, 3.2, 0.4, 0, 2325.2, 290.66, ''),
(1308, '蛋白', '小海绵2', 136, 800, 100, 0, 2325.2, 290.66, ''),
(1309, '蛋黄', '小海绵2', 136, 398, 49.75, 0, 2325.2, 290.66, ''),
(1310, '色拉油', '小海绵2', 136, 152, 19, 0, 2325.2, 290.66, ''),
(1311, '水', '小海绵2', 136, 118, 14.75, 0, 2325.2, 290.66, ''),
(1312, '222', '3333', 137, 2234, 100, 0, 2888, 129.28, ''),
(1313, '2343', '3333', 137, 222, 9.94, 0, 2888, 129.28, ''),
(1314, '233', '3333', 137, 432, 19.34, 0, 2888, 129.28, ''),
(1315, '全蛋', '苏菲', 84, 800, 100, 1818.33, 0, 227.3, '2p'),
(1316, '稳定剂', '苏菲', 84, 7, 0.83, 1818.33, 0, 227.3, '2p'),
(1317, '糖', '苏菲', 84, 300, 37.5, 1818.33, 0, 227.3, '2p'),
(1318, '盐', '苏菲', 84, 3, 0.38, 1818.33, 0, 227.3, '2p'),
(1319, '水', '苏菲', 84, 167, 20.88, 1818.33, 0, 227.3, '2p'),
(1320, '液态', '苏菲', 84, 134, 16.75, 1818.33, 0, 227.3, '2p'),
(1321, '糖粉', '苏菲', 84, 67, 8.38, 1818.33, 0, 227.3, '2p'),
(1322, '低粉', '苏菲', 84, 334, 41.75, 1818.33, 0, 227.3, '2p'),
(1323, 'B.P', '苏菲', 84, 7, 0.83, 1818.33, 0, 227.3, '2p');

-- --------------------------------------------------------

--
-- 表的结构 `recimg`
--

CREATE TABLE IF NOT EXISTS `recimg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recipeId` int(11) NOT NULL,
  `imgpath` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `recimg`
--

INSERT INTO `recimg` (`id`, `recipeId`, `imgpath`) VALUES
(7, 128, 'fileupl/毕业证_2.gif'),
(8, 128, 'fileupl/图片 055.jpg'),
(9, 128, 'fileupl/http_imgload.gif'),
(10, 137, 'fileupl/@Z%SRJD}V}I(QWK`}VBSR$A.JPG'),
(11, 137, 'fileupl/图片 002.jpg'),
(12, 137, 'fileupl/00fd76dd2a40461295ee37a2.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `recipes`
--

CREATE TABLE IF NOT EXISTS `recipes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `instructions` text COLLATE utf8_unicode_ci NOT NULL,
  `cooktime` int(11) NOT NULL,
  `temperatureU` int(11) NOT NULL,
  `temperatureD` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0',
  `type` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=138 ;

--
-- 转存表中的数据 `recipes`
--

INSERT INTO `recipes` (`id`, `name`, `user_id`, `instructions`, `cooktime`, `temperatureU`, `temperatureD`, `deleted`, `type`) VALUES
(76, '糖浆', 1, '', 10, 100, 100, 0, 1),
(80, '小海绵', 1, '', 24, 195, 160, 0, 1),
(84, '苏菲', 1, '分蛋法', 13, 190, 170, 0, 1),
(111, '高糖面团-perfessionalbaking', 1, '', 0, 100, 100, 0, 3),
(113, '爱和自由朋友原方0', 1, '', 0, 100, 100, 0, 3),
(115, '爱和自由朋友原方0-修改加水', 1, '', 0, 100, 100, 0, 3),
(117, '爱和自由朋友原方500', 1, '', 0, 100, 100, 0, 3),
(118, '爱和自由修改加水量种主分开', 1, '', 0, 100, 100, 0, 2),
(119, '工厂老式面包-种主分', 1, '', 0, 100, 100, 0, 2),
(120, '老韩甜面包调整加水量-种主分', 1, '', 0, 100, 100, 0, 2),
(122, '52甜面包-种主分修正', 1, '中种法已广泛应用为面包制作，中种法亦称为第二次搅拌，其功能能使酵母在面团里充分发酵，我们知道酵母最怕糖、盐、油脂。所以，酵母在第一次种面发酵良好，增加水分渗透面粉，使其含水量增加，经过第二次搅拌把气泡打掉，达到柔软、组织细腻的目的！种面的温度环境很重要，发酵时间过头或不足都不能制作出好吃的面包。时间、温度最关键。       面包原材料的特性》一：糖是增色，软度效果。蜂蜜、果糖会更软，二者是软性糖。（还原糖）二：盐是口味，没有放盐的面团会失败。三：奶粉是增加色泽、口感的目的。四：油脂防止老化，没有放油脂的面包很硬，如法包！五：鸡蛋增加膨胀体积。六：水的部分可用牛奶，蔬菜原料，各种水果无PH值酸性度代替。如番茄，香蕉取代水。七：乳制品类，如新鲜奶酪，芝士粉，动物鲜奶油口感会更好。》》》》注：酵母最怕酸性，酸性过高的水果汁会把酵母杀死。  我是按大师一字不差打出来的  现上配方看清楚50斤的量【也就是一包粉】，第一次种面》》鸡蛋：3750克  水：7500克 酵母250克  面粉：35斤【总量的70%】这里我要简单的说一下过程，免得有些新手不懂，1：水，酵母倒入缸内先搅拌均匀{很好搅的}2：加入鸡蛋再搅拌3：加入面粉慢档搅均匀即可，不要猛搅哦，没看到干粉就可以了，呵呵。好了，种面完成了，接下来就是重要的一个过程了：第一次发酵，发酵对温度是要限制的，时间太长太短都不好哦，就像我以前夏天没冰块就搅面，硬是35分钟就发好了，可做出来的面包就是不一样，现在我把温度和发酵时间列出来，呵呵，论坛一好像有，我纳闷了，哪里来的，是我空间抄过来的吗？采用常温水搅拌面团\r\n二、 车间温度（面种温度）\r\n面种温度 种面发酵时间\r\n5℃ 15-18小时\r\n10℃ 10-11小时\r\n15℃ 7-8小时\r\n20℃ 4-5小时\r\n25℃ 120-150分钟\r\n30℃ 60-80分钟\r\n35℃ 30-40分钟\r\n   备注：\r\n1、5-15℃属低温发酵法。（最佳）\r\n2、20-25℃属中温发酵法。（尚可）\r\n3、30-35℃属高温发酵法。（最差）\r\n4、第二次搅拌水温：\r\n   冬天低温以酵法必需用温水在40-60℃操作。\r\n   夏天低温以酵法制水温在5-10℃操作，夏天高温发酵第二次水温，必需全部用碎冰搅拌面团呵呵，现在开始打面了，上配方》》面粉：15斤 糖：4500克 盐：250克 改良剂：75克 奶粉：750克水：2000克 奶油：2500克  过程>>1:糖，盐，改良剂，奶粉，水全部倒入缸内和第一次搅拌的面团一起搅均匀2：加入面粉开始像打一次发酵法一样打至8成面筋。这个不像直接法可以打到10成面筋再加油都可以，呵呵，有点小小的区别3：加入奶油打至10成面筋搞定，呵呵，打面终于完成！！呵呵，是打面完成哦，盖上薄膜自然醒发，冬天45分钟以上，夏天就6分钟就可以了！！！好了好了，可以开始做面包了，分成你想的大小尽情的做吧，呵呵！！    最后说几句：面包的口感好坏面粉是占了55%以上哦，以前在厂用的是金像的面包粉，国内品牌店最受欢迎的面粉，奶油用的南桥的王牌，呵呵，好的配方很简单但是普通店配方加这加那的还是没什么好的口感哦，哎，好累人哦，打字打的我手都发麻了，看了，快顶，呵呵》THE  END  88\r\n\r\n\r\n补充内容 (2012-6-2 15:11):\r\n网友9290778 提醒了我第二次的水是少了，应该是8000克，我之前写的2000克，呵呵，谢谢网名叫9290778 的回帖提醒，谢谢，如果你用的中档面粉，水可能还要少哦！！！！', 0, 100, 100, 0, 2),
(124, '52蛋奶饼', 1, '打甜面包一样，分四十五克一只，手工搓圆，每盘二十四个。根据你自己的环境，可以包红豆，豆沙等等，自己看着办，灵活多样。制作过程了就打面包，进行发酵面不要的太大轻发即可 发酵好了成型盖烤盘， 再入醒发箱醒发差不多一倍大进行烘烤上火210下火170烤到金光色即可', 15, 210, 170, 0, 2),
(128, '333333333', 1, '', 0, 100, 100, 0, 1),
(129, '444444', 1, '333333333', 0, 100, 100, 0, 1),
(131, '555555555', 1, '1111111111100', 0, 100, 100, 0, 1),
(133, '小海绵修改烘焙百分比', 1, '', 24, 195, 160, 0, 1),
(135, '小海绵3', 1, '', 24, 195, 160, 0, 1),
(136, '小海绵2', 1, '', 24, 195, 160, 0, 1),
(137, '3333', 1, '00000000000', 22, 139, 138, 0, 1);

-- --------------------------------------------------------

--
-- 表的结构 `unitqu`
--

CREATE TABLE IF NOT EXISTS `unitqu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tsp` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `g` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=33 ;

--
-- 转存表中的数据 `unitqu`
--

INSERT INTO `unitqu` (`id`, `tsp`, `g`) VALUES
(1, '黄油1大匙', 13),
(2, '黄油1杯', 227),
(3, '人造黄油1大匙', 14),
(4, '人造黄油1杯', 227),
(5, '色拉油1大匙', 14),
(6, '色拉油1杯', 227),
(7, '牛奶1大匙', 14),
(8, '牛奶1杯', 227),
(9, '奶粉1大匙', 6.25),
(10, '蛋(带壳)1个', 60),
(11, '蛋(不带壳)1个', 55),
(12, '蛋黄1个', 20),
(13, '蛋白1个', 35),
(14, '细砂糖1杯', 200),
(15, '糖粉1杯', 130),
(16, '细砂糖1杯', 190),
(17, '粗砂糖1杯', 200),
(18, '糖浆1大匙', 21),
(19, '绵白糖(过筛)1杯', 130),
(20, '面粉1杯', 120),
(21, '玉米粉1大匙', 12.6),
(22, '可可粉1大匙', 7),
(23, '花生酱1大匙', 16),
(24, '蜂蜜1大匙', 21),
(25, '蜂蜜1杯', 340),
(26, '碎干果1杯', 114),
(27, '葡萄干1杯', 170),
(28, '干酵母1小匙', 3),
(29, '盐1小匙', 6),
(30, '泡打粉1小匙', 4),
(31, '小苏打1小匙', 4.7),
(32, '塔塔粉1小勺', 3.2);

-- --------------------------------------------------------

--
-- 表的结构 `units`
--

CREATE TABLE IF NOT EXISTS `units` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `otherUnit` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `gQuantity` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `gPerOU` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `units`
--

INSERT INTO `units` (`id`, `name`, `otherUnit`, `quantity`, `gQuantity`, `gPerOU`) VALUES
(5, '牛奶', 'cc', '326', '350', '1.07362'),
(6, '泡打', '茶匙', '1/4', '2.5', '10'),
(8, '泡打', 'cc', '1/8', '2.2', '17.6'),
(9, '泡打', '茶匙', '1/4', '2.5', '10'),
(10, '泡打', '茶匙', '1/4', '2.5', '10'),
(11, '水', '杯', '1', '411', '411'),
(12, '牛奶', 'cc', '680', '730.0', '1.07362');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`) VALUES
(1, 'bakemaster', 'H6bV^V4l'),
(2, '111111', '111111');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
