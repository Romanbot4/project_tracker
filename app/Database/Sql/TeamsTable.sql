USE project_tracker;

DROP TABLE IF EXISTS teams;

CREATE TABLE IF NOT EXISTS teams (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    description VARCHAR(255),
    tag_color VARCHAR(7),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO teams (title, description) VALUES ("hf", "fdasf");

SELECT * FROM TEAMS;

SELECT * FROM teams WHERE id = 1 LIMIT 1;

ALTER TABLE teams ADD COLUMN tag_color VARCHAR(7) DEFAULT NULL;

DESC  teams;