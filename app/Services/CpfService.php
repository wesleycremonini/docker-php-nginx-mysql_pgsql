<?php

namespace App\Services;

use App\Repositories\CpfRepository;

class CpfService
{
  private $repository;

  public function __construct()
  {
    $this->repository = new CpfRepository();
  }

  public function store(array $reqBody)
  {
    $cpf = [
      'user_id' => $reqBody['user_id'],
      'number' => $reqBody['number']
    ];

    $repositoryResponse = $this->repository->create($cpf);
    return $repositoryResponse;
  }

  public function show(int $userId)
  {
    $repositoryResponse = $this->repository->getOne($userId);
    return $repositoryResponse;
  }

  public function update(array $reqBody, int $id)
  {
    $updatedCpf = [
      'number' => $reqBody['number']
    ];

    $repositoryResponse = $this->repository->update($updatedCpf, $id);
    return $repositoryResponse;
  }
}
