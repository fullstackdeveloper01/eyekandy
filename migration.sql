ALTER TABLE `users` ADD `user_ref` VARCHAR(100) NULL DEFAULT NULL AFTER `active`;

ALTER TABLE `restorants` ADD `restorant_ref` VARCHAR(100) NULL DEFAULT NULL AFTER `radius`;

ALTER TABLE `orders` ADD `order_ref` INT(100) NULL DEFAULT NULL AFTER `item_image`;

ALTER TABLE `orders` ADD `order_json` VARCHAR(5000) NULL DEFAULT NULL AFTER `order_ref`, ADD `item_name` VARCHAR(500) NULL DEFAULT NULL AFTER `order_json`, ADD `item_image` VARCHAR(500) NULL DEFAULT NULL AFTER `item_name`;

ALTER TABLE `orders` CHANGE `order_ref` `order_ref` VARCHAR(100) NULL DEFAULT NULL;

ALTER TABLE `users` CHANGE `api_token` `api_token` VARCHAR(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;

ALTER TABLE `restorants` CHANGE `address` `address` VARCHAR(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;



ALTER TABLE `status` ADD `created_at` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `alias`, ADD `updated_at` DATETIME NOT NULL AFTER `created_at`;
ALTER TABLE `status` ADD `active` TINYINT(1) NOT NULL DEFAULT '1' AFTER `updated_at`;


ALTER TABLE `orders` CHANGE `order_json` `order_json` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;
ALTER TABLE `orders` ADD `total_price` DOUBLE(8,2) NULL DEFAULT NULL AFTER `item_image`;
ALTER TABLE `restorants` CHANGE `restorant_ref` `restorant_ref` VARCHAR(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;

ALTER TABLE `orders` ADD `item_json` TEXT NULL AFTER `total_price`;

/*06-09-2021*/
ALTER TABLE `users` ADD `otp` INT(11) NULL AFTER `user_ref`, ADD `otp_generation_time` TIMESTAMP NULL AFTER `otp`;

ALTER TABLE `users` ADD `role` INT(11) NOT NULL AFTER `otp_generation_time`;
ALTER TABLE `users` CHANGE `name` `name` VARCHAR(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL, CHANGE `email` `email` VARCHAR(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;

/*10-09-2021*/
ALTER TABLE `driver_details` ADD `lat` VARCHAR(191) NULL AFTER `residential_address`;
ALTER TABLE `driver_details` ADD `long` VARCHAR(191) NULL AFTER `lat`;
ALTER TABLE `driver_details` ADD `aadhar_card` TEXT NULL AFTER `aadhar_card_no`;
ALTER TABLE `driver_details` ADD `delivery_mode` VARCHAR(50) NULL DEFAULT NULL AFTER `long`;


ALTER TABLE `pickhours` ADD `minimum_compulsary_time` INT NULL DEFAULT NULL AFTER `delivery_price`;
ALTER TABLE `pickhours` ADD `including_peak_hours` INT NULL DEFAULT NULL AFTER `minimum_compulsary_time`;

/*16-09-2021*/

ALTER TABLE `driver_details` ADD `step` INT(11) NULL AFTER `delivery_mode`;
ALTER TABLE `driver_details` ADD `city` INT(11) NULL AFTER `step`, ADD `zone_area` INT(11) NULL AFTER `city`;
ALTER TABLE `driver_details` ADD `vehicle_type` VARCHAR(50) NULL AFTER `zone_area`;

/**17-09-2021*/

ALTER TABLE `users` ADD `device_key` VARCHAR(255) NULL AFTER `role`;
ALTER TABLE `users` ADD `device_id` VARCHAR(255) NULL DEFAULT NULL AFTER `device_key`, ADD `device_type` ENUM('android','ios') NULL DEFAULT NULL AFTER `device_id`;



/*18-09-2021*/
ALTER TABLE `driver_details` ADD `middle_name` VARCHAR(255) NULL AFTER `shift`, ADD `isPermanent` BOOLEAN NULL AFTER `middle_name`;

/*20-09-2021*/
ALTER TABLE `driver_details` CHANGE `lat` `latitude` VARCHAR(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL;
ALTER TABLE `driver_details` CHANGE `long` `longitude` VARCHAR(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL;
ALTER TABLE `driver_details` ADD `aadhar_card_name` VARCHAR(50) NULL DEFAULT NULL AFTER `isPermanent`;

/*22-09-2021*/

ALTER TABLE `driver_details` ADD `driving_license_expiry_date` DATE NULL DEFAULT NULL AFTER `aadhar_card_name`;
ALTER TABLE `insurance` ADD `same_nominee` BOOLEAN NULL DEFAULT NULL AFTER `updated_at`;
ALTER TABLE `driver_details` ADD `vehicle_validate` BOOLEAN NULL DEFAULT NULL AFTER `driving_license_expiry_date`;
ALTER TABLE `driver_details` ADD `admin_approved` BOOLEAN NULL DEFAULT NULL AFTER `driving_license_expiry_date`;
/*23-09-2021*/
ALTER TABLE `restorants` CHANGE `lat` `lat` VARCHAR(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;
ALTER TABLE `restorants` CHANGE `lng` `lng` VARCHAR(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;

/*24-09-2021*/
ALTER TABLE `users` ADD `type` VARCHAR(11) NULL AFTER `device_type`;

/*27-09-2021*/
ALTER TABLE `users` ADD `admin_approved` BOOLEAN NOT NULL DEFAULT FALSE AFTER `type`;
ALTER TABLE `driver_details` ADD `login_time` TIMESTAMP NULL DEFAULT NULL AFTER `vehicle_validate`, ADD `total_hours` DOUBLE NULL DEFAULT NULL AFTER `login_time`;
ALTER TABLE `driver_details` CHANGE `total_hours` `total_hours` DOUBLE NULL DEFAULT '0';
ALTER TABLE `driver_details` CHANGE `login_time` `login_time` BIGINT NULL DEFAULT NULL;

/*29-09-2021*/
ALTER TABLE `orders` ADD `picked_time` BIGINT NULL DEFAULT NULL AFTER `order_status`;
/*30-09-2021*/
ALTER TABLE `users` ADD `status` BOOLEAN NOT NULL DEFAULT TRUE AFTER `admin_approved`;