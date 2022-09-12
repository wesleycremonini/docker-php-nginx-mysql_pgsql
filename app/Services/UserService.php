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

  public function store(array $reqBody)
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

  public function update(array $reqBody ,int $id)
  {
    $updatedUser = [
      'name' => $reqBody['name']
    ];

    $repositoryResponse = $this->repository->update($updatedUser, $id);
    return $repositoryResponse;
  }

  public function destroy(int $id)
  {
    $this->repository->delete($id);
  }
}
