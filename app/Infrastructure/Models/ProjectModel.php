<?php

namespace App\Infrastructure\Models;

use App\Core\Failures\BadRequestFailure;
use App\Core\Failures\NotFoundFailure;
use App\Domain\Entities\ProjectEntity;
use App\Domain\Entities\Request\PaginationRequestEntity;
use App\Domain\Entities\Request\CreateProjectRequestEntity;
use App\Domain\Entities\Response\SuccessResponseEntity;
use CodeIgniter\Model;

class ProjectModel extends Model
{
    public function create(CreateProjectRequestEntity $form): ProjectEntity
    {
        $sql = "INSERT INTO projects (title, description) VALUES  (?,?);";
        $result = $this->db->query($sql, [$form->title, $form->description]);
        $id = $this->db->insertID();
        return $this->getById($id);
    }

    public function getById(int $id): ProjectEntity
    {
        $sql = "SELECT * FROM projects WHERE id=? LIMIT 1;";
        $query = $this->db->query($sql, [$id]);
        $result = $query->getResult();
        
        if (count($result) > 0) {
            return new ProjectEntity((array) $result[0]);
        }

        throw new NotFoundFailure();
    }

    public function getRowCount(): int
    {
        $sql = "SELECT COUNT(*) FROM projects";
        $query = $this->db->query($sql);
        $value = $query->getResult('array');
        return array_values($value[0])[0];
    }

    public function list(PaginationRequestEntity $pagination): array
    {
        $sql = "SELECT * FROM projects LIMIT ? OFFSET ?;";
        $query = $this->db->query($sql, [$pagination->limit, $pagination->offset]);
        $result = $query->getResult();
        $value = [];
        foreach ($result as $row) {
            $value[] = new ProjectEntity((array) $row);
        }
        return $value;
    }

    public function edit(int $id, CreateProjectRequestEntity $form): ProjectEntity
    {
        $sql = "UPDATE projects SET title=?, description=? WHERE id=?;";
        $result = $this->db->query($sql, [$form->title, $form->description, $id]);
        if ($result === true) return $this->getById($id);
        throw new BadRequestFailure($this->validation->getErrors());
    }

    public function remove(int $id): SuccessResponseEntity
    {
        $sql = "DELETE FROM projects WHERE id=?;";
        $result = $this->db->query($sql, [$id]);
        return new SuccessResponseEntity("Successfully deleted the project");
    }

    public function removeByIds(array $ids)
    {
        $selection = implode(',', $ids);
        $sql = "DELETE FROM projects WHERE id IN (" . $selection . ");";
        $result = $this->db->query($sql, [$selection]);
        return new SuccessResponseEntity("Successfully deleted the project");
    }
}
