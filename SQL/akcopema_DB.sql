-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema 2100695_cse345
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema 2100695_cse345
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `2100695_cse345` DEFAULT CHARACTER SET latin1 ;
USE `2100695_cse345` ;

-- -----------------------------------------------------
-- Table `2100695_cse345`.`movie`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2100695_cse345`.`movie` (
  `MOVIE_ID` INT(2) NOT NULL,
  `MOVIE_NAME` TINYTEXT NOT NULL,
  `MOVIE_DIRECTOR` TINYTEXT NOT NULL,
  `MOVIE_LEAD_ACTOR` TINYTEXT NOT NULL,
  `MOVIE_RATING` TINYTEXT NOT NULL,
  `MOVIE_DESCRIPTION` MEDIUMTEXT NOT NULL,
  `MOVIE_YEAR` INT(11) NOT NULL,
  `MOVIE_RUNTIME` INT(11) NOT NULL,
  `MOVIE_YOUTUBE` VARCHAR(254) NOT NULL,
  PRIMARY KEY (`MOVIE_ID`))
 
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `2100695_cse345`.`showroom`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2100695_cse345`.`showroom` (
  `SHOWROOM_ID` INT(2) NOT NULL,
  `SHOWROOM_DESC` MEDIUMTEXT NULL DEFAULT NULL,
  PRIMARY KEY (`SHOWROOM_ID`))
 
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `2100695_cse345`.`showtime`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2100695_cse345`.`showtime` (
  `SHOWTIME_ID` INT(2) NOT NULL,
  `SHOWROOM_ID` INT(2) NOT NULL,
  `TIME_START` TIME NOT NULL,
  `TIME_END` TIME NOT NULL,
  PRIMARY KEY (`SHOWROOM_ID`, `SHOWTIME_ID`),
  CONSTRAINT `SHOWROOM_ID`
    FOREIGN KEY (`SHOWROOM_ID`)
    REFERENCES `2100695_cse345`.`showroom` (`SHOWROOM_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
 
DEFAULT CHARACTER SET = latin1;

CREATE INDEX `SHOWROOM_ID` ON `2100695_cse345`.`showtime` (`SHOWTIME_ID` ASC);


-- -----------------------------------------------------
-- Table `2100695_cse345`.`movie_times`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2100695_cse345`.`movie_times` (
  `SHOWTIME_ID` INT(2) NOT NULL,
  `MOVIE_ID` INT(2) NOT NULL,
  PRIMARY KEY (`SHOWTIME_ID`, `MOVIE_ID`),
  CONSTRAINT `MOVIE_ID`
    FOREIGN KEY (`MOVIE_ID`)
    REFERENCES `2100695_cse345`.`movie` (`MOVIE_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `SHOWTIME_ID`
    FOREIGN KEY (`SHOWTIME_ID`)
    REFERENCES `2100695_cse345`.`showtime` (`SHOWTIME_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
 
DEFAULT CHARACTER SET = latin1;

CREATE INDEX `MOVIE_ID_idx` ON `2100695_cse345`.`movie_times` (`MOVIE_ID` ASC);


-- -----------------------------------------------------
-- Table `2100695_cse345`.`user_account`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2100695_cse345`.`user_account` (
  `USER_EMAIL` VARCHAR(254) NOT NULL,
  `USER_PASSENCRYPT` TINYTEXT NOT NULL,
  `USER_FNAME` TINYTEXT NOT NULL,
  `USER_LNAME` TINYTEXT NOT NULL,
  `USER_STREETNUM` INT(11) NOT NULL,
  `USER_STREET` TINYTEXT NOT NULL,
  `USER_ZIP` INT(11) NOT NULL,
  PRIMARY KEY (`USER_EMAIL`))
 
DEFAULT CHARACTER SET = latin1;

CREATE UNIQUE INDEX `USER_EMAIL_UNIQUE` ON `2100695_cse345`.`user_account` (`USER_EMAIL` ASC);


-- -----------------------------------------------------
-- Table `2100695_cse345`.`reservation`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2100695_cse345`.`reservation` (
  `RESERVATION_ID` INT(3) NOT NULL AUTO_INCREMENT,
  `USER_EMAIL` VARCHAR(254) NOT NULL,
  `SHOWTIME_ID` INT(2) NOT NULL,
  `RESERVATION_TICKETNUM` INT(3) NOT NULL,
  `RESERVATION_CREATION` DATE NOT NULL,
  `RESERVATION_DATE` DATE NOT NULL,
  PRIMARY KEY (`RESERVATION_ID`, `USER_EMAIL`, `SHOWTIME_ID`),
  CONSTRAINT `FK_SHOWTIME_ID`
    FOREIGN KEY (`SHOWTIME_ID`)
    REFERENCES `2100695_cse345`.`showtime` (`SHOWTIME_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `USER_EMAIL`
    FOREIGN KEY (`USER_EMAIL`)
    REFERENCES `2100695_cse345`.`user_account` (`USER_EMAIL`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
 
AUTO_INCREMENT = 29
DEFAULT CHARACTER SET = latin1;

CREATE INDEX `USER_EMAIL_idx` ON `2100695_cse345`.`reservation` (`USER_EMAIL` ASC);

CREATE INDEX `FK_SHOWTIME_ID_idx` ON `2100695_cse345`.`reservation` (`SHOWTIME_ID` ASC);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
