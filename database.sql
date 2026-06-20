CREATE TABLE users_login (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    username VARCHAR(50) UNIQUE,
    password VARCHAR(255)
);

CREATE TABLE data_user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    nomor VARCHAR(20),
    foto VARCHAR(255)
);