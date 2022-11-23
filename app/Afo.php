<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Afo extends Model
{
  use  SoftDeletes;
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'afos';

  /**
  * The database primary key value.
  *
  * @var string
  */
  protected $primaryKey = 'id';

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = [
                        'nombre',
                        'imagen',
                        'user',
                        'deleted_at'
                      ];

  protected $dates = ['deleted_at'];

  public function linea()
  {
    return $this->belongsTo('App\Linea','linea_id');
  }

  public function padres()
  {
      return $this->hasMany(\App\Padre::class);
  }

  // el modelo datos depende de afo
  public function datos()
  {
      return $this->hasMany(\App\Dato::class);
  }
}
