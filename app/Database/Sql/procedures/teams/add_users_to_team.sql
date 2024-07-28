USE project_tracker;

DROP PROCEDURE IF EXISTS AddUserToTeam;

DELIMITER //

CREATE PROCEDURE AddUserToTeam(
    IN team_id INTEGER,
    IN user_id INTEGER,
    IN role VARCHAR(24)
)
BEGIN 
    INSERT INTO teams_users_role (team_id, user_id, role) VALUES (team_id, user_id, role);
END //

DELIMITER;


CALL AddUserToTeam(1,2, 'LEADER');
