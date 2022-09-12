<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
  private $model;

  public function __construct()
  {
    $this->model = new User;
  }

  public function getAll()
  {
    $allUsers = $this->model::all();
    return $allUsers;
  }

  public function create(array $user)
  {
    $user = $this->model->create($user);
    return $user;
  }

  public function getOne(int $id)
  {
    $user = $this->model->find($id);
    return $user;
  }

  public function update(array $updatedUser, int $id)
  {
    $user = $this->model->find($id);
    $user->update(['name' => $updatedUser['name']]);
    return $user;
  }

  public function delete(int $id)
  {
    $this->model->destroy($id);
  }
}
