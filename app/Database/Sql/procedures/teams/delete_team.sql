USE project_tracker;


DROP PROCEDURE IF EXISTS DeleteTeam;

DELIMITER //
CREATE PROCEDURE IF NOT EXISTS DeleteTeam(
    IN teamId INTEGER
)
BEGIN
DELETE FROM teams_users_role WHERE team_id = teamId;
DELETE FROM teams WHERE id = teamId;
END //
DELIMITER;