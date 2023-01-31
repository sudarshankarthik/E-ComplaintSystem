CREATE TABLE `ecomplaintprotal`.`users` (
    `uname` VARCHAR(25) NOT NULL,
    `pssd` VARCHAR(25) NOT NULL,
    `fname` VARCHAR(25) NOT NULL,
    `lname` VARCHAR(25) NULL,
    `age` INT(10) NOT NULL,
    `dob` DATE NOT NULL,
    PRIMARY KEY (`uname`)
) ENGINE = InnoDB;

INSERT INTO `users` (`uname`, `pssd`, `fname`, `lname`, `age`, `dob`)
VALUES (
        'suddu',
        'Suddu123*',
        'Sudarshan',
        'Karthik',
        '19',
        '2003-05-02'
    );

INSERT INTO `users` (`uname`, `pssd`, `fname`, `lname`, `age`, `dob`)
VALUES (
        'ram',
        'ram123*',
        'Sudarshan',
        'Raman',
        '29',
        '1993-05-02'
    );    

CREATE TABLE `ecomplaintprotal`.`complaint` (
    `cid` VARCHAR(25) NOT NULL , 
    `uid` VARCHAR(25) NOT NULL , 
    `date` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP , 
    `title` VARCHAR(50) NOT NULL , 
    `status` BOOLEAN NOT NULL DEFAULT TRUE , 
    PRIMARY KEY (`cid`)
) ENGINE = InnoDB;

ALTER TABLE `complaint` ADD INDEX(`uid`);

ALTER TABLE `complaint` ADD CONSTRAINT `uid_complaint` FOREIGN KEY (`uid`) REFERENCES `users`(`uname`) ON DELETE RESTRICT ON UPDATE RESTRICT;

INSERT INTO `complaint` (`cid`, `uid`, `date`, `title`, `status`) VALUES ('CNT1002321000', 'suddu', current_timestamp(), 'unable to receive money', '1');