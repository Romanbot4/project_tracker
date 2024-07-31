USE project_tracker;

DROP PROCEDURE IF EXISTS GetTeamUsers;


DELIMITER //

CREATE PROCEDURE GetTeamUsers(
    IN team_id INTEGER
)
BEGIN
    SELECT * FROM teams_users_role tur
    JOIN users u ON tur.user_id = u.id
    WHERE tur.team_id = team_id;
END //

DELIMITER;