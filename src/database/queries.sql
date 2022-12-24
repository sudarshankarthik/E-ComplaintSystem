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