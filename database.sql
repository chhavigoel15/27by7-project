CREATE DATABASE software_form;

USE software_form;

CREATE TABLE submissions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullName VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    company VARCHAR(255),
    phone VARCHAR(20) NOT NULL,
    solutionType VARCHAR(100) NOT NULL,
    requirements TEXT NOT NULL,
    budget VARCHAR(100) NOT NULL,
    timeline VARCHAR(100) NOT NULL,
    fileName VARCHAR(255),
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
