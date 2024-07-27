USE project_tracker;

DROP TABLE IF EXISTS projects;

CREATE TABLE IF NOT EXISTS projects (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    description VARCHAR(255),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

ALTER TABLE projects
ADD COLUMN start_at DATETIME DEFAULT CURRENT_TIMESTAMP;

ALTER TABLE projects ADD COLUMN end_at DATETIME NOT NULL;

SELECT * FROM projects LIMIT 5;