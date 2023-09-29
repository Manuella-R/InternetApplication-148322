CREATE DATABASE clients;
USE clients;
CREATE TABLE clientels (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    gender ENUM('Male', 'Female', 'Other') NOT NULL,
    address VARCHAR(255) NOT NULL,
    employment_status ENUM('Employed', 'Unemployed', 'Student', 'Retired') NOT NULL
);


INSERT INTO clientels (name, email, gender, address, employment_status)
VALUES
    ('Joseph kimani', 'kimanu@gmail.com', 'Male', '123 Main St, City', 'Employed'),
    ('Jane Karanja', 'jane@gmail.com', 'Female', '456 Elm St, Town', 'Unemployed'),
    ('kiki alexin', 'alex@gmail.com', 'Female', '789 Oak St, Village', 'Student'),
    ('Jennifer Lawrence', 'Jlaw@gmail.com', 'Other', '101 Pine St, County', 'Retired');
