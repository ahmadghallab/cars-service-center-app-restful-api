<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['vin', 'engine', 'licence_plate', 'counter', 'make', 'make_model', 'customer'];

  protected $hidden = ['created_at', 'updated_at'];

  public function customer()
  {
    return $this->belongsTo('App\Customer', 'customer');
  }

  public function make()
  {
    return $this->belongsTo('App\Make', 'make');
  }

  public function make_model()
  {
    return $this->belongsTo('App\MakeModel', 'make_model');
  }

}