CREATE  TABLE `revtini_dev`.`merchants` (
  `mId` INT NOT NULL ,
  `code` VARCHAR(10) NULL ,
  `company_name` VARCHAR(45) NULL ,
  `phone` VARCHAR(15) NULL ,
  `email` VARCHAR(45) NULL ,
  `date_created` DATETIME NULL ,
  PRIMARY KEY (`mId`) );
  
  
  
  CREATE  TABLE `revtini_dev`.`reviews` (
  `reviewId` INT NOT NULL ,
  `mId` INT NULL ,
  `status` BIT NULL ,
  `reviewDateTime` DATETIME NULL ,
  `isVerified` BIT NULL ,
  `from_device` VARCHAR(5) NULL ,
  `phone_number` VARCHAR(15) NULL ,
  PRIMARY KEY (`reviewId`) ,
  INDEX `mId_idx` (`mId` ASC) ,
  CONSTRAINT `mId`
    FOREIGN KEY (`mId` )
    REFERENCES `revtini_dev`.`merchants` (`mId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
	
	
	CREATE  TABLE `revtini_dev`.`review_dtls` (
  `reviewdtl_id` INT NOT NULL ,
  `reviewId` INT NULL ,
  `comment` VARCHAR(500) NULL ,
  `price_status` BIT NULL ,
  `professionalism_status` BIT NULL ,
  `punctuality_status` BIT NULL ,
  PRIMARY KEY (`reviewdtl_id`) ,
  INDEX `reviewId_idx` (`reviewId` ASC) ,
  CONSTRAINT `reviewId`
    FOREIGN KEY (`reviewId` )
    REFERENCES `revtini_dev`.`reviews` (`reviewId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

	
	CREATE  TABLE `revtini_dev`.`merchant_jobs` (
  `jobId` INT NOT NULL AUTO_INCREMENT ,
  `mId` INT NULL ,
  `phone_number` VARCHAR(15) NULL ,
  `job_date` DATETIME NULL ,
  `is_review_done` BIT NULL ,
  PRIMARY KEY (`jobId`) ,
  INDEX `mId_idx` (`mId` ASC) ,
  CONSTRAINT `mId_jobs`
    FOREIGN KEY (`mId` )
    REFERENCES `revtini_dev`.`merchants` (`mId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE TABLE IF NOT EXISTS `revtini_dev`.`sms_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from` text NOT NULL,
  `body` text NOT NULL,
  `fromCountry` text,
  `fromCity` text,
  `fromState` text,
  `fromZip` text,
  `smsMessageSid` text,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `mId` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
);