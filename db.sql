DROP TABLE IF EXISTS `visitor`;

CREATE TABLE `visitor` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `view_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `page_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `views_count` int(11) NOT NULL DEFAULT 1,
  `ip_address` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `user_agent` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;