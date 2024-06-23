USE project_tracker;

CREATE TABLE IF NOT EXISTS users (
    id VARCHAR(32) PRIMARY KEY DEFAULT UNHEX(
        REPLACE (UUID(), "-", "")
    ),
    name VARCHAR(255) NOT NULL CHECK (LENGTH(name) > 3),
    credential VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO
    users (name, credential, password)
VALUES ("small", "user@example.com", "dfafasfasfsaf");

SELECT HEX(id) as id,name,created_at,updated_at updated_at FROM users;

SELECT *
FROM users
WHERE
    HEX(id) = "3F663F3F313F11EFA2A23C223F48DB91"
LIMIT 1;

DELETE FROM users WHERE name = "small";

DROP TABLE IF EXISTS users;

CREATE DATABASE project_tracker_test;