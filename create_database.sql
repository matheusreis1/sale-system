CREATE DATABASE IF NOT EXISTS sale_system;

USE sale_system;

CREATE TABLE product (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    description VARCHAR(100),
    price int(11) NOT NULL,
    created_at datetime NOT NULL
);

CREATE TABLE seller (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(300) NOT NULL,
    created_at datetime NOT NULL
);

CREATE TABLE sale (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    seller_id INTEGER NOT NULL,
    product_id INTEGER NOT NULL,
    sale_time datetime NOT NULL,
    FOREIGN KEY (seller_id) REFERENCES seller (id) ON DELETE RESTRICT ON UPDATE CASCADE,
    FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE RESTRICT ON UPDATE CASCADE
);