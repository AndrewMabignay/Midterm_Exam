use midterm;

CREATE TABLE accounts(
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(100) NOT NULL,
    Age INT NOT NULL,
    Address VARCHAR(200) NOT NULL,
    Password VARCHAR(100) NOT NULL,
    Role ENUM('User', 'Admin') NOT NULL
);

-- BACKUP ITO
CREATE TABLE products_pos (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    User_ID INT NOT NULL,
    ProductName VARCHAR(100) NOT NULL,
    Price DOUBLE NOT NULL,
    Stock INT NOT NULL,
    Discount DOUBLE NOT NULL
);

ALTER TABLE products_pos ADD COLUMN SubTotal DOUBLE NOT NULL AFTER Discount;

INSERT INTO products_pos(User_ID, ProductName, Price, Stock, Discount, SubTotal) VALUES 
(4, 'Box', 200, 2, 10, 360);

SELECT * FROM products_pos WHERE User_ID = 4;

SELECT * FROM products_pos WHERE ProductName = 'BearBrand';


CREATE TABLE transaction (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(100) NOT NULL, 
    Position VARCHAR(100) NOT NULL,
    PartyList VARCHAR(100) NOT NULL,
    VoteCount INT NOT NULL
);

