-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2026. Ápr 29. 18:17
-- Kiszolgáló verziója: 10.4.32-MariaDB
-- PHP verzió: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `bp360`
--
CREATE DATABASE IF NOT EXISTS `bp360` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci;
USE `bp360`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Éttermek', 'restaurants', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(2, 'Látnivalók', 'sights', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(3, 'Éjszakai Élet', 'nightlife', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(4, 'Szállások', 'accomodations', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(5, 'Bevásárlóközpontok', 'malls', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(6, 'Kultúra', 'culture', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(7, 'Események', 'events', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `favourites`
--

DROP TABLE IF EXISTS `favourites`;
CREATE TABLE `favourites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `place_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '2025_12_02_082615_create_categories_table', 1),
(4, '2025_12_02_082630_create_places_table', 1),
(5, '2025_12_02_082644_create_reviews_table', 1),
(6, '2025_12_02_082806_create_multimedia_table', 1),
(7, '2026_02_02_164131_create_favourites_table', 1),
(8, '2026_02_12_125951_create_personal_access_tokens_table', 1),
(9, '2026_03_24_094609_add_role_to_users_table', 1),
(10, '2026_03_24_131754_create_open_times_table', 1),
(11, '2026_03_26_104132_add_new_columns_to_places_table', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `multimedia`
--

DROP TABLE IF EXISTS `multimedia`;
CREATE TABLE `multimedia` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `place_id` bigint(20) UNSIGNED NOT NULL,
  `file_path` varchar(255) NOT NULL DEFAULT 'public/images',
  `file_name` varchar(255) NOT NULL DEFAULT 'placeholder.png',
  `mime_type` varchar(255) NOT NULL DEFAULT 'jpeg',
  `file_size` int(11) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `multimedia`
--

INSERT INTO `multimedia` (`id`, `user_id`, `place_id`, `file_path`, `file_name`, `mime_type`, `file_size`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'public/images', 'gundel-etterem_cover.jpg', 'image/jpeg', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(2, 1, 2, 'public/images', 'virtu-etterem_cover.jpg', 'image/jpeg', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(3, 1, 3, 'public/images', 'stand-etterem_cover.jpg', 'image/jpeg', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(4, 1, 4, 'public/images', 'salt-budapest_cover.jpg', 'image/jpeg', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(5, 1, 5, 'public/images', 'rosenstein-vendeglo_cover.jpg', 'image/jpeg', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(6, 1, 6, 'public/images', 'borkonyha-winekitchen_cover.jpg', 'image/jpeg', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(7, 1, 7, 'public/images', 'babel-budapest_cover.jpg', 'image/jpeg', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(8, 1, 8, 'public/images', 'rumour-by-racz-jeno_cover.jpg', 'image/jpeg', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(9, 1, 9, 'public/images', 'costes-restaurant_cover.jpg', 'image/jpeg', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(10, 1, 10, 'public/images', 'halaszbastya_cover.jpg', 'image/jpeg', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(11, 1, 11, 'public/images', 'orszaghaz_cover.jpg', 'image/jpeg', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(12, 1, 12, 'public/images', 'szent-istvan-bazilika_cover.jpg', 'image/jpeg', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(13, 1, 13, 'public/images', 'hosok-tere_cover.jpg', 'image/jpeg', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(14, 1, 14, 'public/images', 'matyas-templom_cover.jpg', 'image/jpeg', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(15, 1, 15, 'public/images', 'szechenyi-lanchid_cover.jpg', 'image/jpeg', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(16, 1, 16, 'public/images', 'szechenyi-gyogyfurdo_cover.jpg', 'image/jpeg', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(17, 1, 17, 'public/images', 'magyar-allami-operahaz_cover.jpg', 'image/jpeg', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(18, 1, 18, 'public/images', 'dohany-utcai-zsinagoga_cover.jpg', 'image/jpeg', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(19, 1, 19, 'public/images', 'heaven-club_cover.jpg', 'image/jpeg', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(20, 1, 20, 'public/images', 'instant-fogas_cover.jpg', 'image/jpeg', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(21, 1, 21, 'public/images', 'szimpla-kert_cover.jpg', 'image/jpeg', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(22, 1, 22, 'public/images', 'akvarium-klub_cover.jpg', 'image/jpeg', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(23, 1, 23, 'public/images', 'otkert_cover.jpg', 'image/jpeg', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(24, 1, 24, 'public/images', 'morrisons-2_cover.jpg', 'image/jpeg', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(25, 1, 25, 'public/images', 'a38-hajo_cover.jpg', 'image/jpeg', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(26, 1, 26, 'public/images', 'turbina_cover.jpg', 'image/jpeg', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(27, 1, 27, 'public/images', 'doboz-club_cover.jpg', 'image/jpeg', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(28, 1, 28, 'public/images', 'corinthia-hotel-budapest_cover.jpg', 'image/jpeg', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(29, 1, 29, 'public/images', 'anantara-new-york-palace-budapest_cover.jpg', 'image/jpeg', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(30, 1, 30, 'public/images', 'four-seasons-hotel-gresham-palace_cover.jpg', 'image/jpeg', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(31, 1, 31, 'public/images', 'kempinski-hotel-corvinus-budapest_cover.jpg', 'image/jpeg', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(32, 1, 32, 'public/images', 'parisi-udvar-hotel-budapest_cover.jpg', 'image/jpeg', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(33, 1, 33, 'public/images', 'aria-hotel-budapest_cover.jpg', 'image/jpeg', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(34, 1, 34, 'public/images', 'the-ritz-carlton-budapest_cover.jpg', 'image/jpeg', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(35, 1, 35, 'public/images', 'hilton-budapest_cover.jpg', 'image/jpeg', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(36, 1, 36, 'public/images', 'matild-palace-budapest_cover.jpg', 'image/jpeg', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(37, 1, 37, 'public/images', 'intercontinental-budapest_cover.jpg', 'image/jpeg', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(38, 1, 38, 'public/images', 'westend-city-center_cover.jpg', 'image/jpeg', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(39, 1, 39, 'public/images', 'arena-mall_cover.jpg', 'image/jpeg', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(40, 1, 40, 'public/images', 'allee-bevasarlokozpont_cover.jpg', 'image/jpeg', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(41, 1, 41, 'public/images', 'arkad-budapest_cover.jpg', 'image/jpeg', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(42, 1, 42, 'public/images', 'mammut-bevasarlo-es-szorakoztato-kozpont_cover.jpg', 'image/jpeg', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(43, 1, 43, 'public/images', 'mom-park_cover.jpg', 'image/jpeg', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(44, 1, 44, 'public/images', 'corvin-plaza_cover.jpg', 'image/jpeg', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(45, 1, 45, 'public/images', 'etele-plaza_cover.jpg', 'image/jpeg', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(46, 1, 46, 'public/images', 'duna-plaza_cover.jpg', 'image/jpeg', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(47, 1, 47, 'public/images', 'campona_cover.jpg', 'image/jpeg', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(48, 1, 48, 'public/images', 'koki-bevasarlokozpont_cover.jpg', 'image/jpeg', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(49, 1, 49, 'public/images', 'szepmuveszeti-muzeum_cover.jpg', 'image/jpeg', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(50, 1, 50, 'public/images', 'magyar-nemzeti-muzeum_cover.jpg', 'image/jpeg', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(51, 1, 51, 'public/images', 'neprajzi-muzeum_cover.jpg', 'image/jpeg', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(52, 1, 52, 'public/images', 'magyar-zene-haza_cover.jpg', 'image/jpeg', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(53, 1, 53, 'public/images', 'magyar-nemzeti-galeria_cover.jpg', 'image/jpeg', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `opentime`
--

DROP TABLE IF EXISTS `opentime`;
CREATE TABLE `opentime` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `place_id` bigint(20) UNSIGNED NOT NULL,
  `day` enum('everyday','monday','tuesday','wednesday','thursday','friday','saturday','sunday') NOT NULL,
  `opens_at` time NOT NULL,
  `closes_at` time NOT NULL,
  `closed` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `places`
--

DROP TABLE IF EXISTS `places`;
CREATE TABLE `places` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `post_code` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `description` longtext NOT NULL,
  `outdoor_seating` tinyint(1) NOT NULL DEFAULT 0,
  `wifi` tinyint(1) NOT NULL DEFAULT 0,
  `pet_friendly` tinyint(1) NOT NULL DEFAULT 0,
  `family_friendly` tinyint(1) NOT NULL DEFAULT 0,
  `card_payment` tinyint(1) NOT NULL DEFAULT 0,
  `free_parking` tinyint(1) NOT NULL DEFAULT 0,
  `free_entry` tinyint(1) NOT NULL DEFAULT 0,
  `photo_spot` tinyint(1) NOT NULL DEFAULT 0,
  `accessible` tinyint(1) NOT NULL DEFAULT 0,
  `student_discount` tinyint(1) NOT NULL DEFAULT 0,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `clicks` int(11) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `places`
--

INSERT INTO `places` (`id`, `category_id`, `name`, `slug`, `post_code`, `address`, `phone`, `email`, `website`, `description`, `outdoor_seating`, `wifi`, `pet_friendly`, `family_friendly`, `card_payment`, `free_parking`, `free_entry`, `photo_spot`, `accessible`, `student_discount`, `status`, `clicks`, `deleted_at`, `created_at`, `updated_at`, `created_by`) VALUES
(1, 1, 'Gundel Étterem', 'gundel-etterem', 1146, 'Budapest, Gundel Károly út 4.', NULL, NULL, NULL, 'Budapest egyik leghíresebb és legpatinásabb étterme a Városliget szélén.', 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 'approved', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46', NULL),
(2, 1, 'Virtu Restaurant', 'virtu-etterem', 1117, 'Budapest, Dombóvári út 28.', NULL, NULL, NULL, 'Budapest egyik legikonikusabb, Michelin-kalauzban ajánlott étterme, a város legmagasabb épületének tetején.', 0, 1, 0, 0, 1, 0, 0, 0, 1, 0, 'approved', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46', NULL),
(3, 1, 'Stand Étterem', 'stand-etterem', 1061, 'Budapest, Székely Mihály utca 2.', NULL, NULL, NULL, 'Két Michelin-csillagos étterem, amely a magyar gasztronómia klasszikusait gondolja újra modern köntösben, a legkiválóbb hazai alapanyagokra építve.', 0, 1, 0, 0, 1, 0, 0, 0, 1, 0, 'approved', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46', NULL),
(4, 1, 'SALT Budapest', 'salt-budapest', 1053, 'Budapest, Királyi Pál utca 4.', NULL, NULL, NULL, 'Michelin-csillagos élményétterem a Hotel Rum aljában, ahol a természet és a hagyományok találkoznak. Ételeikben a vadon termő gyógynövények kapnak főszerepet.', 0, 1, 0, 0, 1, 0, 0, 0, 1, 0, 'approved', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46', NULL),
(5, 1, 'Rosenstein Vendéglő', 'rosenstein-vendeglo', 1087, 'Budapest, Mosonyi u. 3.', NULL, NULL, NULL, 'Családi tulajdonban lévő, kultikus vendéglő a Keleti pályaudvar közelében, amely a hagyományos magyar és zsidó konyha remekeit kínálja házias, mégis elegáns környezetben.', 0, 1, 0, 0, 1, 0, 0, 0, 1, 0, 'approved', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46', NULL),
(6, 1, 'Borkonyha Winekitchen', 'borkonyha-winekitchen', 1051, 'Budapest, Sas utca 3.', NULL, NULL, NULL, 'Michelin-csillagos étterem és borbár fúziója a Bazilika közelében. A francia bisztrókonyha és a magyar családi vendéglők hangulatát ötvözi, több mint 200 féle borral.', 0, 1, 0, 0, 1, 0, 0, 0, 1, 0, 'approved', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46', NULL),
(7, 1, 'Babel Budapest', 'babel-budapest', 1052, 'Budapest, Piarista köz 2.', NULL, NULL, NULL, 'A magyar és erdélyi hagyományokat kortárs szellemben bemutató Michelin-csillagos étterem. Exkluzív belső tere és természetközeli filozófiája egyedülálló élményt nyújt.', 0, 1, 0, 0, 1, 0, 0, 0, 1, 0, 'approved', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46', NULL),
(8, 1, 'Rumour by Rácz Jenő', 'rumour-by-racz-jeno', 1052, 'Budapest, Petőfi tér 3-5.', NULL, NULL, NULL, 'Rácz Jenő Michelin-csillagos étterme, amely a \"Chef\'s Table\" koncepciót honosította meg itthon. A vendégek egy pult körül ülve, színházi előadásként élvezhetik a vacsorát.', 0, 1, 0, 0, 1, 0, 0, 0, 1, 0, 'approved', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46', NULL),
(9, 1, 'Costes Restaurant', 'costes-restaurant', 1092, 'Budapest, Ráday utca 4.', NULL, NULL, NULL, 'Hazánk első Michelin-csillagos étterme a Ráday utcában. A kompromisszumok nélküli minőség és a nemzetközi színvonalú fine dining úttörője Magyarországon.', 0, 1, 0, 0, 1, 0, 0, 0, 1, 0, 'approved', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46', NULL),
(10, 2, 'Halászbástya', 'halaszbastya', 1014, 'Budapest, Szentháromság tér', NULL, NULL, NULL, 'Lenyűgöző panoráma és neogótikus építészet a Budai Várnegyedben.', 0, 1, 0, 0, 0, 0, 0, 1, 1, 0, 'approved', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46', NULL),
(11, 2, 'Országház', 'orszaghaz', 1055, 'Budapest, Kossuth Lajos tér 1-3', NULL, NULL, NULL, 'Magyarország legnagyobb épülete, a törvényhozás központja és a Szent Korona őrzőhelye.', 0, 1, 0, 0, 0, 0, 0, 1, 1, 0, 'approved', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46', NULL),
(12, 2, 'Szent István Bazilika', 'szent-istvan-bazilika', 1051, 'Budapest, Szent István tér 1', NULL, NULL, NULL, 'Budapest egyik legmagasabb épülete, klasszicista stílusú katolikus bazilika és körkilátó.', 0, 1, 0, 0, 0, 0, 0, 1, 1, 0, 'approved', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46', NULL),
(13, 2, 'Hősök tere', 'hosok-tere', 1146, 'Budapest, Hősök tere', NULL, NULL, NULL, 'A világörökség része, a Millenniumi emlékművel és a hét vezér szobrával.', 0, 1, 0, 0, 0, 1, 0, 1, 1, 0, 'approved', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46', NULL),
(14, 2, 'Mátyás-templom', 'matyas-templom', 1014, 'Budapest, Szentháromság tér 2', NULL, NULL, NULL, 'Történelmi koronázótemplom gótikus stílusban, a Budai Várnegyed szívében.', 0, 1, 0, 0, 0, 0, 0, 1, 1, 0, 'approved', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46', NULL),
(15, 2, 'Széchenyi lánchíd', 'szechenyi-lanchid', 1051, 'Budapest, Széchenyi István tér', NULL, NULL, NULL, 'A Duna első állandó kőhídja, amely összeköti Budát és Pestet, a város egyik legfontosabb jelképe.', 0, 1, 0, 0, 0, 0, 0, 1, 1, 0, 'approved', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46', NULL),
(16, 2, 'Széchenyi Gyógyfürdő', 'szechenyi-gyogyfurdo', 1146, 'Budapest, Állatkerti krt. 9-11', NULL, NULL, NULL, 'Európa egyik legnagyobb fürdőkomplexuma, neobarokk stílusú épületben, híres kültéri medencékkel.', 0, 1, 0, 0, 0, 1, 0, 1, 1, 0, 'approved', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46', NULL),
(17, 6, 'Magyar Állami Operaház', 'magyar-allami-operahaz', 1061, 'Budapest, Andrássy út 22.', NULL, NULL, NULL, 'Ybl Miklós által tervezett neoreneszánsz épület, a magyar opera- és balettjátszás fellegvára az Andrássy úton.', 0, 1, 0, 0, 0, 0, 0, 1, 1, 0, 'approved', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46', NULL),
(18, 2, 'Dohány utcai Zsinagóga', 'dohany-utcai-zsinagoga', 1074, 'Budapest, Dohány u. 2', NULL, NULL, NULL, 'Európa legnagyobb, a világ második legnagyobb zsinagógája, a magyarországi neológ zsidóság központja.', 0, 1, 0, 0, 0, 0, 0, 1, 1, 0, 'approved', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46', NULL),
(19, 3, 'Heaven Club', 'heaven-club', 1073, 'Budapest, Kertész u. 36', NULL, NULL, NULL, 'Népszerű éjszakai klub a belváros szívében, ismert DJ-kkel és élőzenés eseményekkel.', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 'approved', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46', NULL),
(20, 3, 'Instant-Fogas Komplexum', 'instant-fogas', 1073, 'Budapest, Akácfa u. 49-51', NULL, NULL, NULL, 'Budapest legnagyobb parti-komplexuma, amely több romkocsmát és klubot egyesít. Számos tánctérrel, változatos zenei stílusokkal és egyedi, szürreális dekorációval várja a bulizókat.', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 'approved', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46', NULL),
(21, 3, 'Szimpla Kert', 'szimpla-kert', 1075, 'Budapest, Kazinczy u. 14', NULL, NULL, NULL, 'A város legrégebbi és legismertebb romkocsmája. Eklektikus berendezés, labirintusszerű terek, élőzene és utánozhatatlan hangulat jellemzi a Kazinczy utcában.', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 'approved', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46', NULL),
(22, 3, 'Akvárium Klub', 'akvarium-klub', 1051, 'Budapest, Erzsébet tér 12', NULL, NULL, NULL, 'Kulturális központ és szórakozóhely a város szívében, az Erzsébet tér alatt. Híres a kiváló koncertterméről, elektronikus zenei partijairól és a medence alatti teraszáról.', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'pending', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46', NULL),
(23, 3, 'Ötkert', 'otkert', 1051, 'Budapest, Zrínyi u. 4', NULL, NULL, NULL, 'Stílusos klub és bár a Bazilika közelében. Nyáron nyitott tetővel, télen fűtött terekkel, főként R&B, hip-hop és sláger zenékkel vonzza a közönséget.', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 'approved', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46', NULL),
(24, 3, 'Morrison\'s 2', 'morrisons-2', 1055, 'Budapest, Szent István krt. 11', NULL, NULL, NULL, 'Budapest egyik legnagyobb romkocsma-klubja a Nyugati pályaudvar közelében. Híres arról, hogy a hét minden napján nyitva tart, 7 különböző tánctérrel, karaoke teremmel és hatalmas belső udvarral várja a vendégeket.', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 'approved', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46', NULL),
(25, 3, 'A38 Hajó', 'a38-hajo', 1117, 'Budapest, Petőfi híd, budai hídfő', NULL, NULL, NULL, 'A világ egyik legjobb klubjának választott állóhajó a Dunán. Egykori kőszállító hajóból alakították át kulturális központtá, amely koncerteknek, partiknak és étteremnek ad otthont lenyűgöző panorámával.', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 'approved', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46', NULL),
(26, 3, 'Turbina Kulturális Központ', 'turbina', 1082, 'Budapest, Vajdahunyad u. 4', NULL, NULL, NULL, 'Multifunkcionális kulturális tér a 8. kerületben. Nappal kiállítótér és kávézó, éjszaka pedig az underground elektronikus zene egyik legfontosabb bázisa kiváló hangrendszerrel.', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 'approved', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46', NULL),
(27, 3, 'Doboz', 'doboz-club', 1072, 'Budapest, Klauzál u. 10', NULL, NULL, NULL, 'Prémium kategóriás romkocsma és klub a Klauzál utcában. Különlegessége a belső udvaron található hatalmas, King Kongot ábrázoló fa szobor, valamint a két különböző zenei stílust (house, R&B) kínáló tánctér.', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 'approved', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46', NULL),
(28, 4, 'Corinthia Hotel Budapest', 'corinthia-hotel-budapest', 1073, 'Budapest, Erzsébet krt. 43-49', NULL, NULL, NULL, 'Luxus szálloda a belváros szívében, elegáns szobákkal, wellness központtal és kiváló éttermekkel.', 0, 1, 0, 0, 1, 0, 0, 0, 1, 0, 'approved', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46', NULL),
(29, 4, 'Anantara New York Palace Budapest', 'anantara-new-york-palace-budapest', 1073, 'Budapest, Erzsébet krt. 9-11', NULL, NULL, NULL, 'A világ legszebb kávéházának otthont adó luxusszálloda, ahol a történelmi elegancia találkozik a modern kényelemmel.', 0, 1, 0, 0, 1, 0, 0, 0, 1, 0, 'approved', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46', NULL),
(30, 4, 'Four Seasons Hotel Gresham Palace', 'four-seasons-hotel-gresham-palace', 1051, 'Budapest, Széchenyi István tér 5-6', NULL, NULL, NULL, 'Szecessziós műemléképület a Lánchíd lábánál, páratlan dunai panorámával és világszínvonalú szolgáltatásokkal.', 0, 1, 0, 0, 1, 0, 0, 1, 1, 0, 'approved', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46', NULL),
(31, 4, 'Kempinski Hotel Corvinus Budapest', 'kempinski-hotel-corvinus-budapest', 1051, 'Budapest, Erzsébet tér 7-8', NULL, NULL, NULL, 'Modern luxus és gasztronómiai élmények a belváros szívében, karnyújtásnyira a Váci utcától és a Duna-parttól.', 0, 1, 0, 0, 1, 0, 0, 0, 1, 0, 'approved', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46', NULL),
(32, 4, 'Párisi Udvar Hotel Budapest', 'parisi-udvar-hotel-budapest', 1052, 'Budapest, Petőfi Sándor u. 2-4', NULL, NULL, NULL, 'Exkluzív szálloda egy lenyűgöző, mór és gótikus stílusjegyeket ötvöző történelmi épületben, a város egyik legszebb passzázsával.', 0, 1, 0, 0, 1, 0, 0, 1, 1, 0, 'approved', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46', NULL),
(33, 4, 'Aria Hotel Budapest', 'aria-hotel-budapest', 1051, 'Budapest, Hercegprímás u. 5', NULL, NULL, NULL, 'Zenei tematikájú boutique hotel a Szent István Bazilika mellett, egyedülálló tetőtéri bárral és panorámával.', 0, 1, 0, 0, 1, 0, 0, 1, 1, 0, 'approved', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46', NULL),
(34, 4, 'The Ritz-Carlton, Budapest', 'the-ritz-carlton-budapest', 1051, 'Budapest, Erzsébet tér 9-10', NULL, NULL, NULL, 'Időtlen elegancia és modern luxus találkozása a belváros központjában, pár lépésre a Fashion Street-től.', 0, 1, 0, 0, 1, 0, 0, 0, 1, 0, 'approved', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46', NULL),
(35, 4, 'Hilton Budapest', 'hilton-budapest', 1014, 'Budapest, Hess András tér 1-3', NULL, NULL, NULL, 'A Budai Várnegyed szívében, a Halászbástya és a Mátyás-templom közvetlen szomszédságában, lenyűgöző dunai kilátással.', 0, 1, 0, 0, 1, 0, 0, 1, 1, 0, 'approved', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46', NULL),
(36, 4, 'Matild Palace, a Luxury Collection Hotel', 'matild-palace-budapest', 1056, 'Budapest, Váci u. 36', NULL, NULL, NULL, 'Egy UNESCO világörökségi épület újjászületése, amely a Belle Époque hangulatát idézi modern köntösben.', 0, 1, 0, 0, 1, 0, 0, 1, 1, 0, 'approved', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46', NULL),
(37, 4, 'InterContinental Budapest', 'intercontinental-budapest', 1052, 'Budapest, Apáczai Csere János u. 12-14', NULL, NULL, NULL, 'Közvetlenül a Duna-parton elhelyezkedő szálloda, ahonnan a Budai Várra nyíló egyik legszebb kilátás tárul a vendégek elé.', 0, 1, 0, 0, 1, 0, 0, 1, 1, 0, 'approved', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46', NULL),
(38, 5, 'WestEnd City Center', 'westend-city-center', 1062, 'Budapest, Váci út 1-3', NULL, NULL, NULL, 'Az egyik legnagyobb bevásárlóközpont Közép-Európában, több mint 400 üzlettel, éttermekkel és szórakozási lehetőségekkel.', 0, 1, 0, 0, 1, 0, 0, 0, 1, 0, 'approved', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46', NULL),
(39, 5, 'Arena Mall', 'arena-mall', 1087, 'Budapest, Kerepesi út 9', NULL, NULL, NULL, 'Magyarország legnagyobb alapterületű bevásárlóközpontja, amely számos világmárkának és az ország első IMAX mozijának ad otthont.', 0, 1, 0, 0, 1, 0, 0, 0, 1, 0, 'approved', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46', NULL),
(40, 5, 'Allee Bevásárlóközpont', 'allee-bevasarlokozpont', 1117, 'Budapest, Október huszonharmadika utca 8-10', NULL, NULL, NULL, 'Buda egyik legnépszerűbb plázája a XI. kerület szívében, széles divat- és gasztronómiai kínálattal.', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'pending', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46', NULL),
(41, 5, 'Árkád Budapest', 'arkad-budapest', 1106, 'Budapest, Örs vezér tere 25/a', NULL, NULL, NULL, 'A pesti oldal egyik legforgalmasabb bevásárlóközpontja az Örs vezér terén, több mint 200 üzlettel.', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'pending', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46', NULL),
(42, 5, 'Mammut Bevásárló- és Szórakoztató Központ', 'mammut-bevasarlo-es-szorakoztato-kozpont', 1024, 'Budapest, Lövőház u. 2-6', NULL, NULL, NULL, 'A Széna téren található dupla épületes komplexum, amely mozijáról, éttermeiről és központi elhelyezkedéséről ismert.', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'pending', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46', NULL),
(43, 5, 'MOM Park', 'mom-park', 1123, 'Budapest, Alkotás utca 53', NULL, NULL, NULL, 'Prémium kategóriás bevásárlóközpont Budán, exkluzív márkákkal, elegáns környezettel és színvonalas szolgáltatásokkal.', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'pending', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46', NULL),
(44, 5, 'Corvin Plaza', 'corvin-plaza', 1083, 'Budapest, Futó utca 37-45', NULL, NULL, NULL, 'A belvárosi Corvin Sétány része, modern építészettel és könnyű megközelíthetőséggel.', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'pending', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46', NULL),
(45, 5, 'Etele Plaza', 'etele-plaza', 1119, 'Budapest, Hadak útja 1', NULL, NULL, NULL, 'Buda legnagyobb és legmodernebb \"okosplázája\" a Kelenföldi pályaudvar közvetlen szomszédságában.', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'pending', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46', NULL),
(46, 5, 'Duna Plaza', 'duna-plaza', 1138, 'Budapest, Váci út 178', NULL, NULL, NULL, 'Magyarország első bevásárlóközpontja a Váci úti irodafolyosón, moziélménnyel és számos üzlettel.', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'pending', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46', NULL),
(47, 5, 'Campona Bevásárlóközpont', 'campona', 1222, 'Budapest, Nagytétényi út 37-43', NULL, NULL, NULL, 'Családbarát bevásárlóközpont Dél-Budán, amely a Tropicariumnak és a Csodák Palotájának is otthont ad.', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'pending', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46', NULL),
(48, 5, 'KÖKI Bevásárlóközpont', 'koki-bevasarlokozpont', 1191, 'Budapest, Vak Bottyán u. 75. A-C', NULL, NULL, NULL, 'Közvetlen metrókapcsolattal rendelkező bevásárlóközpont Kőbánya-Kispesten, a reptérre vezető út mentén.', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'pending', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46', NULL),
(49, 6, 'Szépművészeti Múzeum', 'szepmuveszeti-muzeum', 1146, 'Budapest, Dózsa György út 41', NULL, NULL, NULL, 'Impozáns épület a Hősök terén, gazdag európai művészeti gyűjteménnyel a középkortól a 20. századig.', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'pending', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46', NULL),
(50, 6, 'Magyar Nemzeti Múzeum', 'magyar-nemzeti-muzeum', 1088, 'Budapest, Múzeum krt. 14-16.', NULL, NULL, NULL, 'Magyarország első nemzeti múzeuma, a magyar történelem tárgyi emlékeinek legfontosabb gyűjtőhelye a klasszicista stílusú palotában.', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'pending', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46', NULL),
(51, 6, 'Néprajzi Múzeum', 'neprajzi-muzeum', 1146, 'Budapest, Dózsa György út 35.', NULL, NULL, NULL, 'A Városliget kapujában álló, díjnyertes modern épület, amely a magyar és nemzetközi népi kultúra kincseit őrzi.', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'pending', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46', NULL),
(52, 6, 'Magyar Zene Háza', 'magyar-zene-haza', 1146, 'Budapest, Olof Palme sétány 3.', NULL, NULL, NULL, 'A Sou Fujimoto által tervezett, természetbe simuló közösségi tér és koncerthelyszín a Városliget szívében.', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'pending', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46', NULL),
(53, 6, 'Magyar Nemzeti Galéria', 'magyar-nemzeti-galeria', 1014, 'Budapest, Szent György tér 2.', '+36 1 234 5678', 'info@bp360.hu', NULL, 'A Budavári Palotában található legnagyobb hazai képzőművészeti gyűjtemény, amely átfogó képet ad a magyar művészet történetéről.', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'pending', 0, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46', NULL);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `place_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text DEFAULT NULL,
  `price_range` enum('2000 - 4000 Ft','4000 - 6000 Ft','6000 - 8000 Ft','8000 - 10000 Ft','10000 Ft felett') DEFAULT NULL,
  `star` tinyint(3) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `place_id`, `comment`, `price_range`, `star`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 10, 1, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 4, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(2, 41, 1, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 5, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(3, 5, 2, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 4, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(4, 23, 2, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 5, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(5, 28, 3, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 4, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(6, 36, 4, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 5, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(7, 48, 5, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 4, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(8, 5, 6, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 4, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(9, 8, 6, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 4, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(10, 11, 7, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 4, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(11, 7, 8, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 5, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(12, 4, 9, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 4, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(13, 10, 9, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 5, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(14, 14, 10, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 4, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(15, 15, 11, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 4, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(16, 28, 12, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 5, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(17, 37, 13, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 5, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(18, 17, 14, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 4, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(19, 44, 14, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 5, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(20, 22, 15, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 5, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(21, 31, 15, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 5, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(22, 28, 16, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 4, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(23, 6, 17, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 4, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(24, 15, 18, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 4, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(25, 41, 18, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 4, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(26, 33, 19, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 5, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(27, 36, 19, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 4, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(28, 6, 20, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 4, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(29, 34, 20, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 4, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(30, 21, 21, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 4, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(31, 43, 21, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 4, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(32, 34, 22, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 4, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(33, 41, 23, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 5, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(34, 23, 24, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 5, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(35, 30, 24, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 5, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(36, 6, 25, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 5, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(37, 30, 25, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 5, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(38, 34, 26, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 4, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(39, 36, 26, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 4, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(40, 7, 27, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 4, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(41, 8, 28, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 4, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(42, 18, 28, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 5, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(43, 18, 29, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 5, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(44, 50, 30, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 4, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(45, 7, 31, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 4, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(46, 47, 31, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 5, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(47, 16, 32, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 4, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(48, 24, 32, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 5, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(49, 22, 33, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 4, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(50, 1, 34, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 4, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(51, 48, 34, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 5, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(52, 1, 35, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 5, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(53, 10, 35, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 5, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(54, 23, 36, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 5, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(55, 4, 37, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 4, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(56, 6, 38, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 5, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(57, 13, 38, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 5, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(58, 13, 39, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 5, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(59, 26, 39, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 5, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(60, 5, 40, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 5, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(61, 31, 40, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 5, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(62, 50, 41, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 4, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(63, 9, 42, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 5, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(64, 33, 42, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 5, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(65, 21, 43, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 4, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(66, 23, 43, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 4, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(67, 23, 44, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 4, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(68, 36, 44, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 4, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(69, 15, 45, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 4, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(70, 3, 46, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 5, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(71, 10, 47, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 5, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(72, 13, 47, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 5, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(73, 1, 48, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 4, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(74, 14, 48, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 4, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(75, 30, 49, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 5, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(76, 28, 50, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 4, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(77, 49, 51, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 4, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(78, 26, 52, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 5, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(79, 30, 53, 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.', NULL, 4, NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@bp360.hu', 'admin', '2026-04-29 16:05:45', '$2y$12$hP6wievFQ63drwOngxBVAuTFqhaRC4nYvGclMlaAHZPWl0vrldSYW', 'ehbIPTP46C', NULL, '2026-04-29 16:05:45', '2026-04-29 16:05:45'),
(2, 'Vallalko_Zoltan', 'owner@bp360.hu', 'owner', '2026-04-29 16:05:45', '$2y$12$AArhNRCT05kWgnn4vEXwQ.egDT.cD/ceBi1ySl1v0LLrBnyEq1S22', 'ACPe4U9vPD', NULL, '2026-04-29 16:05:45', '2026-04-29 16:05:45'),
(3, 'Gipsz_Jakab', 'user@bp360.hu', 'user', '2026-04-29 16:05:46', '$2y$12$lX/ZjUDJ3BEZE7qYTFtgyedXJ3tCXm951m/pAW7zqvkWbUZ4TeBZ2', '0tnQ2weNoh', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(4, 'Prof. Mafalda Douglas', 'zschimmel@example.org', 'user', '2026-04-29 16:05:46', '$2y$12$ZBDNQNztDhzk2zykFpMaXO4mIGpjrW2.cDF4zXjy31iDdTIFtTHH.', 'TE0XlRZG4t', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(5, 'Elsa Deckow', 'zglover@example.com', 'user', '2026-04-29 16:05:46', '$2y$12$ZBDNQNztDhzk2zykFpMaXO4mIGpjrW2.cDF4zXjy31iDdTIFtTHH.', 'gnC82FEK4E', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(6, 'Prof. Oscar Lakin', 'rowe.bell@example.org', 'user', '2026-04-29 16:05:46', '$2y$12$ZBDNQNztDhzk2zykFpMaXO4mIGpjrW2.cDF4zXjy31iDdTIFtTHH.', 'thgwYrwdRu', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(7, 'Raven West', 'thiel.marquis@example.net', 'user', '2026-04-29 16:05:46', '$2y$12$ZBDNQNztDhzk2zykFpMaXO4mIGpjrW2.cDF4zXjy31iDdTIFtTHH.', 'TKSZRON1I1', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(8, 'Mrs. Eliane Kilback DVM', 'ohuel@example.net', 'user', '2026-04-29 16:05:46', '$2y$12$ZBDNQNztDhzk2zykFpMaXO4mIGpjrW2.cDF4zXjy31iDdTIFtTHH.', 'CoPa8peT9S', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(9, 'Prof. Audreanne Labadie', 'columbus50@example.net', 'user', '2026-04-29 16:05:46', '$2y$12$ZBDNQNztDhzk2zykFpMaXO4mIGpjrW2.cDF4zXjy31iDdTIFtTHH.', 'Bn0lO58QtV', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(10, 'Dr. Shane Corwin', 'ksatterfield@example.net', 'user', '2026-04-29 16:05:46', '$2y$12$ZBDNQNztDhzk2zykFpMaXO4mIGpjrW2.cDF4zXjy31iDdTIFtTHH.', 'U5Vu5AtBHB', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(11, 'Mrs. Agnes Ratke', 'ybeer@example.com', 'user', '2026-04-29 16:05:46', '$2y$12$ZBDNQNztDhzk2zykFpMaXO4mIGpjrW2.cDF4zXjy31iDdTIFtTHH.', 'wdwKkx345w', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(12, 'Dr. Alfreda Zemlak', 'hope.turcotte@example.org', 'user', '2026-04-29 16:05:46', '$2y$12$ZBDNQNztDhzk2zykFpMaXO4mIGpjrW2.cDF4zXjy31iDdTIFtTHH.', 'tqaskHHTYu', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(13, 'Murl Russel', 'xolson@example.com', 'user', '2026-04-29 16:05:46', '$2y$12$ZBDNQNztDhzk2zykFpMaXO4mIGpjrW2.cDF4zXjy31iDdTIFtTHH.', 'TiJhu6RBAV', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(14, 'Mr. Wayne Adams DDS', 'rocio52@example.com', 'user', '2026-04-29 16:05:46', '$2y$12$ZBDNQNztDhzk2zykFpMaXO4mIGpjrW2.cDF4zXjy31iDdTIFtTHH.', '5o7WCDgDhk', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(15, 'Elyssa Medhurst II', 'heidi74@example.org', 'user', '2026-04-29 16:05:46', '$2y$12$ZBDNQNztDhzk2zykFpMaXO4mIGpjrW2.cDF4zXjy31iDdTIFtTHH.', 'imwL9w6gbF', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(16, 'Johnathon Smitham', 'mccullough.alena@example.org', 'user', '2026-04-29 16:05:46', '$2y$12$ZBDNQNztDhzk2zykFpMaXO4mIGpjrW2.cDF4zXjy31iDdTIFtTHH.', 'VI4qyYOHcA', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(17, 'Mr. Eduardo Williamson', 'rodolfo.marvin@example.org', 'user', '2026-04-29 16:05:46', '$2y$12$ZBDNQNztDhzk2zykFpMaXO4mIGpjrW2.cDF4zXjy31iDdTIFtTHH.', 'FHwgkaSbXJ', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(18, 'Prof. Sheila Murray DVM', 'zemlak.evalyn@example.net', 'user', '2026-04-29 16:05:46', '$2y$12$ZBDNQNztDhzk2zykFpMaXO4mIGpjrW2.cDF4zXjy31iDdTIFtTHH.', '2BeIQGF8ul', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(19, 'Tabitha Kris', 'ernesto.block@example.com', 'user', '2026-04-29 16:05:46', '$2y$12$ZBDNQNztDhzk2zykFpMaXO4mIGpjrW2.cDF4zXjy31iDdTIFtTHH.', 'be2oGCxCe3', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(20, 'Miss Jakayla Hodkiewicz', 'cummerata.jo@example.net', 'user', '2026-04-29 16:05:46', '$2y$12$ZBDNQNztDhzk2zykFpMaXO4mIGpjrW2.cDF4zXjy31iDdTIFtTHH.', '11GYGd2EV9', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(21, 'Margaret Stark V', 'willy71@example.com', 'user', '2026-04-29 16:05:46', '$2y$12$ZBDNQNztDhzk2zykFpMaXO4mIGpjrW2.cDF4zXjy31iDdTIFtTHH.', 'Xf2pHuDIbw', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(22, 'Amos Farrell', 'nella20@example.org', 'user', '2026-04-29 16:05:46', '$2y$12$ZBDNQNztDhzk2zykFpMaXO4mIGpjrW2.cDF4zXjy31iDdTIFtTHH.', 'JKMsRuLm35', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(23, 'Prof. Cornell Kulas', 'zlind@example.org', 'user', '2026-04-29 16:05:46', '$2y$12$ZBDNQNztDhzk2zykFpMaXO4mIGpjrW2.cDF4zXjy31iDdTIFtTHH.', 'K2gpVvW5Z5', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(24, 'Cornelius Hilpert', 'mia88@example.org', 'user', '2026-04-29 16:05:46', '$2y$12$ZBDNQNztDhzk2zykFpMaXO4mIGpjrW2.cDF4zXjy31iDdTIFtTHH.', '7kZ5RNVUfB', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(25, 'Kallie Cronin', 'kamren.konopelski@example.net', 'user', '2026-04-29 16:05:46', '$2y$12$ZBDNQNztDhzk2zykFpMaXO4mIGpjrW2.cDF4zXjy31iDdTIFtTHH.', 'Am07OW8NQy', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(26, 'Keith Abbott', 'jennyfer.grant@example.com', 'user', '2026-04-29 16:05:46', '$2y$12$ZBDNQNztDhzk2zykFpMaXO4mIGpjrW2.cDF4zXjy31iDdTIFtTHH.', 'X0wqBwTKuB', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(27, 'Hope Bechtelar', 'crawford32@example.com', 'user', '2026-04-29 16:05:46', '$2y$12$ZBDNQNztDhzk2zykFpMaXO4mIGpjrW2.cDF4zXjy31iDdTIFtTHH.', 'FBwFJv2bje', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(28, 'Sophie Jones', 'aaron.steuber@example.net', 'user', '2026-04-29 16:05:46', '$2y$12$ZBDNQNztDhzk2zykFpMaXO4mIGpjrW2.cDF4zXjy31iDdTIFtTHH.', 'TQqprpYviP', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(29, 'Dr. Cassie Zieme', 'trippin@example.net', 'user', '2026-04-29 16:05:46', '$2y$12$ZBDNQNztDhzk2zykFpMaXO4mIGpjrW2.cDF4zXjy31iDdTIFtTHH.', 'UxVcrMTn3u', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(30, 'Keira Runolfsdottir', 'geovanni83@example.com', 'user', '2026-04-29 16:05:46', '$2y$12$ZBDNQNztDhzk2zykFpMaXO4mIGpjrW2.cDF4zXjy31iDdTIFtTHH.', 'dF0egMhdpn', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(31, 'Rupert Orn', 'mclaughlin.jairo@example.net', 'user', '2026-04-29 16:05:46', '$2y$12$ZBDNQNztDhzk2zykFpMaXO4mIGpjrW2.cDF4zXjy31iDdTIFtTHH.', 'xk197DaKpS', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(32, 'Dr. Mae McDermott', 'rosamond.nolan@example.net', 'user', '2026-04-29 16:05:46', '$2y$12$ZBDNQNztDhzk2zykFpMaXO4mIGpjrW2.cDF4zXjy31iDdTIFtTHH.', 'D707XvR9Qi', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(33, 'Maynard Johns V', 'bashirian.lesley@example.net', 'user', '2026-04-29 16:05:46', '$2y$12$ZBDNQNztDhzk2zykFpMaXO4mIGpjrW2.cDF4zXjy31iDdTIFtTHH.', 'UbbGHieCSP', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(34, 'Muhammad Herzog', 'lottie.hilpert@example.net', 'user', '2026-04-29 16:05:46', '$2y$12$ZBDNQNztDhzk2zykFpMaXO4mIGpjrW2.cDF4zXjy31iDdTIFtTHH.', 'OR04nZWHBM', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(35, 'Ms. Sheila Cruickshank', 'mohammad11@example.net', 'user', '2026-04-29 16:05:46', '$2y$12$ZBDNQNztDhzk2zykFpMaXO4mIGpjrW2.cDF4zXjy31iDdTIFtTHH.', 'P3spM7E02E', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(36, 'Alexandria Ondricka', 'rkozey@example.com', 'user', '2026-04-29 16:05:46', '$2y$12$ZBDNQNztDhzk2zykFpMaXO4mIGpjrW2.cDF4zXjy31iDdTIFtTHH.', 'hfAVPPo0oq', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(37, 'Jonathan Hermann V', 'francis08@example.org', 'user', '2026-04-29 16:05:46', '$2y$12$ZBDNQNztDhzk2zykFpMaXO4mIGpjrW2.cDF4zXjy31iDdTIFtTHH.', 'vMpBY534qH', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(38, 'Jazmin Nitzsche', 'jed.franecki@example.org', 'user', '2026-04-29 16:05:46', '$2y$12$ZBDNQNztDhzk2zykFpMaXO4mIGpjrW2.cDF4zXjy31iDdTIFtTHH.', 'kUU2GiG3ay', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(39, 'Camren Anderson', 'kutch.jessika@example.org', 'user', '2026-04-29 16:05:46', '$2y$12$ZBDNQNztDhzk2zykFpMaXO4mIGpjrW2.cDF4zXjy31iDdTIFtTHH.', 'cJpRvYtKgp', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(40, 'Michelle Hane', 'walter01@example.net', 'user', '2026-04-29 16:05:46', '$2y$12$ZBDNQNztDhzk2zykFpMaXO4mIGpjrW2.cDF4zXjy31iDdTIFtTHH.', 'XA4WMBUFNQ', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(41, 'Katarina Conroy', 'jovanny.hyatt@example.com', 'user', '2026-04-29 16:05:46', '$2y$12$ZBDNQNztDhzk2zykFpMaXO4mIGpjrW2.cDF4zXjy31iDdTIFtTHH.', '6z1VdbUfPF', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(42, 'Kiara Nicolas', 'hyatt.dylan@example.net', 'user', '2026-04-29 16:05:46', '$2y$12$ZBDNQNztDhzk2zykFpMaXO4mIGpjrW2.cDF4zXjy31iDdTIFtTHH.', 'M89qhiW2UP', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(43, 'Edd Durgan', 'hayes.alysha@example.com', 'user', '2026-04-29 16:05:46', '$2y$12$ZBDNQNztDhzk2zykFpMaXO4mIGpjrW2.cDF4zXjy31iDdTIFtTHH.', 'xihy709tGO', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(44, 'Mr. Chris Ebert MD', 'cordia.huels@example.org', 'user', '2026-04-29 16:05:46', '$2y$12$ZBDNQNztDhzk2zykFpMaXO4mIGpjrW2.cDF4zXjy31iDdTIFtTHH.', 'yy2AEWy2sR', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(45, 'Deron McClure DVM', 'block.carley@example.org', 'user', '2026-04-29 16:05:46', '$2y$12$ZBDNQNztDhzk2zykFpMaXO4mIGpjrW2.cDF4zXjy31iDdTIFtTHH.', 'ColpbpLvtr', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(46, 'Jeanie Kreiger', 'wkris@example.com', 'user', '2026-04-29 16:05:46', '$2y$12$ZBDNQNztDhzk2zykFpMaXO4mIGpjrW2.cDF4zXjy31iDdTIFtTHH.', 'F0MhTkHhHm', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(47, 'Mrs. Winifred Runte', 'waters.darian@example.net', 'user', '2026-04-29 16:05:46', '$2y$12$ZBDNQNztDhzk2zykFpMaXO4mIGpjrW2.cDF4zXjy31iDdTIFtTHH.', 'M9T2JzTD1B', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(48, 'Elroy Bosco', 'ypouros@example.com', 'user', '2026-04-29 16:05:46', '$2y$12$ZBDNQNztDhzk2zykFpMaXO4mIGpjrW2.cDF4zXjy31iDdTIFtTHH.', 'OGiBxBdT6S', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(49, 'Miss Yasmin Turner Sr.', 'angel57@example.net', 'user', '2026-04-29 16:05:46', '$2y$12$ZBDNQNztDhzk2zykFpMaXO4mIGpjrW2.cDF4zXjy31iDdTIFtTHH.', 'eLH7BBo1fi', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(50, 'Yoshiko Lubowitz', 'labadie.emely@example.net', 'user', '2026-04-29 16:05:46', '$2y$12$ZBDNQNztDhzk2zykFpMaXO4mIGpjrW2.cDF4zXjy31iDdTIFtTHH.', 'wlHaGJWxDd', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(51, 'Mabelle Carroll', 'marquise19@example.net', 'user', '2026-04-29 16:05:46', '$2y$12$ZBDNQNztDhzk2zykFpMaXO4mIGpjrW2.cDF4zXjy31iDdTIFtTHH.', 'XAfRVEhWnS', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(52, 'Destiny McKenzie I', 'alicia98@example.net', 'user', '2026-04-29 16:05:46', '$2y$12$ZBDNQNztDhzk2zykFpMaXO4mIGpjrW2.cDF4zXjy31iDdTIFtTHH.', 'srRcrPVosI', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46'),
(53, 'Delpha Beier Jr.', 'cbartoletti@example.net', 'user', '2026-04-29 16:05:46', '$2y$12$ZBDNQNztDhzk2zykFpMaXO4mIGpjrW2.cDF4zXjy31iDdTIFtTHH.', 'dGfryFw4Lm', NULL, '2026-04-29 16:05:46', '2026-04-29 16:05:46');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- A tábla indexei `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- A tábla indexei `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- A tábla indexei `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favourites_user_id_foreign` (`user_id`),
  ADD KEY `favourites_place_id_foreign` (`place_id`);

--
-- A tábla indexei `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `multimedia`
--
ALTER TABLE `multimedia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `multimedia_user_id_foreign` (`user_id`),
  ADD KEY `multimedia_place_id_foreign` (`place_id`);

--
-- A tábla indexei `opentime`
--
ALTER TABLE `opentime`
  ADD PRIMARY KEY (`id`),
  ADD KEY `opentime_place_id_foreign` (`place_id`);

--
-- A tábla indexei `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- A tábla indexei `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  ADD KEY `personal_access_tokens_expires_at_index` (`expires_at`);

--
-- A tábla indexei `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `places_slug_unique` (`slug`),
  ADD UNIQUE KEY `places_phone_unique` (`phone`),
  ADD UNIQUE KEY `places_email_unique` (`email`),
  ADD KEY `places_category_id_foreign` (`category_id`),
  ADD KEY `places_created_by_foreign` (`created_by`);

--
-- A tábla indexei `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_place_id_foreign` (`place_id`);

--
-- A tábla indexei `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT a táblához `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT a táblához `multimedia`
--
ALTER TABLE `multimedia`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT a táblához `opentime`
--
ALTER TABLE `opentime`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `places`
--
ALTER TABLE `places`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT a táblához `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `favourites`
--
ALTER TABLE `favourites`
  ADD CONSTRAINT `favourites_place_id_foreign` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favourites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Megkötések a táblához `multimedia`
--
ALTER TABLE `multimedia`
  ADD CONSTRAINT `multimedia_place_id_foreign` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `multimedia_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Megkötések a táblához `opentime`
--
ALTER TABLE `opentime`
  ADD CONSTRAINT `opentime_place_id_foreign` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`);

--
-- Megkötések a táblához `places`
--
ALTER TABLE `places`
  ADD CONSTRAINT `places_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `places_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Megkötések a táblához `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_place_id_foreign` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
