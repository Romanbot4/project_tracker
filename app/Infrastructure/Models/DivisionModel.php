<?php

namespace App\Infrastructure\Models;

use App\Core\Failures\BadRequestFailure;
use App\Core\Failures\NotFoundFailure;
use App\Domain\Entities\DivisionEntity;
use App\Domain\Entities\Request\PaginationRequestEntity;
use App\Domain\Entities\Request\CreateDivisionRequestEntity;
use App\Domain\Entities\Response\SuccessResponseEntity;
use CodeIgniter\Model;

class DivisionModel extends Model
{
    public function create(CreateDivisionRequestEntity $form): DivisionEntity
    {
        $sql = "INSERT INTO divisions (title, description) VALUES  (?,?);";
        $result = $this->db->query($sql, [$form->title, $form->description]);
        $id = $this->db->insertID();
        return $this->getById($id);
    }

    public function getById(int $id): DivisionEntity
    {
        $sql = "SELECT * FROM divisions WHERE id=? LIMIT 1;";
        $query = $this->db->query($sql, [$id]);
        $result = $query->getResult();
        if (count($result) > 0) {
            return new DivisionEntity((array) $result[0]);
        }

        throw new NotFoundFailure();
    }

    public function list(array $data): array
    {
        $pagination = new PaginationRequestEntity($data);
        $sql = "SELECT * FROM divisions LIMIT ? OFFSET ?;";
        $query = $this->db->query($sql, [$pagination->limit, $pagination->getOffset()]);
        $result = $query->getResult();
        $value = [];
        foreach ($result as $row) {
            $value[] = new DivisionEntity((array) $row);
        }
        return $value;
    }

    public function edit(int $id, CreateDivisionRequestEntity $form): DivisionEntity
    {
        $sql = "UPDATE divisions SET title=?, description=? WHERE id=?;";
        $result = $this->db->query($sql, [$form->title, $form->description, $id]);
        if ($result === true) return $this->getById($id);
        throw new BadRequestFailure($this->validation->getErrors());
    }

    public function remove(int $id): SuccessResponseEntity
    {
        $sql = "DELETE FROM divisions WHERE id=?;";
        $result = $this->db->query($sql, [$id]);
        return new SuccessResponseEntity("Successfully deleted the division");
    }
}
