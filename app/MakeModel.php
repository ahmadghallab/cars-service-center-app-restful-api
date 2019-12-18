<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MakeModel extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['name', 'make'];

  protected $hidden = ['created_at', 'updated_at'];

  public function make()
  {
    return $this->belongsTo('App\Make', 'make');
  }

}