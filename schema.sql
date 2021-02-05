CREATE TABLE `rng`.`log`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` datetime(3) NULL,
  `iterations` bigint NULL,
  `avg` decimal(15, 14) NULL,
  `deviation` decimal(15, 14) NULL,
  PRIMARY KEY (`id`)
);

ALTER TABLE `rng`.`log` 
ADD INDEX `date_index`(`date`) USING BTREE;