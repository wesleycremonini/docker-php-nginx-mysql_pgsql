<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cpf extends Model
{
  protected $table = 'cpfs';
  protected $primaryKey = 'id';
  protected $fillable = [
    'number',
    'user_id'
  ];
  public $timestamps = true;

  public function user()
  {
    return $this->belongsTo(User::class, 'id', 'user_id');
  }
}
