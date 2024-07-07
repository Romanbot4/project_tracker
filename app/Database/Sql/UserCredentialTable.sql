USE project_tracker;

DROP TABLE IF EXISTS user_credential;

CREATE TABLE IF NOT EXISTS user_credential (
    user_id INTEGER PRIMARY KEY AUTO_INCREMENT,
    password_hash VARCHAR(64) NOT NULL
);