<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Exception;

class UserService
{
  private $repository;

  public function __construct()
  {
    $this->repository = new UserRepository();
  }

  public function index()
  {
    $repositoryResponse = $this->repository->getAll();
    return $repositoryResponse;
  }

  public function store($reqBody)
  {
    $user = [
      'name' => $reqBody['name']
    ];

    $repositoryResponse = $this->repository->create($user);
    return $repositoryResponse;
  }

  public function show(int $id)
  {
    $repositoryResponse = $this->repository->getOne($id);
    return $repositoryResponse;
  }
}
