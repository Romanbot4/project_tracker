<?php

namespace App\Domain\Entities;

use App\Core\Failures\BadRequestFailure;
use CodeIgniter\Entity\Entity;
use CodeIgniter\Validation\ValidationInterface;

class RequestEntity  extends Entity
{
    protected ValidationInterface $validation;
    
    public function validate(array $data = null): bool
    {
        $this->validation = \Config\Services::validation();
        $this->validation->setRules($this->rules);
        $result = $this->validation->run($data ?? $this);
        if (!$result) throw new BadRequestFailure($this->validation->getErrors());
        return true;
    }
}
