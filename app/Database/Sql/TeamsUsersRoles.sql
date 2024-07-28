USE project_tracker;

DROP TABLE IF EXISTS teams_users_role;

CREATE TABLE IF NOT EXISTS teams_users_role (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    team_id INTEGER NOT NULL,
    user_id INTEGER NOT NULL,
    role ENUM(
        "LEADER",
        "CO_LEADER",
        "MEMBERS",
        "VIEWER"
    ),
    FOREIGN KEY (team_id) REFERENCES teams (id),
    FOREIGN KEY (user_id) REFERENCES users (id),
    UNIQUE KEY teams_users_role_unique (team_id, user_id, role)
);

SELECT * FROM USERS;
