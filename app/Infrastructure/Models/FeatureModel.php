<?php

namespace App\Infrastructure\Models;

use App\Core\Failures\BadRequestFailure;
use App\Core\Failures\NotFoundFailure;
use App\Domain\Entities\FeatureEntity;
use App\Domain\Entities\Request\PaginationRequestEntity;
use App\Domain\Entities\Request\CreateFeatureRequestEntity;
use App\Domain\Entities\Response\SuccessResponseEntity;
use CodeIgniter\Model;

class FeatureModel extends Model
{
    public function create(CreateFeatureRequestEntity $form): FeatureEntity
    {
        $sql = "INSERT INTO features (title, project_id) VALUES  (?,?);";
        $result = $this->db->query($sql, [$form->title, $form->projectId]);
        $id = $this->db->insertID();
        return $this->getById($id);
    }

    public function getById(int $id): FeatureEntity
    {
        $sql = "SELECT * FROM features WHERE id=? LIMIT 1;";
        $query = $this->db->query($sql, [$id]);
        $result = $query->getResult();
        if (count($result) > 0) {
            return new FeatureEntity((array) $result[0]);
        }

        throw new NotFoundFailure();
    }

    public function listByProject(int $projectId, array $data): array
    {
        $pagination = new PaginationRequestEntity($data);
        $sql = "SELECT * FROM features WHERE project_id=? LIMIT ? OFFSET ?;";
        $query = $this->db->query($sql, [$projectId, $pagination->limit, $pagination->getOffset()]);
        $result = $query->getResult();
        $value = [];
        foreach ($result as $row) {
            $value[] = new FeatureEntity((array) $row);
        }
        return $value;
    }


    public function list(array $data): array
    {
        $pagination = new PaginationRequestEntity($data);
        $sql = "SELECT * FROM features LIMIT ? OFFSET ?;";
        $query = $this->db->query($sql, [$pagination->limit, $pagination->getOffset()]);
        $result = $query->getResult();
        $value = [];
        foreach ($result as $row) {
            $value[] = new FeatureEntity((array) $row);
        }
        return $value;
    }

    public function edit(int $id, CreateFeatureRequestEntity $form): FeatureEntity
    {
        $sql = "UPDATE features SET title=?, description=? WHERE id=?;";
        $result = $this->db->query($sql, [$form->title, $form->description, $id]);
        if ($result === true) return $this->getById($id);
        throw new BadRequestFailure($this->validation->getErrors());
    }

    public function remove(int $id): SuccessResponseEntity
    {
        $sql = "DELETE FROM features WHERE id=?;";
        $result = $this->db->query($sql, [$id]);
        return new SuccessResponseEntity("Successfully deleted the feature");
    }
}
