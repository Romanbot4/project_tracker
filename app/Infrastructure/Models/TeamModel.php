<?php

namespace App\Infrastructure\Models;

use App\Core\Failures\NotFoundFailure;
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
            return new TeamInfoEntity((array) ($result[0]));
        } else {
            throw new NotFoundFailure();
        }
    }

    public function getTeamUsers(int $teamId): array
    {
        $sql =  "CALL GetTeamUsers(?)";
        $query = $this->db->query($sql, [$teamId]);
        $result = $query->getResult();
        $values = [];
        foreach ($result as $row) {
            $values[] = new TeamUserEntity((array) $row);
        }
        return $values;
    }

    // public function addUserToTeam(string $id): bool

}
