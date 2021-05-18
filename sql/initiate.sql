
-- insert trips and itineraries by running this sql 
INSERT INTO `trips` (`category_id`, `user_id` ,`name`, `slug`, `difficulty`, `max_altitude_mtr`, `created_at`, `updated_at`) VALUES
(1, 1, 'Everest Base Camp Trek', 'everest-base-camp-trek', 'medium', 8848, '2021-05-14 13:20:10', '2021-05-14 13:20:10');

INSERT INTO `trips` (`category_id`, `user_id` ,`name`, `slug`, `difficulty`, `max_altitude_mtr`, `created_at`, `updated_at`) VALUES
(1, 1, 'Langtang Valley Trek', 'langtang-valley-trek', 'easy', 8848, '2021-05-13 14:20:10', '2021-05-13 14:20:10');

INSERT INTO `itineraries` (`trip_id`, `day`, `day_title`, `day_max_altitude`, `day_body`, `created_at`, `updated_at`) VALUES
(1, 1, 'Arrival in Kathmandu Airport', 1400, 'Upon Arrival in Kathmandu, our representative will find you at the airport with your name card at the arrival section. After that, we will take you to your hotel', '2021-05-14 13:25:24', '2021-05-14 13:25:24');

INSERT INTO `itineraries` (`trip_id`, `day`, `day_title`, `day_max_altitude`, `day_body`, `created_at`, `updated_at`) VALUES
(2, 1, 'Sightseeing in Kathmandu', 1500, 'Upon Arrival in Kathmandu, our representative will find you at the airport with your name card at the arrival section. After that, we will take you to your hotel', '2021-05-14 13:25:24', '2021-05-14 13:25:24');

INSERT INTO `categories` (`name`, `slug`) VALUES
('trekking', 'trekking'),
('mountaineering', 'mountaineering'),
('tour', 'tour');
