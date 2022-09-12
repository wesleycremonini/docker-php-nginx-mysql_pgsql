<?php

namespace App\Repositories;

use App\Models\Cpf;
use App\Models\User;

class CpfRepository
{
  private $model;

  public function __construct()
  {
    $this->model = new Cpf();
  }
  public function create(array $cpf)
  {
    $cpf = $this->model->create($cpf);
    return $cpf;
  }

  public function getOne(int $userId)
  {
    $cpf = User::find($userId)->cpf;
    return $cpf;
  }

  public function update(array $updatedCpf, int $id)
  {
    $cpf = User::find($id)->cpf;
    $cpf->update(['number' => $updatedCpf['number']]);
    return $cpf;
  }
}
