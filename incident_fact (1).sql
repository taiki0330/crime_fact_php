-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2024 年 1 月 05 日 04:04
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
  `section` int(3) NOT NULL,
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

INSERT INTO `about_fact` (`id`, `fact`, `crime_name`, `section`, `crime_date`, `crime_time`, `crime_place`, `suspect_honseki`, `suspect_address`, `suspect_work`, `suspect_name`, `suspect_birthday`, `victim_address`, `victim_work`, `victim_name`, `victim_birthday`, `created_at`, `updated_at`) VALUES
(10, '　被疑者は、令和５年１２月２０日午後８時３０分ころ、福岡市内いずれかの場所において、乾燥大麻を所持していたもの。', '大麻取締法違反', 2, '2023-12-20', '20:30:00', '福岡市内いずれかの場所', '', '', '', '', '', '0', '', '', '', '2023-12-21 19:48:41', '2023-12-21 19:48:41'),
(15, '　被疑者は、令和５年１２月２２日午前７時３分ころ、福岡市中央区大名１丁目１番１号ジーズアカデミー福岡前路上において、被害者の左頬を右手拳で１回殴打する暴行を加えたもの。', '暴行', 1, '2023-12-22', '07:03:00', '福岡市中央区大名１丁目１番１号ジーズアカデミー福岡前路上', '福岡市東区箱崎１丁目１番地', '福岡市東区箱崎１丁目１番１号', '自称　会社員', 'ジャック・バウアー', '昭和４４年３月１２日', '福岡市東区箱崎２丁目１番１号', '自称　無職', 'ジャック・スパロウ', '昭和５５年４月１日', '2023-12-22 07:05:15', '2023-12-22 07:05:15'),
(16, '　被疑者は、令和５年１２月２２日、午前７時９分ころ、福岡市中央区大名１丁目１番１号ジーズアカデミー福岡前路上において、被害者の左頬を右手拳で１回殴打する暴行を加えたもの。', '傷害', 1, '2023-12-22', '07:09:00', '福岡市中央区大名１丁目１番１号ジーズアカデミー福岡前路上', '福岡市東区箱崎１丁目１番地', '福岡市東区箱崎１丁目１番１号', '自称　会社員', 'ジャック・バウアー', '昭和５５年２月３日生', '福岡市東区箱崎１丁目１番２号', '無職', 'ジャック・スパロウ', '昭和５４年５月２０日生', '2023-12-22 07:12:18', '2023-12-28 15:54:56'),
(19, '　被疑者は、令和５年１２月１９日午後１時５０分ころ、福岡市東区東浜１丁目１番１号ゆめタウン博多において、食料品７点を窃取したもの。', '窃盗（万引き）', 3, '2023-12-19', '13:51:00', '福岡市東区東浜１丁目１番１号ゆめタウン博多', '不詳', '不詳', '自称　会社員', '大杉　二郎', '平成２年２月１４日', '福岡市東区東浜１丁目１番１号', '店長', '小池　太郎', '昭和４５年１０月２日', '2024-01-02 00:33:22', '2024-01-03 14:42:09'),
(20, ' 令和６年１月３日午後１時１０分ころ、福岡市中央区大名１丁目１番１号駐車場において、被疑者は、被害者の車両に凹損を加える等器物を損壊させたもの。', '器物損壊', 1, '2024-01-03', '13:10:00', '福岡市中央区大名１丁目１番１号駐車場', '不詳', '不詳', '無職', 'ぱんくん', '昭和６０年１月１日', '福岡市東区箱崎１丁目１番１号', '会社員', '太郎', '平成７年９月３０日', '2024-01-03 08:15:04', '2024-01-03 08:15:04'),
(21, '　令和６年１月３日午後８時００分ころ、福岡市中央区大名１丁目１番１号前路上において、覚醒剤在中のチャック付ポリ袋１点を所持していたもの。', '覚醒剤取締法違反', 2, '2024-01-03', '20:00:00', '福岡市中央区大名１丁目１番１号前路上', '不詳', '福岡市中央区大名１丁目２番１号', '無職', 'チンギス・ハン', '昭和５５年４月３日', 'なし', 'なし', 'なし', 'なし', '2024-01-03 08:19:27', '2024-01-03 08:19:27'),
(22, '　令和６年１月３日午前８時２０分ころ、福岡市東区箱崎１丁目１番１号において、被疑者は同所に侵入のうえ、貴金属等約５点を窃取した、住居侵入・窃盗被疑事件である。', '窃盗（住居侵入）', 3, '2024-01-03', '08:20:00', '福岡市東区箱崎１丁目１番１号', '不詳', '福岡市東区箱崎３丁目１番１号', '無職', 'フビライ・ハン', '昭和４９年４月７日', '福岡市東区箱崎１丁目１番１号', '無職', 'チンギス・ハン', '昭和５５年３月２０日', '2024-01-03 08:24:52', '2024-01-03 08:24:52'),
(23, '　令和６年１月３日午前１時２０分ころ、福岡市中央区大名１丁目１番１号前路上において、被疑者は、被害者の臀部付近を鷲掴みする等した強制わいせつ被疑事件である。', '強制わいせつ', 1, '2024-01-03', '01:20:00', '福岡市中央区大名１丁目１番１号前路上', '不詳', '不詳', '自称　会社員', '変態　まん', '昭和４５年５月４日', '福岡市中央区大名１丁目２番１号', '会社員', '田中　田中', '平成４年３月２９日', '2024-01-03 08:29:51', '2024-01-03 08:29:51'),
(24, '　令和６年１月３日午前８時３５分ころ、福岡市東区箱崎１丁目１番１号において、飲食をした後、代金を支払わず逃走したもの。', '詐欺', 2, '2024-01-03', '08:35:00', '福岡市東区箱崎１丁目１番１号', '不詳', '不詳', '不詳', '不詳', '不詳', '福岡市東区箱崎１丁目１番１号', '店長', '田中　田中', '昭和３５年８月２０日', '2024-01-03 08:39:18', '2024-01-03 08:39:18'),
(26, 'hogehogehhogoehog', '脅迫', 1, '2024-01-03', '14:59:00', 'hgoehogeoh', 'hoge', 'hoge', 'hoge', 'hoge', 'hoge', 'fuga', 'fuga', 'fuga', 'fuga', '2024-01-03 13:00:11', '2024-01-03 13:00:33'),
(27, 'hoge', '建造物侵入', 1, '2024-01-02', '16:35:00', 'hoge', 'hogehoge', 'hogehoge', 'hoge', 'hoge', 'hoge', 'fuga', 'fuga', 'fuga', 'fuga', '2024-01-03 13:36:04', '2024-01-03 13:36:04'),
(28, 'hoge', '名誉毀損', 1, '2023-12-31', '15:41:00', 'hoge', 'hogehoge', 'hogehoge', 'hoge', 'hoge', 'hoge', 'fuga', 'fuga', 'fuga', 'fuga', '2024-01-03 13:37:19', '2024-01-03 13:37:19'),
(29, 'hoge', '殺人未遂', 1, '2024-01-01', '18:43:00', 'hoge', 'hogehoge', 'hogehoge', 'hoge', 'hoge', 'hoge', 'fuga', 'fuga', 'fuga', 'fuga', '2024-01-03 13:38:08', '2024-01-03 13:38:08'),
(30, 'hoge', '傷害', 1, '2024-01-02', '03:40:00', 'hoge', 'hogehoge', 'hogehoeg', 'hoge', 'hoge', 'hoge', 'fuga', 'fuga', 'fuga', 'fuga', '2024-01-03 13:38:58', '2024-01-03 14:17:07'),
(31, 'hoge', '占有離脱物横領', 2, '2024-01-02', '05:35:00', 'hoge', 'hoge', 'hogehoge', 'hoge', 'hgoe', 'hoge', 'fuga', 'fuga', 'fuga', 'fuga', '2024-01-03 13:40:34', '2024-01-03 13:40:34'),
(32, 'hoge', '覚醒剤取締法違反', 2, '2023-12-31', '19:47:00', 'hgoe', 'hoge', 'hogehoge', 'hoge', 'hoge', 'hoge', 'fuga', 'fuga', 'fuga', 'fuga', '2024-01-03 13:41:44', '2024-01-03 13:41:44'),
(33, 'hoge', '窃盗（万引き）', 3, '2024-01-01', '13:42:00', 'hoge', 'hogehoge', 'hogehoge', 'hoge', 'hogeh', 'hoge', 'fuga', 'fuga', 'fuga', 'fuga', '2024-01-03 13:42:41', '2024-01-03 13:42:41'),
(34, 'hoge', '窃盗（事務所荒らし）', 3, '2024-01-01', '16:47:00', 'hoge', 'hoge', 'hoge', 'hoge', 'hoge', 'hoge', 'fuga', 'fuga', 'fuga', 'fuga', '2024-01-03 13:43:39', '2024-01-03 13:43:39'),
(35, 'hoge', '窃盗（仮睡者ねらい）', 3, '2024-01-03', '03:00:00', 'hoge', 'hoge', 'hoge', 'hoge', 'hoge', 'hoge', 'fuga', 'fuga', 'fuga', 'fuga', '2024-01-03 13:52:20', '2024-01-03 13:52:20'),
(36, 'hoge', '窃盗（すり）', 3, '2024-01-02', '13:53:00', 'hoge', 'hogehogehoge', 'hgoehogehoge', 'hoge', 'hoge', 'hoge', 'fugafugafuga', 'fuga', 'fuga', 'fuga', '2024-01-03 13:53:46', '2024-01-03 13:53:46'),
(37, 'hogehogehoge', '大麻取締法違反', 2, '2024-01-02', '23:57:00', 'hoge', 'hogehoge', 'hogehogehoge', 'hoge', 'hoge', 'hoge', 'fugafugafuga', 'fuga', 'fuga', 'fuga', '2024-01-03 13:55:04', '2024-01-03 13:55:04'),
(38, 'hogehogehogehoge', '横領', 2, '2024-01-03', '15:00:00', 'hoge', 'hogehoge', 'hogehoge', 'hoge', 'hoge', 'hgoe', 'fuga', 'fuga', 'fuga', 'fuga', '2024-01-03 13:55:52', '2024-01-03 13:55:52'),
(39, 'hogehogehogehogehoge', '殺人', 1, '2024-01-01', '16:00:00', 'hoge', 'hogehoge', 'hogehoge', 'hoge', 'hoge', 'hoge', 'hoge', 'hoge', 'hoge', 'hoge', '2024-01-03 13:59:05', '2024-01-03 13:59:05'),
(40, 'hogehogehoehogehoge', '詐欺', 2, '2024-01-01', '16:28:00', 'hoge', 'hogehgoe', 'hogehoge', 'hoge', 'ghoe', 'hoge', 'hoge', 'hoge', 'hoge', 'hoge', '2024-01-03 14:23:45', '2024-01-03 14:23:45'),
(41, 'hogehogehogehgoehgoeaehgaoheoa', '詐欺', 2, '2024-01-02', '14:24:00', 'hoge', 'hoge', 'hogehogw', 'hoge', 'hoge', 'hoge', 'hoge', 'hoge', 'hoge', 'hoge', '2024-01-03 14:24:34', '2024-01-03 14:24:34'),
(42, 'hoge', '大麻取締法違反', 2, '2024-01-02', '18:30:00', 'hogehogeohgeohowehoge', 'hoge', 'hoe', 'hoge', 'hgoe', 'hoge', 'hogehogw', 'hgoe', 'hoge', 'hgoe', '2024-01-03 14:25:30', '2024-01-03 14:25:30'),
(43, 'hogehoge', '窃盗（出店荒らし）', 3, '2024-01-02', '15:00:00', 'hogehogehogehoge', 'hoge', 'hgoe', 'hoge', 'hoge', 'hoge', 'hogeh', 'hoge', 'hoge', 'hoge', '2024-01-03 14:41:09', '2024-01-03 14:41:09'),
(44, 'hoge', '窃盗（倉庫荒らし）', 3, '2024-01-02', '16:46:00', 'hogehogehogehoge', 'hoge', 'hoge', 'hoge', 'hoge', 'hoge', 'hoge', 'hoge', 'hoge', 'hoge', '2024-01-03 14:43:20', '2024-01-03 14:43:20');

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
(15, '鑑識２−２', '人相着衣完成', '2024-01-02 18:39:17'),
(16, '鑑識２−１', '現場報告書完成', '2024-01-02 18:39:52'),
(17, '知能犯１−１', '詐欺事件登録', '2024-01-03 12:33:02'),
(18, '薬銃係', '大麻事件登録', '2024-01-03 12:38:42'),
(19, '暴力犯', '窃盗事件削除', '2024-01-03 12:57:39'),
(20, '強行犯3-1', '傷害事件登録', '2024-01-03 13:57:54'),
(21, '鑑識1-2', '現場の報告書完了', '2024-01-03 14:01:42');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- テーブルの AUTO_INCREMENT `comment_table`
--
ALTER TABLE `comment_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
