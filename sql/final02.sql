-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `admins` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1,	3,	NULL,	NULL);

DROP TABLE IF EXISTS `cars`;
CREATE TABLE `cars` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `cars` (`id`, `member_id`, `product_id`, `quan`, `created_at`, `updated_at`) VALUES
(8,	7,	5,	1,	NULL,	NULL),
(10,	7,	4,	1,	NULL,	NULL),
(12,	1,	6,	1,	NULL,	NULL),
(13,	1,	5,	1,	NULL,	NULL);

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `favorites`;
CREATE TABLE `favorites` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `favorites` (`id`, `product_id`, `member_id`, `created_at`, `updated_at`) VALUES
(1,	4,	2,	NULL,	NULL),
(2,	5,	2,	NULL,	NULL),
(5,	2,	3,	NULL,	NULL),
(6,	5,	3,	NULL,	NULL),
(7,	7,	3,	NULL,	NULL),
(9,	6,	3,	NULL,	NULL),
(11,	1,	10,	NULL,	NULL),
(15,	1,	9,	NULL,	NULL),
(16,	2,	10,	NULL,	NULL),
(17,	4,	10,	NULL,	NULL),
(18,	5,	10,	NULL,	NULL),
(19,	6,	10,	NULL,	NULL),
(20,	7,	10,	NULL,	NULL),
(21,	8,	10,	NULL,	NULL),
(22,	9,	10,	NULL,	NULL),
(23,	10,	10,	NULL,	NULL),
(24,	8,	10,	NULL,	NULL),
(26,	2,	1,	NULL,	NULL),
(27,	6,	1,	NULL,	NULL),
(28,	4,	1,	NULL,	NULL),
(29,	5,	1,	NULL,	NULL),
(31,	1,	1,	NULL,	NULL);

DROP TABLE IF EXISTS `members`;
CREATE TABLE `members` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `members` (`id`, `created_at`, `updated_at`, `user_id`, `tel`) VALUES
(1,	NULL,	NULL,	2,	'0912345678'),
(2,	NULL,	NULL,	3,	'0987654321'),
(6,	NULL,	NULL,	7,	'000'),
(9,	NULL,	NULL,	8,	'0157959594'),
(10,	NULL,	NULL,	9,	'0520267502'),
(11,	NULL,	NULL,	10,	'0481869629');

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_resets_table',	1),
(3,	'2014_10_12_200000_add_two_factor_columns_to_users_table',	1),
(4,	'2019_08_19_000000_create_failed_jobs_table',	1),
(5,	'2019_12_14_000001_create_personal_access_tokens_table',	1),
(6,	'2021_12_17_112724_create_sessions_table',	1),
(7,	'2021_12_17_113949_create_orders_table',	1),
(8,	'2021_12_17_114318_create_members_table',	1),
(9,	'2021_12_17_114428_create_admins_table',	1),
(10,	'2021_12_17_114513_create_cars_table',	1),
(11,	'2021_12_17_114616_create_products_table',	1),
(12,	'2021_12_17_114710_create_favorites_table',	1);

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `quan` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `orders` (`id`, `member_id`, `product_id`, `total`, `quan`, `date`, `status`, `created_at`, `updated_at`) VALUES
(1,	1,	1,	650,	0,	'2021-12-21',	1,	NULL,	NULL),
(3,	2,	2,	808,	0,	'2021-12-21',	1,	NULL,	NULL),
(4,	2,	5,	1140,	0,	'2021-12-22',	1,	NULL,	NULL),
(5,	2,	4,	398,	0,	'2021-12-22',	1,	NULL,	NULL),
(6,	2,	4,	199,	0,	'2021-12-25',	1,	NULL,	NULL),
(7,	2,	5,	760,	0,	'2021-12-25',	1,	NULL,	NULL),
(8,	2,	1,	1300,	0,	'2021-12-25',	1,	NULL,	NULL),
(9,	2,	5,	760,	0,	'2021-12-25',	1,	NULL,	NULL),
(10,	2,	6,	690,	0,	'2021-12-26',	1,	NULL,	NULL),
(11,	2,	2,	3232,	0,	'2021-12-26',	1,	NULL,	NULL),
(12,	2,	1,	650,	0,	'2021-12-26',	1,	NULL,	NULL),
(13,	10,	1,	1950,	0,	'2021-12-29',	1,	NULL,	NULL),
(16,	9,	1,	1300,	0,	'2021-12-29',	1,	NULL,	NULL),
(17,	1,	1,	650,	0,	'2022-01-01',	1,	NULL,	NULL),
(18,	1,	1,	650,	0,	'2022-01-01',	1,	NULL,	NULL),
(19,	1,	2,	808,	0,	'2022-01-09',	1,	NULL,	NULL),
(20,	1,	1,	1300,	1,	'2022-01-09',	0,	NULL,	NULL);

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `quan` int(11) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `products` (`id`, `name`, `type`, `price`, `quan`, `content`, `pic`, `status`, `created_at`, `updated_at`) VALUES
(1,	'六福村主題遊樂園',	'主題樂園',	650,	10,	'●平假日皆可使用 \r\n\r\n●千萬打造5D數位互動體感劇院 \r\n\r\n●優惠期至2021年12月31日止，逾期補價差',	'p1.jpg',	1,	NULL,	NULL),
(2,	'台中麗寶樂園+麗寶天空之夢摩天輪門票(組合優惠)',	'主題樂園',	808,	2,	'台中麗寶樂園!! 升等水陸雙園聯合+250\r\n台中月眉馬拉灣有東 南 亞第一座可造出2.4米高浪的大型露天人工造浪池的[大海嘯]，月眉主題探索樂園擁有許多遊樂設施，例如碰碰車、摩天輪、台中旅遊后里月眉馬拉灣的最佳主題樂園、水上樂園、遊樂園。\r\n\r\n探索樂園(營運時間：週一至週五09:30~17:00、週六日09:30~20:00)\r\n\r\n適合全年齡層的夢想歡樂王國，共分為3大主題園區：POPA歡樂王國、魔法森林及冒險天堂，32項遊樂設施、3大劇院、異國風味美食。\r\n☆部落客首推親子友善樂園！提供多項小小孩遊樂設施及劇場表演\r\n☆國際媒體評比最刺激！全球唯一斷軌式雲霄飛車-搶救地心，帶你深入地心冒險\r\n☆百萬網友肯定「最台最美星光樂園」滿天星空映入眼簾，享受浪漫的寧靜時光，欣賞全年度週末絢爛煙火秀',	'p2.jpg',	1,	NULL,	NULL),
(3,	'【劍湖山世界】主題樂園入園門票入場券2張',	'主題樂園',	920,	5,	'★一票玩到底(投幣式及另需付費的設施除外)\r\n\r\n★不分平日、假日、寒假、暑假都可免費使用不需再加價\r\n★憑本券至售票口兌換電子票卡並須於當日入園\r\n\r\n\r\n\r\n摩天樂園:VR大白鯊、天女散花、彩虹摩天輪、迴旋磁場、衝瘋飛車、擎天飛梭、寶藏哈哈列車、淘氣Bee Bee、超級戰斧…等。\r\n\r\n兒童王國:VR恐龍飛車、皇家馬車、飛天法寶、嘟嘟車、百戰嚕啦啦、歡樂金銀島、兒童蛙娃機。\r\n\r\n小威的海盜村:北海星空-鏡迷宮、航海故事館、小威的家、維京舞台。\r\n\r\n小威的海盜村水樂園:龍捲風、大碗公、威京海灘、大船塢、鑽石浪、小威漂漂河、飛越巨浪。\r\n\r\n園區內還有多場表演秀。\"\r\n\r\n鑑賞期內聯絡原購買單位，逾鑑賞期恕不受理。',	'p3.jpg',	0,	NULL,	NULL),
(4,	'貓・美術館 線上展 走進喵次元',	'展覽',	199,	6,	'展覽日期：2021年9月17日至2022年3月31日\r\n票價：全票199元\r\n主辦單位：HTC宏達國際電子股份有限公司、大日本印刷株式會社、聯合數位文創',	'p4.jpg',	1,	NULL,	NULL),
(5,	'teamLab 未來遊樂園&與花共生的動物們',	'展覽',	380,	2,	'假日看展：採「現場抽號碼牌+預約制」並行。\r\n\r\n平日看展：不需預約，可至科教館「現場抽號碼牌」排隊入場。\r\n\r\n詳情請參官網、粉絲團',	'p5.jpg',	1,	NULL,	NULL),
(6,	'Pingu企鵝家族的誕生：40週年巡迴特展',	'展覽',	230,	10,	'展覽日期：2022/1/28(五)-2022/5/1(日) \r\n開放時間：非寒假之平日09:00-17:00，16:30停止售票及入場 \r\n假日及寒假09:00-18:00，17:30停止售票及入場\r\n展覽地點：國立臺灣科學教育館7樓西側特展區\r\n',	'p6.jpg',	1,	NULL,	NULL),
(7,	'2022 SKM PHOTO新光三越國際攝影聯展',	'展覽',	200,	7,	'2022 SKM PHOTO\r\n新光三越國際攝影聯展系列活動\r\n再次踏上旅程，重載世界的光景\r\n\r\n展區分為A區免費參觀與B區購票入場，包含：與美國紐約Anastasia Photo藝廊共同聯手，邀請英國紀實攝影師－克萊爾・托馬斯 Claire Thomas首度來台展出三大系列與全球首度發表新作，以及於國際競賽獲獎無數、探索世界盡頭的極境旅行攝影師－馬賽 Kyo，透過攝影師的鏡頭探尋久違的自然美景、走訪世界的每個角落；現場另展出今年新光三越國際攝影大賽精彩得獎作品與年度攝影大賽首獎得主－童立攝影個展等共25位攝影師、百幅精彩影像故事，邀您親臨感受影像的絕妙魅力......》',	'p7.jpg',	1,	NULL,	NULL),
(8,	'《引言》電影預售票',	'電影',	350,	2,	'★ 2021柏林影展 最佳劇本獎\n★「亞洲伍迪艾倫」南韓名導洪常秀繼《逃亡的女人》後電影美學世界觀再升級，再度聯手「謬思女神」金珉禧及固定班底，細膩詮釋出走男子的掙扎心境\n★ 媲美《夢想之地》成為今年國際影壇南韓電影話題作！上次談在愛情裡出走的堅毅女性，這次改聊心境細膩的敏感男性\n★ 電影特別在德國柏林取景，除了擅長的愛情題材，這次在片中亦刻劃了父子、母女和母子等親情關係，並節制使用招牌式的鏡頭變焦，僅透過黑白攝影更具巧思地首次呈現在感情中受傷的年輕男子心思\n\n三段敘事、細膩男子、蕩心時刻，愛情也可以讓男人心醉心碎…',	'p8.jpg',	1,	NULL,	NULL),
(9,	'【尋找神話之鳥】電影預售票',	'電影',	230,	3,	'★【老鷹想飛】台灣資深生態攝影大師梁皆得，耗時20年動人力作！\r\n★ 跨越六國拍攝，消失60年神話之鳥「黑嘴端鳳頭燕鷗」現身大銀幕！\r\n★ 金馬獎最佳原創電影音樂獎得主林強操刀全片配樂！\r\n★ 邀集各國學者專家現身說法，帶領觀眾更加理解候鳥生態！\r\n★ 透過瀕臨絕種神話之鳥，反思環境汙染、生態浩劫等諸多議題！',	'p9.jpg',	1,	NULL,	NULL),
(10,	'《名偵探柯南：大怪獸哥梅拉VS假面超人》電影預售票',	'電影',	250,	4,	'因受邀參加新辦公大樓落成紀念電影《大怪獸哥梅拉VS假面超人》的製作發表會，柯南等人來到大阪的日賣電視台。\r\n製作發表期間，幹練的製作人米倉在倉庫發生意外，遭巨大的怪獸模型壓倒死亡。支撐模型的繩索被人用刀子割斷，隸屬大阪府警的大瀧警官將之視為命案而非意外並展開搜查。\r\n\r\n嫌犯鎖定為米倉的三名下屬，但是……。',	'p10.jpg',	1,	NULL,	NULL);

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('vkLLTEeKkWgbDDYnnBw96MIBrxtQ6Zt8x5Sel3iJ',	2,	'::1',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36',	'YTo1OntzOjY6Il90b2tlbiI7czo0MDoieklTSXhJdUs0Nk9WRzIzcGdjNUc3UkN5RnNqZHFZVXBzeGJmdGtKeSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCROcGR5dzhjVkZMNnVVaFU4R1lEMHh1U3hlaFd4RDNXVHF5ZE1LR1UxSWZHWlM4a3pDOENNeSI7fQ==',	1641709724);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) unsigned DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `type`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(2,	'Mina',	'mina1@gmail.com',	NULL,	'$2y$10$Npdyw8cVFL6uUhU8GYD0xuSxehWxD3WTqydMKGU1IfGZS8kzC8CMy',	0,	NULL,	NULL,	NULL,	NULL,	NULL,	'2021-12-19 05:21:23',	'2021-12-19 05:21:23'),
(3,	'test2',	'2@gmail.com',	NULL,	'$2y$10$ByBXI584zoeHkM7954UYauVLTvIweL6wYLqdsjpxuO8iW6SnU9uRe',	0,	NULL,	NULL,	NULL,	NULL,	NULL,	'2021-12-19 05:35:20',	'2021-12-19 05:35:20'),
(4,	'Admin',	'admin@gmail.com',	NULL,	'$2y$10$s70Dhke259aGPgpJ1Sfifu11bnKevzyN7PYkSQbKyt6UngRbVLkni',	1,	NULL,	NULL,	NULL,	NULL,	NULL,	'2021-12-19 05:38:37',	'2021-12-19 05:38:37'),
(7,	'33',	'3@gmail.com',	NULL,	'$2y$10$hkp/oMB/vIx.mkJ8DsRZ2uutguaeswxK9RXOfbXHXiIpUUhlK2GdS',	0,	NULL,	NULL,	NULL,	NULL,	NULL,	'2021-12-27 05:43:36',	'2021-12-27 05:43:36'),
(8,	'55',	'5@gmail.com',	NULL,	'$2y$10$GiyUA4FYL.o3/z67LHObd.LRfAmEAhYoJ1EYQhiaw.9Dzjo/rUUwy',	0,	NULL,	NULL,	NULL,	NULL,	NULL,	'2021-12-27 05:50:02',	'2021-12-27 05:50:02'),
(9,	'66',	'6@gmail.com',	NULL,	'$2y$10$U0jn5nxmBSsZJF2rDomsY.S61RNkhShtYGCaTmsm/U/gI3d8SjXXu',	0,	NULL,	NULL,	NULL,	NULL,	NULL,	'2021-12-27 06:06:48',	'2021-12-27 06:06:48'),
(10,	'77',	'77@gmail.con',	NULL,	'$2y$10$cMSAAgeiVHRNwWRdMk5PGOnscHcbFe0SyvTFTwOnw.EMi0vfLOnUe',	0,	NULL,	NULL,	NULL,	NULL,	NULL,	'2021-12-28 17:13:10',	'2021-12-28 17:13:10');

-- 2022-01-09 07:38:30
