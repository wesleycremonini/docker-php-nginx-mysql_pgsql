<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
  protected $table = 'users';
  protected $primaryKey = 'id';
  protected $fillable = [
    'name'
  ];
  public $timestamps = true;

  public function cpf()
  {
    return $this->hasOne(Cpf::class, 'user_id', 'id');
  }
}
