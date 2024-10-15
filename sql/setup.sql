CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE lost_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    image_url VARCHAR(255) NOT NULL,
    found_at DATETIME NOT NULL,
    user_id INT NOT NULL, -- ID uživatele, který příspěvek přidal
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
