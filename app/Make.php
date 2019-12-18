<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Make extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['name'];

  /**
   * The attributes excluded from the model's JSON form.
   *
   * @var array
   */
  protected $hidden = ['created_at', 'updated_at'];

  public function makeModels()
  {
    return $this->hasMany('App\MakeModel', 'make');
  }

} 