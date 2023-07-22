/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

/*!40000 ALTER TABLE `wp_stnc_map_building` DISABLE KEYS */;
INSERT INTO `wp_stnc_map_building` (`id`, `name`, `short_name`, `text_color`, `color`, `global_capacity`, `total_office`, `created_at`, `updated_at`) VALUES
	(1, 'Building 1', '1', '#4A3EA5', '#7066D1', 0, 0, NULL, NULL),
	(2, 'Building 2', '2', '#0574af', '#1895d4', 0, 0, NULL, NULL),
	(3, 'Building 3', '3', '#10a5d4', '#3ed0ff', 0, 0, NULL, NULL),
	(4, 'Building 4', '4', '#19d683', '#33f090', 0, 0, NULL, NULL),
	(5, 'Building 5', '5', '#fb9a0e', '#ffc21f', 0, 0, NULL, NULL);
/*!40000 ALTER TABLE `wp_stnc_map_building` ENABLE KEYS */;

/*!40000 ALTER TABLE `wp_stnc_map_company_categories` DISABLE KEYS */;
INSERT INTO `wp_stnc_map_company_categories` (`id`, `name`, `status`) VALUES
	(1, 'Software', 1),
	(3, 'Energy', 1),
	(4, 'Defense industry', 1),
	(5, 'Design', 1),
	(6, 'Electronic', 1);
/*!40000 ALTER TABLE `wp_stnc_map_company_categories` ENABLE KEYS */;

/*!40000 ALTER TABLE `wp_stnc_map_floors` DISABLE KEYS */;
INSERT INTO `wp_stnc_map_floors` (`id`, `name`, `building_id`, `type`, `full_office`, `empty_office`, `full_area`, `empty_area`, `total_area`, `scheme`, `scheme_media_id`, `created_at`, `updated_at`, `class`, `web_permission`) VALUES
	(4, '1st Floor', 1, 0, 0, 0, 492.50, 0.00, 492.50, 't1-k1.jpg', 1146, NULL, '2018-10-23 06:39:47', '3', '[{"door_number_permission":false,"square_meters_permission":false,"email_permission":false,"phone_permission":false,"mobile_phone_permission":false,"web_site_permission":false,"company_description_permission":false,"address_permission":false}]'),
	(5, '2nd Floor', 1, 0, 0, 0, 487.69, 0.00, 487.69, 't1-k2.jpg', 9844, NULL, '2018-10-23 06:48:10', '4', '[{"door_number_permission":false,"square_meters_permission":false,"email_permission":false,"phone_permission":false,"mobile_phone_permission":false,"web_site_permission":false,"company_description_permission":false,"address_permission":false}]'),
	(6, '3. Floor', 1, 0, 0, 0, 492.50, 0.00, 492.50, 't1-k3.jpg', 9845, NULL, '2018-10-23 07:06:33', '5', '[{"door_number_permission":false,"square_meters_permission":false,"email_permission":false,"phone_permission":false,"mobile_phone_permission":false,"web_site_permission":false,"company_description_permission":false,"address_permission":false}]'),
	(10, '1st Floor', 2, 0, 0, 0, 719.38, 0.00, 719.38, 't2-k1.jpg', 9848, NULL, '2018-08-30 06:52:13', '3', '[{"door_number_permission":false,"square_meters_permission":false,"email_permission":false,"phone_permission":false,"mobile_phone_permission":false,"web_site_permission":false,"company_description_permission":false,"address_permission":false}]'),
	(13, '2nd Floor', 3, 0, 0, 0, 1554.37, 0.00, 1554.37, 't3-k1.jpg', 9850, NULL, '2018-10-23 08:35:07', '3', '[{"door_number_permission":false,"square_meters_permission":false,"email_permission":false,"phone_permission":false,"mobile_phone_permission":false,"web_site_permission":false,"company_description_permission":false,"address_permission":false}]'),
	(14, '1st Floor', 3, 0, 0, 0, 376.49, 0.00, 376.49, 't3-k2.jpg', 9852, NULL, '2018-08-30 07:26:52', '4', '[{"door_number_permission":false,"square_meters_permission":false,"email_permission":false,"phone_permission":false,"mobile_phone_permission":false,"web_site_permission":false,"company_description_permission":false,"address_permission":false}]'),
	(18, '1st Floor', 4, 0, 0, 0, 803.43, 80.67, 884.10, 't4-kat1.jpg', 9856, NULL, '2018-10-23 08:18:50', '3', '[{"door_number_permission":false,"square_meters_permission":false,"email_permission":false,"phone_permission":false,"mobile_phone_permission":false,"web_site_permission":false,"company_description_permission":false,"address_permission":false}]'),
	(19, '2nd Floor', 4, 0, 0, 0, 541.24, 0.00, 541.24, 't4-k2.jpg', 9857, NULL, '2018-10-23 08:04:16', '4', '[{"door_number_permission":false,"square_meters_permission":false,"email_permission":false,"phone_permission":false,"mobile_phone_permission":false,"web_site_permission":false,"company_description_permission":false,"address_permission":false}]'),
	(23, '1st Floor', 5, 0, 0, 0, 1253.57, 0.00, 1253.57, 't5-k1.jpg', 9861, NULL, '2018-08-30 09:54:01', '3', '[{"door_number_permission":false,"square_meters_permission":false,"email_permission":false,"phone_permission":false,"mobile_phone_permission":false,"web_site_permission":false,"company_description_permission":false,"address_permission":false}]'),
	(24, '2nd Floor', 5, 0, 0, 0, 1125.55, 0.00, 1125.55, 't5-k2.jpg', 9862, NULL, '2018-08-30 18:01:45', '4', '[{"door_number_permission":false,"square_meters_permission":false,"email_permission":false,"phone_permission":false,"mobile_phone_permission":false,"web_site_permission":false,"company_description_permission":false,"address_permission":false}]');
/*!40000 ALTER TABLE `wp_stnc_map_floors` ENABLE KEYS */;

/*!40000 ALTER TABLE `wp_stnc_map_floors_locations` DISABLE KEYS */;
INSERT INTO `wp_stnc_map_floors_locations` (`id`, `building_id`, `floor_id`, `company_category_id`, `door_number`, `company_name`, `square_meters`, `email`, `phone`, `mobile_phone`, `web_site`, `map_location`, `company_description`, `address`, `media_id`, `add_date`, `web_permission`, `is_empty`) VALUES
	(1, 1, 4, 16, 5, 'test', '10', 'ssc@yahoo.com', '855 587 5858', '855 587 5858', '855 587 5858', '{\\"left\\":179,\\"top\\":252.60000610351562,\\"width\\":86.86666870117188,\\"height\\":30,\\"x\\":179,\\"y\\":252.60000610351562,\\"right\\":265.8666687011719,\\"bottom\\":282.6000061035156}', '855 587 5858', '855 587 5858', 0, '2022-12-08 11:45:35', '', 0),
	(2, 2, 10, 16, 12, 'test', '10', 'ssc@yahoo.com', '855 587 5858', '855 587 5858', '855 587 5858', '{"left":12,"top":112,"width":82.42500305175781,"height":30,"x":12,"y":112,"right":94.42500305175781,"bottom":142}', 'lorem ipsum', 'lorem ipsum', 0, '2022-12-08 11:47:54', '', 0),
	(3, 3, 13, 16, 12, 'test', '90', 'ssc@yahoo.com', '855 587 5858', '855 587 5858', 'goog.com', '{"left":12,"top":112,"width":82.42500305175781,"height":30,"x":12,"y":112,"right":94.42500305175781,"bottom":142}', 'lorem ipsum lorem ipsum lorem ipsum', 'lorem ipsum lorem ipsum lorem ipsum', 0, '2022-12-08 11:48:41', '', 0),
	(4, 4, 18, 16, 12, 'test', '90', 'ssc@yahoo.com', '855 587 5858', '855 587 5858', 'goog.com', '{"left":12,"top":112,"width":82.42500305175781,"height":30,"x":12,"y":112,"right":94.42500305175781,"bottom":142}', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum', 0, '2022-12-08 11:49:06', '', 0),
	(5, 5, 23, 16, 34, 'yahoo.com', '234', 'test@yahoo.com', '855 587 5858', '855 587 5458', 'yahoo.com', '{"left":12,"top":112,"width":82.42500305175781,"height":30,"x":12,"y":112,"right":94.42500305175781,"bottom":142}', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum', 0, '2022-12-08 11:49:48', '', 0);
/*!40000 ALTER TABLE `wp_stnc_map_floors_locations` ENABLE KEYS */;

/*!40000 ALTER TABLE `wp_stnc_map_floors_locations_off_company` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_stnc_map_floors_locations_off_company` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
