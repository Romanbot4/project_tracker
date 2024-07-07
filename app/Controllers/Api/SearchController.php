<?php

namespace App\Controllers\Api;

use App\Controllers\ApiController;
use App\Domain\Entities\Request\SearchUserByEmailRequestEntity;
use App\Domain\Repositories\ISearchRepository;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class SearchController extends ApiController
{
    private ISearchRepository $searchRepository;

    public function __construct(ISearchRepository $searchRepository = null)
    {
        $this->searchRepository = $searchRepository ?? Services::searchRepository();
    }

    public function searchUserByEmail(): ResponseInterface
    {
        try {
            $form = new SearchUserByEmailRequestEntity($this->request->getGet());
            $user = $this->searchRepository->searchUserByEmail($form->email);
            return $this->ok($user);
        } catch (\Throwable $th) {
            return $this->resolve($th);
        }
    }
}
