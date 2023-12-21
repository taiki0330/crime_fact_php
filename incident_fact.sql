-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2023 年 12 月 21 日 23:23
-- サーバのバージョン： 10.4.28-MariaDB
-- PHP のバージョン: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `incident_fact`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `about_fact`
--

CREATE TABLE `about_fact` (
  `id` int(11) NOT NULL,
  `fact` varchar(128) NOT NULL,
  `crime_name` varchar(128) NOT NULL,
  `crime_date` date NOT NULL,
  `crime_time` time NOT NULL,
  `crime_place` varchar(128) NOT NULL,
  `suspect_honseki` varchar(30) NOT NULL,
  `suspect_address` varchar(30) NOT NULL,
  `suspect_work` varchar(20) NOT NULL,
  `suspect_name` varchar(30) NOT NULL,
  `suspect_birthday` varchar(20) NOT NULL,
  `victim_address` varchar(30) NOT NULL,
  `victim_work` varchar(10) NOT NULL,
  `victim_name` varchar(20) NOT NULL,
  `victim_birthday` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `about_fact`
--

INSERT INTO `about_fact` (`id`, `fact`, `crime_name`, `crime_date`, `crime_time`, `crime_place`, `suspect_honseki`, `suspect_address`, `suspect_work`, `suspect_name`, `suspect_birthday`, `victim_address`, `victim_work`, `victim_name`, `victim_birthday`, `created_at`, `updated_at`) VALUES
(9, '　被疑者は、令和５年１２月１９日午後５時００分ころ、福岡市中央区大名１丁目１番１号ジーズアカデミー福岡前路上において、被害者の左頬を右手拳で一回殴打する暴行を加えたもの。', '暴行', '2023-12-19', '17:00:00', '福岡市中央区大名１丁目１番１号ジーズアカデミー福岡前路上', '', '', '', '', '', '0', '', '', '', '2023-12-19 23:17:51', '2023-12-19 23:17:51'),
(10, '　被疑者は、令和５年１２月２０日午後８時３０分ころ、福岡市内いずれかの場所において、乾燥大麻を所持していたもの。', '大麻取締法違反', '2023-12-20', '20:30:00', '福岡市内いずれかの場所', '', '', '', '', '', '0', '', '', '', '2023-12-21 19:48:41', '2023-12-21 19:48:41'),
(11, 'jfaojeaopafaf', 'aefaeafa', '2023-12-06', '00:03:00', 'faefa', 'gargagra', 'efafaefa', 'gsrhshsrh', 'shsrhsrh', 'hsrhshs', 'hrhshrsh', 'shsrhsh', 'hsrhshs', 'hsrhsr', '2023-12-21 23:01:33', '2023-12-21 23:01:33'),
(12, 'faefa', 'faefa', '2023-11-27', '09:47:00', 'fafea', 'faefaf', 'faef', 'faefa', 'afea', 'feafa', 'faefa', 'faefa', 'faefa', 'faefa', '2023-12-22 06:45:08', '2023-12-22 06:45:08'),
(13, 'fhフォえほh', '穂fはオエうぉf', '2023-11-29', '09:58:00', 'ファえアフェ', 'がえらgらg', 'がrがrが', 'rっっgせs', 'gれがが', 'がrがg', 'がrがrg', 'gsrgsgrs', 'gsrgsg', 'gsrgsgr', '2023-12-22 06:56:03', '2023-12-22 06:56:03'),
(14, 'grgargargarg', 'gragara', '2023-12-12', '10:03:00', 'gargar', 'agarg', 'srgagra', 'hsrhshrhtsh', 'hsths', 'hstrhst', 'hstrhs', 'htshst', 'hsthsh', 'hthsht', '2023-12-22 07:00:30', '2023-12-22 07:00:30'),
(15, '　被疑者は、令和５年１２月２２日午前７時３分ころ、福岡市中央区大名１丁目１番１号ジーズアカデミー福岡前路上において、被害者の左頬を右手拳で１回殴打する暴行を加えたもの。', '暴行', '2023-12-22', '07:03:00', '福岡市中央区大名１丁目１番１号ジーズアカデミー福岡前路上', '福岡市東区箱崎１丁目１番地', '福岡市東区箱崎１丁目１番１号', '自称　会社員', 'ジャック・バウアー', '昭和４４年３月１２日', '福岡市東区箱崎２丁目１番１号', '自称　無職', 'ジャック・スパロウ', '昭和５５年４月１日', '2023-12-22 07:05:15', '2023-12-22 07:05:15'),
(16, '　被疑者は、令和５年１２月２２日、午前７時９分ころ、福岡市中央区大名１丁目１番１号ジーズアカデミー福岡前路上において、被害者の左頬を右手拳で１回殴打する暴行を加えたもの。', '暴行', '2023-12-22', '07:09:00', '福岡市中央区大名１丁目１番１号ジーズアカデミー福岡前路上', '福岡市東区箱崎１丁目１番地', '福岡市東区箱崎１丁目１番１号', '自称　会社員', 'ジャック・バウアー', '昭和５５年２月３日生', '福岡市東区箱崎１丁目１番２号', '無職', 'ジャック・スパロウ', '昭和５４年５月２０日生', '2023-12-22 07:12:18', '2023-12-22 07:12:18');

-- --------------------------------------------------------

--
-- テーブルの構造 `comment_table`
--

CREATE TABLE `comment_table` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `comment` text NOT NULL,
  `postdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `comment_table`
--

INSERT INTO `comment_table` (`id`, `username`, `comment`, `postdate`) VALUES
(1, '松﨑', 'コメント', '2023-12-03 00:00:00'),
(2, '鑑識１', '鑑識活動実施', '2023-12-22 05:51:42'),
(3, 'ゴジラ', 'お腹すいた', '2023-12-22 06:19:03'),
(4, 'jin', 'ジンジン', '2023-12-22 06:19:25'),
(5, 'ほげ', 'ほげほげ', '2023-12-22 06:19:40'),
(6, 'totoro', 'nekobasu', '2023-12-22 06:20:18'),
(7, '更新', '更新', '2023-12-22 06:22:59'),
(8, '更新', '更新', '2023-12-22 06:28:15'),
(9, '強行班１−１', '事実と罪名追加', '2023-12-22 06:52:35'),
(10, '強行班１−１', '事実と人定追加', '2023-12-22 06:54:13'),
(11, 'grsgs', 'gsrgs', '2023-12-22 06:56:51'),
(12, 'hsrhsh', 'gせrgsgssrg', '2023-12-22 06:58:20'),
(13, '強行班１−２', '事実と人定事項追加', '2023-12-22 07:05:48'),
(14, '強行班１−１', '犯罪事実と人定事項追加', '2023-12-22 07:13:02');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `about_fact`
--
ALTER TABLE `about_fact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- テーブルのインデックス `comment_table`
--
ALTER TABLE `comment_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `about_fact`
--
ALTER TABLE `about_fact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- テーブルの AUTO_INCREMENT `comment_table`
--
ALTER TABLE `comment_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
