<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Linea extends Model
{
  use  SoftDeletes;
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'lineas';

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

  public function proceso()
  {
    return $this->belongsTo('App\Proceso','proceso_id');
  }

  public function afos()
  {
      return $this->hasMany(\App\Afo::class);
  }

  public function padres()
  {
      return $this->hasMany(\App\Padre::class);
  }

  // el modelo datos depende de linea
  public function datos()
  {
      return $this->hasMany(\App\Dato::class);
  }
}
