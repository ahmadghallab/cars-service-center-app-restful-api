<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['title', 'name', 'email', 'phone', 'alt_phone', 'address', 'class', 'balance'];

  protected $hidden = ['created_at', 'updated_at'];

  public function vehicles()
  {
    return $this->hasMany('App\Vehicle', 'customer');
  }

}