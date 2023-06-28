-- DB作成
CREATE DATABASE `food_nutrients`; /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */


-- 食品群テーブル
CREATE TABLE `food_groups` (
  `id` int NOT NULL AUTO_INCREMENT COMMENT '食品群ID',
  `name` varchar(255) NOT NULL COMMENT '食品群名',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- 食品テーブル
CREATE TABLE `foods` (
  `id` int NOT NULL COMMENT '食品番号',
  `name` varchar(255) NOT NULL COMMENT '食品名',
  `group_id` int NOT NULL COMMENT '食品群ID',
  `index_number` int DEFAULT NULL COMMENT '索引番号',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `foods_ibfk_1` (`group_id`),
  CONSTRAINT `foods_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `food_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- 単位テーブル
CREATE TABLE `units` (
  `id` int NOT NULL AUTO_INCREMENT COMMENT '単位ID',
  `name` varchar(255) DEFAULT NULL COMMENT '単位名',
  `abbreviation` varchar(255) NOT NULL COMMENT '略号',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- 成分テーブル
CREATE TABLE `nutrients` (
  `id` int NOT NULL AUTO_INCREMENT COMMENT '成分ID',
  `name` varchar(255) NOT NULL COMMENT '成分名',
  `unit_id` int NOT NULL COMMENT '単位ID',
  `decimal_places` int DEFAULT NULL COMMENT '小数点以下の桁数',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `nutrients_ibfk_1` (`unit_id`),
  CONSTRAINT `nutrients_ibfk_1` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- 食品成分テーブル
CREATE TABLE `food_nutrients` (
  `food_id` int NOT NULL COMMENT '食品ID',
  `nutrient_id` int NOT NULL COMMENT '成分ID',
  `amount` decimal(8,2) NOT NULL COMMENT '含有量',
  `nutrient_symbol` char(2) DEFAULT NULL COMMENT '成分記号',
  `is_esimation` tinyint(1) NOT NULL COMMENT '推計値の判定',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`food_id`,`nutrient_id`),
  KEY `food_nutrients_ibfk_2` (`nutrient_id`),
  CONSTRAINT `food_nutrients_ibfk_1` FOREIGN KEY (`food_id`) REFERENCES `foods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `food_nutrients_ibfk_2` FOREIGN KEY (`nutrient_id`) REFERENCES `nutrients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;