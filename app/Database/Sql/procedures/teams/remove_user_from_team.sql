USE project_tracker;

DROP PROCEDURE IF EXISTS RemoveUserFromTeam;

DELIMITER //
CREATE PROCEDURE IF NOT EXISTS RemoveUserFromTeam(
    IN teamId INTEGER,
    IN userId INTEGER
)
BEGIN
    DELETE FROM teams_users_role WHERE user_id=userId AND team_id=teamId;
END //
DELIMITER;