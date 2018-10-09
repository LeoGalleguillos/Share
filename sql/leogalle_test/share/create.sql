CREATE TABLE `share` (
    `share_id` int(10) unsigned not null auto_increment,
    `entity_id` int(10) unsigned default null,
    `entity_type_id` int(10) unsigned not null,
    `type_id` int(10) unsigned not null,
    `facebook` int(10) unsigned default '0',
    `twitter` int(10) unsigned default '0',
    PRIMARY KEY (`share_id`),
    UNIQUE `entity_type_id_type_id` (`entity_type_id`, `type_id`)
) CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
