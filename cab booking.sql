

CREATE TABLE cab_bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    mobileno VARCHAR(15) NOT NULL,
    date_time DATETIME NOT NULL,
    family_members INT NOT NULL,
    cab_type VARCHAR(50) NOT NULL,
    location_from VARCHAR(255) NOT NULL,
    location_to VARCHAR(255) NOT NULL,
    total_distance FLOAT NOT NULL,
    total_cost FLOAT NOT NULL,
    payment_method VARCHAR(50) NOT NULL,
    latitude FLOAT,
    longitude FLOAT
);