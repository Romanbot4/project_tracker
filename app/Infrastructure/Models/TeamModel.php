<?php

namespace App\Infrastructure\Models;

use App\Core\Failures\BadRequestFailure;
use App\Core\Failures\NotFoundFailure;
use App\Domain\Entities\Request\AddUserToTeamRequestEntity;
use App\Domain\Entities\Request\CreateTeamRequestEntity;
use App\Domain\Entities\Request\PaginationRequestEntity;
use App\Domain\Entities\Request\RemoveUserFromTeamRequestEntity;
use App\Domain\Entities\Response\SuccessResponseEntity;
use App\Domain\Entities\TeamDetailsEntity;
use App\Domain\Entities\TeamInfoEntity;
use App\Domain\Entities\TeamUserEntity;
use CodeIgniter\Model;

class TeamModel extends Model
{
    public function getById(int $id): TeamDetailsEntity
    {
        return new TeamDetailsEntity(
            $this->getTeamInfo($id),
            $this->getTeamUsers($id),
        );
    }

    public function getTeamInfo(int $teamId): TeamInfoEntity
    {
        $sql = "SELECT * FROM teams WHERE id=? LIMIT 1;";
        $query = $this->db->query($sql, [$teamId]);
        $result = $query->getResult();
        if (count($result) > 0) {
            $row = (array) ($result[0]);
            return new TeamInfoEntity([
                ...$row,
                "user_count" => $this->teamMemberCount($row["id"])
            ]);
        } else {
            throw new NotFoundFailure();
        }
    }

    public function getTeamUsers(int $teamId): array
    {
        $sql =  "CALL GetTeamUsers(?);";
        $query = $this->db->query($sql, [$teamId]);
        $result = $query->getResult();
        $values = [];
        foreach ($result as $row) {
            $values[] = new TeamUserEntity((array) $row);
        }
        return $values;
    }

    public function getRowCount(): int
    {
        $sql = "SELECT COUNT(*) FROM teams";
        $query = $this->db->query($sql);
        $value = $query->getResult('array');
        return array_values($value[0])[0];
    }

    public function addUserToTeam(AddUserToTeamRequestEntity $form): SuccessResponseEntity
    {
        $sql = "CALL AddUserToTeam(?,?,?);";
        $query = $this->db->query($sql, [$form->teamId, $form->userId, $form->role->name]);
        return new SuccessResponseEntity();
    }

    public function removeUserFromTeam(RemoveUserFromTeamRequestEntity $form): SuccessResponseEntity
    {
        $sql = "CALL RemoveUserFromTeam(?,?);";
        $query = $this->db->query($sql, [$form->teamId, $form->userId]);
        return new SuccessResponseEntity();
    }

    public function create(CreateTeamRequestEntity $form): TeamDetailsEntity
    {
        $sql = "INSERT INTO teams (title, description, tag_color) VALUES  (?,?,?);";
        $result = $this->db->query($sql, [$form->title, $form->description, $form->tagColor]);
        $id = $this->db->insertID();
        return $this->getById($id);
    }

    public function remove(int $id): SuccessResponseEntity
    {
        $sql = "CALL DeleteTeam(?);";
        // $sql = "DELETE FROM teams WHERE id=?;";
        $result = $this->db->query($sql, [$id]);
        return new SuccessResponseEntity("Successfully deleted the team");
    }

    public function removeByIds(array $ids)
    {
        $selection = implode(',', $ids);
        $sql = "DELETE FROM teams WHERE id IN (" . $selection . ");";
        $result = $this->db->query($sql, [$selection]);
        return new SuccessResponseEntity("Successfully deleted the team");
    }

    public function edit(int $id, CreateTeamRequestEntity $form): TeamDetailsEntity
    {
        $sql = "UPDATE teams SET title=?, description=?, tag_color=? WHERE id=?;";
        $result = $this->db->query($sql, [$form->title, $form->description, $id, $form->tagColor]);
        if ($result === true) return $this->getById($id);
        throw new BadRequestFailure($this->validation->getErrors());
    }

    public function teamMemberCount(int $id): int
    {
        $sql = "CALL GetTeamUserCount(?);";
        $query = $this->db->query($sql, [$id]);
        $value = $query->getResult('array');
        return array_values($value[0])[0];
    }

    public function list(PaginationRequestEntity $pagination): array
    {
        $sql = "SELECT * FROM teams LIMIT ? OFFSET ?;";
        $query = $this->db->query($sql, [$pagination->limit, $pagination->offset]);
        $result = $query->getResult();
        $value = [];
        foreach ($result as $row) {
            $row = (array) $row;
            $value[] = new TeamInfoEntity([
                ...$row,
                "user_count" => $this->teamMemberCount($row["id"])
            ]);
        }
        return $value;
    }
}
