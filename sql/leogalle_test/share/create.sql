CREATE TABLE `share` (
    `share_id` int(10) unsigned not null auto_increment,
    `entity_id` int(10) unsigned default null,
    `entity_type_id` int(10) unsigned not null,
    `type_id` int(10) unsigned not null,
    `facebook` int(10) unsigned default null,
    `twitter` int(10) unsigned default null,
    PRIMARY KEY (`share_id`)
) CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
