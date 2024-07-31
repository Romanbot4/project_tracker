USE project_tracker;

DROP PROCEDURE IF EXISTS GetTeamUserCount;


DELIMITER //

CREATE PROCEDURE GetTeamUserCount(
    IN id INTEGER
)
BEGIN
SELECT COUNT(id) FROM teams_users_role WHERE team_id=1;
END //
DELIMITER;