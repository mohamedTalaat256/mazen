-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2024 at 02:31 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tvi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'mohamed ali', 'mido@gmail.com', '$2y$10$SrpF05gZh0RxRHNFfqd.CO4pd3u3fO33KJeW29af5CHFIRIRdcVRm', NULL, '2022-10-11 15:15:18');

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE `amenities` (
  `id` bigint(20) NOT NULL,
  `en_name` varchar(11) NOT NULL,
  `ar_name` varchar(11) NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`id`, `en_name`, `ar_name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'clubs', 'نوادي', 'amenity_clubsamenity_clubhosesclubhouse.png', '2024-07-09 04:10:10', '2024-07-09 04:10:10');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `phone` text NOT NULL,
  `email` text NOT NULL,
  `message` text NOT NULL,
  `project` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `phone`, `email`, `message`, `project`, `created_at`, `updated_at`) VALUES
(6, 'مصطفي', 'wert', 'wert', 'wert', 'thevalueinvestment', '2022-10-11 10:02:57', '2022-10-11 10:02:57');

-- --------------------------------------------------------

--
-- Table structure for table `compounds`
--

CREATE TABLE `compounds` (
  `id` bigint(20) NOT NULL,
  `cover_image` text NOT NULL,
  `en_name` varchar(255) NOT NULL,
  `ar_name` varchar(255) NOT NULL,
  `location_on_map` text NOT NULL,
  `home_background` text NOT NULL,
  `master_plan_image` text NOT NULL,
  `ar_overview` varchar(255) NOT NULL,
  `en_overview` varchar(255) NOT NULL,
  `overview_background` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `area_from` int(11) NOT NULL,
  `area_to` int(11) NOT NULL,
  `ar_location` varchar(255) NOT NULL,
  `en_location` varchar(255) NOT NULL,
  `location_id` bigint(20) NOT NULL,
  `type` varchar(255) NOT NULL,
  `installments` int(11) NOT NULL,
  `payment_plans` int(11) NOT NULL,
  `start_price` double NOT NULL,
  `max_price` double NOT NULL,
  `payment_years` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `compounds`
--

INSERT INTO `compounds` (`id`, `cover_image`, `en_name`, `ar_name`, `location_on_map`, `home_background`, `master_plan_image`, `ar_overview`, `en_overview`, `overview_background`, `status`, `area_from`, `area_to`, `ar_location`, `en_location`, `location_id`, `type`, `installments`, `payment_plans`, `start_price`, `max_price`, `payment_years`, `created_at`, `updated_at`) VALUES
(1, 'SARI_cover_image_carnelia_cover_image.png', 'SARI', 'ساراي', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2442.612077853451!2d31.45566233397857!3d30.026094044564804!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145817082c16d32f%3A0xdd32554012caf391!2sDusit%20Thani%20Lakeview%20Cairo!5e0!3m2!1sen!2seg!4v1720508385405!5m2!1sen!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'SARI_home_carnelia_cover_image.png', 'SARI_master_plan_image.jpg', 'sa', 'as', 'SARI_overview.jpg', 'under construction', 200, 1000, 'القاهرة الجديدة', 'new cairo', 1, 'residential', 10, 12, 2000000, 3000000, 10, '2024-07-09 03:59:54', '2024-07-09 07:17:28');

-- --------------------------------------------------------

--
-- Table structure for table `compound_amenities`
--

CREATE TABLE `compound_amenities` (
  `id` bigint(20) NOT NULL,
  `compound_id` bigint(20) NOT NULL,
  `amenity_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `compound_amenities`
--

INSERT INTO `compound_amenities` (`id`, `compound_id`, `amenity_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2024-07-09 04:10:27', '2024-07-09 04:10:27');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `compound_id` bigint(20) NOT NULL,
  `images` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `compound_id`, `images`, `created_at`, `updated_at`) VALUES
(13, 1, '1720509865El Patio ORO_cover_image.jpg|1720509865El Patio ORO_home.jpg|1720509865El Patio ORO_overview.jpg|1720509865Hyde Park New Cairo_cover_image.jpg|1720509865Hyde Park New Cairo_home.jpg|1720509865Hyde Park New Cairo_overview.png', '2024-07-09 04:24:25', '2024-07-09 04:24:25');

-- --------------------------------------------------------

--
-- Table structure for table `home_sliders`
--

CREATE TABLE `home_sliders` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `caption_big` text NOT NULL,
  `caption_small` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `home_sliders`
--

INSERT INTO `home_sliders` (`id`, `image`, `caption_big`, `caption_small`, `created_at`, `updated_at`) VALUES
(1, 'home_slider_1.png', 'Because We Appreciate<br>\r\nThe Value of Homes', 'We Are Here to Help You Find Your Valuable Home', '2022-10-11 10:14:50', '2022-10-11 10:14:50'),
(2, 'home_slider_2.png', 'Creating real value <br> in property and places', '', '2022-10-11 10:14:50', '2022-10-11 10:14:50'),
(3, 'home_slider_3.png', 'We know how to invest <br> let’s do it together', 'aa', '2022-10-11 10:14:50', '2022-10-11 08:15:23');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) NOT NULL,
  `en_name` varchar(255) NOT NULL,
  `ar_name` varchar(255) NOT NULL,
  `cover_image` text NOT NULL,
  `home_image` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `en_name`, `ar_name`, `cover_image`, `home_image`, `created_at`, `updated_at`) VALUES
(1, 'New Cairo', 'القاهرة الجديدة', 'New Cairojava.jpg', 'New Cairojava.jpg', '2024-07-09 03:56:31', '2024-07-09 03:56:31');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_05_03_235254_create_users_table', 1),
(2, '2021_05_03_235305_create_password_resets_table', 1),
(3, '2021_09_25_214629_create_subprojects_table', 1),
(4, '2021_09_29_182429_create_galleries_table', 1),
(5, '2021_09_30_235258_create_admins_table', 1),
(6, '2021_10_02_011515_create_clients_table', 1),
(7, '2022_10_10_070605_create_project_categories_table', 1),
(8, '2021_09_25_214629_create_projects_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` text NOT NULL,
  `cover_image` text NOT NULL,
  `ar_name` text NOT NULL,
  `en_name` text NOT NULL,
  `background_image` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `type`, `cover_image`, `ar_name`, `en_name`, `background_image`, `created_at`, `updated_at`) VALUES
(1, 'residential', 'residential.png', 'سكني', 'residential', 'residential_home.png', NULL, '2022-10-11 10:03:33'),
(2, 'commercial', 'commercial.png', 'تجاري', 'commercial', 'commercial_home.png', NULL, '2022-10-10 11:43:08'),
(3, 'coastal', 'coastal.png', 'ساحلي', 'coastal', 'coastal_home.png', NULL, '2022-10-10 11:45:55');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` bigint(20) NOT NULL,
  `cover_image` text NOT NULL,
  `en_name` varchar(255) NOT NULL,
  `ar_name` text NOT NULL,
  `location_on_map` text NOT NULL,
  `home_background` text NOT NULL,
  `ar_overview` text DEFAULT NULL,
  `en_overview` text DEFAULT NULL,
  `overview_background` text NOT NULL,
  `master_plan_image` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `area_from` int(11) NOT NULL,
  `area_to` int(11) NOT NULL,
  `ar_location` varchar(255) NOT NULL,
  `en_location` varchar(255) NOT NULL,
  `location_id` bigint(20) NOT NULL,
  `compound_id` bigint(20) NOT NULL,
  `type` varchar(255) NOT NULL,
  `installments` int(11) NOT NULL,
  `payment_plans` int(11) NOT NULL,
  `start_price` int(11) NOT NULL,
  `max_price` int(11) NOT NULL,
  `payment_years` int(11) NOT NULL,
  `bedrooms` int(11) NOT NULL,
  `bathrooms` int(11) NOT NULL,
  `deliverd_in` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `cover_image`, `en_name`, `ar_name`, `location_on_map`, `home_background`, `ar_overview`, `en_overview`, `overview_background`, `master_plan_image`, `status`, `area_from`, `area_to`, `ar_location`, `en_location`, `location_id`, `compound_id`, `type`, `installments`, `payment_plans`, `start_price`, `max_price`, `payment_years`, `bedrooms`, `bathrooms`, `deliverd_in`, `created_at`, `updated_at`) VALUES
(1, 'mohamed_cover_image.png', 'mohamed', 'محمد', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2442.612077853451!2d31.45566233397857!3d30.026094044564804!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145817082c16d32f%3A0xdd32554012caf391!2sDusit%20Thani%20Lakeview%20Cairo!5e0!3m2!1sen!2seg!4v1720508385405!5m2!1sen!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'mohamed_home.png', 'sa', 'as', 'mohamed_overview.png', '', 'constructed', 200, 1000, 'القاهرة الجديدة', 'new cairo', 1, 1, 'residential', 10, 12, 2000000, 3000000, 10, 5, 2, 2024, '2024-07-09 04:17:37', '2024-07-09 04:17:37');

-- --------------------------------------------------------

--
-- Table structure for table `property_amenities`
--

CREATE TABLE `property_amenities` (
  `id` bigint(20) NOT NULL,
  `property_id` bigint(20) NOT NULL,
  `amenity_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `property_galleries`
--

CREATE TABLE `property_galleries` (
  `id` bigint(20) NOT NULL,
  `property_id` bigint(20) NOT NULL,
  `images` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property_galleries`
--

INSERT INTO `property_galleries` (`id`, `property_id`, `images`, `created_at`, `updated_at`) VALUES
(1, 1, '1720524005Fifth Square_cover_image.jpg|1720524005Fifth Square_home.jpg|1720524005Fifth Square_overview.jpg|1720524005Hyde Park New Cairo_cover_image.jpg|1720524005Hyde Park New Cairo_home.jpg|1720524005Hyde Park New Cairo_overview.png', '2024-07-09 08:20:05', '2024-07-09 08:20:05');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `site_logo` text NOT NULL,
  `ar_about` text DEFAULT NULL,
  `en_about` text DEFAULT NULL,
  `phone` text NOT NULL,
  `email` text NOT NULL,
  `en_address` text NOT NULL,
  `ar_address` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_logo`, `ar_about`, `en_about`, `phone`, `email`, `en_address`, `ar_address`, `created_at`, `updated_at`) VALUES
(1, '', NULL, NULL, '+8888888888888', 'thevaluetvi@gmail.com', 'villa 21- akhnatoun st fifth settlement', 'فيلا 21 - شارع أخناتون التجمع الخامس - الحي الخامس', '2022-10-11 10:44:26', '2022-10-11 10:05:58');

-- --------------------------------------------------------

--
-- Table structure for table `subprojects`
--

CREATE TABLE `subprojects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cover_image` text NOT NULL,
  `ar_name` text NOT NULL,
  `en_name` text NOT NULL,
  `home_background` text NOT NULL,
  `ar_overview` text NOT NULL,
  `en_overview` text NOT NULL,
  `overview_background` text NOT NULL,
  `status` text NOT NULL,
  `area_from` text NOT NULL,
  `area_to` text NOT NULL,
  `ar_location` text NOT NULL,
  `en_location` text NOT NULL,
  `type` text NOT NULL,
  `installments` text NOT NULL,
  `down_payment` text NOT NULL,
  `start_price` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subprojects`
--

INSERT INTO `subprojects` (`id`, `cover_image`, `ar_name`, `en_name`, `home_background`, `ar_overview`, `en_overview`, `overview_background`, `status`, `area_from`, `area_to`, `ar_location`, `en_location`, `type`, `installments`, `down_payment`, `start_price`, `created_at`, `updated_at`) VALUES
(1, 'azzar_cover_image.png', 'اّزار', 'azzar', 'azzar_home.png', 'آزار مشروع تطوير جماعي جاهز. تم تصميمه وتقديمه لك من الولايات المتحدة الأمريكية ، مع الكثير من القلب والروح. مع إدراك أن الأسرة السعيدة بحاجة إلى الدعم من خلال بيئة صحية هادئة ، لم يدخر آزار أي نفقات لبناء مجتمع متماسك نابض بالحياة. تم تصميم المخطط الرئيسي والمناظر الطبيعية الخاصة بـ Azzar لتستمتع بأسلوب حياة جميل.\r\n', 'Azzar, a ready group development project. designed and brought to you from the USA, with a lot of heart and soul. with the understanding that a happy family need to be supported by a healthy calming environment, Azzar has spared no expense to build a vibrant cohesive community. Azzar’s master plan and landscape are drawn-up for you to enjoy a beautiful way of living.', 'azzar_overview.png', 'under construction', '170', '306', 'التجمع الخامس\r\n', '5th Settlement\r\n', 'residential', '33333', '333', '22222222', NULL, NULL),
(3, 'one nintey_cover_image.png', 'وان ناينتي', 'one nintey', 'one nintey_home.png', 'يعد وان ناينتي أكثر من مجرد وجهة متعددة الاستخدامات ، حيث تقع عند تقاطع شارع 90 والطريق الدائري. إنها نظرة شاملة على الاكتشاف المتكامل ، حيث توجد كل التفاصيل تم تطويره بالكامل وفقًا لاحتياجاتك ، مما يفرض عليك رحلة لا تنتهي من المؤامرات. درجة جديدة من الاستثنائي ، تدعو جميع أنحاء العالم إلى سياق عالمي واحد حيث تجول الشوارع الوفير وإمكانية الوصول في الغلاف الجوي أمران أساسيان. النتيجة؟ رؤية تقدمية ، تفتخر بمجموعة لا مثيل لها من التميز في الأعمال ، والطبيعة الملهمة ، والضيافة ذات المستوى العالمي ومغامرات الطهي ، تتقنها الكماليات في البيع بالتجزئة في كل نقطة اتصال. واحد تسعون وجهة متعددة الاستخدامات مدورة جيدًا حيث تنبض بالحيوية يضخم وتتضاعف الطاقة.', 'One Ninety is much more than a mixed-use destination,lying at the intersection of 90 street and the Ring Road. It is a holistic outlook on integrated discovery, where every detail is fully-developed around your needs, dictating a never-ending journey of intrigue. A new degree of extraordinary, inviting all corners of the world into one cosmopolitan context where bountiful street wandering and atmospheric accessibility are key. The result? A progressive vision, boasting an unrivaled host of business excellence, inspirational nature, world class hospitality and culinary adventures, perfected by retail luxuries at every touchpoint. One Ninety; a well rounded mixed-use destination where vibrancy amplifies and energy multiplies.', 'one nintey_overview.png', 'under construction', '5555', '17555', 'كفرالزيات', 'kafr elzayat', 'residential', '555', '666', '123', '2022-10-10 08:30:29', '2022-10-10 14:04:45'),
(4, 'carnelia_cover_image.png', 'كارنيليا', 'carnelia', 'carnelia_home.png', 'يعد وان ناينتي أكثر من مجرد وجهة متعددة الاستخدامات ، حيث تقع عند تقاطع شارع 90 والطريق الدائري. إنها نظرة شاملة على الاكتشاف المتكامل ، حيث توجد كل التفاصيل تم تطويره بالكامل وفقًا لاحتياجاتك ، مما يفرض عليك رحلة لا تنتهي من المؤامرات. درجة جديدة من الاستثنائي ، تدعو جميع أنحاء العالم إلى سياق عالمي واحد حيث تجول الشوارع الوفير وإمكانية الوصول في الغلاف الجوي أمران أساسيان. النتيجة؟ رؤية تقدمية ، تفتخر بمجموعة لا مثيل لها من التميز في الأعمال ، والطبيعة الملهمة ، والضيافة ذات المستوى العالمي ومغامرات الطهي ، تتقنها الكماليات في البيع بالتجزئة في كل نقطة اتصال. واحد تسعون وجهة متعددة الاستخدامات مدورة جيدًا حيث تنبض بالحيوية يضخم وتتضاعف الطاقة.', 'One Ninety is much more than a mixed-use destination,lying at the intersection of 90 street and the Ring Road. It is a holistic outlook on integrated discovery, where every detail is fully-developed around your needs, dictating a never-ending journey of intrigue. A new degree of extraordinary, inviting all corners of the world into one cosmopolitan context where bountiful street wandering and atmospheric accessibility are key. The result? A progressive vision, boasting an unrivaled host of business excellence, inspirational nature, world class hospitality and culinary adventures, perfected by retail luxuries at every touchpoint. One Ninety; a well rounded mixed-use destination where vibrancy amplifies and energy multiplies.', 'carnelia_overview.png', 'constructed', '44', '444', 'طنطا', 'tanta', 'coastal', '555', '666', '444', '2022-10-10 14:13:56', '2022-10-10 14:13:56'),
(5, 'Lolo_cover_image.png', 'سسسسسسسسسسسسسسسسسسسس', 'sssssssssssss', 'Lolo_home.png', '5th Settlement\r\nالتجمع الخامس5th Settlement\r\nالتجمع الخامس5th Settlement\r\nالتجمع الخامس5th Settlement\r\nالتجمع الخامس5th Settlement\r\nالتجمع الخامس5th Settlement\r\nالتجمع الخامس5th Settlement\r\nالتجمع الخامس5th Settlement\r\nالتجمع الخامس5th Settlement\r\nالتجمع الخامس', '5th Settlement\r\nالتجمع الخامس5th Settlement\r\nالتجمع الخامس5th Settlement\r\nالتجمع الخامس5th Settlement\r\nالتجمع الخامس5th Settlement\r\nالتجمع الخامس5th Settlement\r\nالتجمع الخامس5th Settlement\r\nالتجمع الخامس5th Settlement\r\nالتجمع الخامس5th Settlement\r\nالتجمع الخامس5th Settlement\r\nالتجمع الخامس5th Settlement\r\nالتجمع الخامس5th Settlement\r\nالتجمع الخامس5th Settlement\r\nالتجمع الخامس', 'Lolo_overview.png', 'under construction', '129', '500', 'الدلنجات', 'El delengat', 'residential', '300', '5000', '120', '2022-10-10 14:40:56', '2022-10-11 10:04:51'),
(6, 'sfgefgesfgse_cover_image.png', 'حصخهفقثحف', 'sfgefgesfgse', 'sfgefgesfgse_home.png', 'يعد وان ناينتي أكثر من مجرد وجهة متعددة الاستخدامات ، حيث تقع عند تقاطع شارع 90 والطريق الدائري. إنها نظرة شاملة على الاكتشاف المتكامل ، حيث توجد كل التفاصيل تم تطويره بالكامل وفقًا لاحتياجاتك ، مما يفرض عليك رحلة لا تنتهي من المؤامرات. درجة جديدة من الاستثنائي ، تدعو جميع أنحاء العالم إلى سياق عالمي واحد حيث تجول الشوارع الوفير وإمكانية الوصول في الغلاف الجوي أمران أساسيان. النتيجة؟ رؤية تقدمية ، تفتخر بمجموعة لا مثيل لها من التميز في الأعمال ، والطبيعة الملهمة ، والضيافة ذات المستوى العالمي ومغامرات الطهي ، تتقنها الكماليات في البيع بالتجزئة في كل نقطة اتصال. واحد تسعون وجهة متعددة الاستخدامات مدورة جيدًا حيث تنبض بالحيوية يضخم وتتضاعف الطاقة.', 'One Ninety is much more than a mixed-use destination,lying at the intersection of 90 street and the Ring Road. It is a holistic outlook on integrated discovery, where every detail is fully-developed around your needs, dictating a never-ending journey of intrigue. A new degree of extraordinary, inviting all corners of the world into one cosmopolitan context where bountiful street wandering and atmospheric accessibility are key. The result? A progressive vision, boasting an unrivaled host of business excellence, inspirational nature, world class hospitality and culinary adventures, perfected by retail luxuries at every touchpoint. One Ninety; a well rounded mixed-use destination where vibrancy amplifies and energy multiplies.', 'sfgefgesfgse_overview.png', 'constructed', '444', '444444', 'شسيبسيب', 'sdewrtwert', 'commercial', '555', '546356', '11111', '2022-10-11 10:08:35', '2022-10-11 10:08:35');

-- --------------------------------------------------------

--
-- Table structure for table `top_compounds`
--

CREATE TABLE `top_compounds` (
  `id` bigint(20) NOT NULL,
  `compound_order` int(11) NOT NULL,
  `compound_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `top_compounds`
--

INSERT INTO `top_compounds` (`id`, `compound_order`, `compound_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2024-07-09 04:01:30', '2024-07-09 04:01:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compounds`
--
ALTER TABLE `compounds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compound_amenities`
--
ALTER TABLE `compound_amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_sliders`
--
ALTER TABLE `home_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_amenities`
--
ALTER TABLE `property_amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_galleries`
--
ALTER TABLE `property_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subprojects`
--
ALTER TABLE `subprojects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `top_compounds`
--
ALTER TABLE `top_compounds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `compounds`
--
ALTER TABLE `compounds`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `compound_amenities`
--
ALTER TABLE `compound_amenities`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `home_sliders`
--
ALTER TABLE `home_sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `property_amenities`
--
ALTER TABLE `property_amenities`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_galleries`
--
ALTER TABLE `property_galleries`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subprojects`
--
ALTER TABLE `subprojects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `top_compounds`
--
ALTER TABLE `top_compounds`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
