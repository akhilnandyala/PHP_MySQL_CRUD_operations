CREATE DATABASE sample_db;

    use sample_db;
    CREATE TABLE customer (
        id INT(5) AUTO_INCREMENT PRIMARY KEY,
        firstname VARCHAR(10) NOT NULL,
        lastname VARCHAR(10) NOT NULL,
        email VARCHAR(20) NOT NULL
    );

