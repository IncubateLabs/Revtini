ALTER TABLE `revtini_dev`.`sms_log` CHANGE COLUMN `mId` `mId` INT NOT NULL  , 
  ADD CONSTRAINT `mId_fk_sms_log_merchant`
  FOREIGN KEY (`mId` )
  REFERENCES `revtini_dev`.`merchants` (`mId` )
  ON DELETE NO ACTION
  ON UPDATE NO ACTION
, ADD INDEX `mId_idx` (`mId` ASC) ;


ALTER TABLE `revtini_dev`.`mobileapp_log` CHANGE COLUMN `mId` `mId` INT NOT NULL  , 
  ADD CONSTRAINT `mId_fk_mobileapp_log_merchant`
  FOREIGN KEY (`mId` )
  REFERENCES `revtini_dev`.`merchants` (`mId` )
  ON DELETE NO ACTION
  ON UPDATE NO ACTION
, ADD INDEX `mId_idx` (`mId` ASC) ;