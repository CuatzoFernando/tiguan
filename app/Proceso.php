<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proceso extends Model
{
  use  SoftDeletes;
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'procesos';

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
                        'tipo',
                        'user',
                        'deleted_at'
                      ];

  protected $dates = ['deleted_at'];

  public function lineas()
  {
      return $this->hasMany(\App\Linea::class);
  }

  // el modelo datos depende de proceso
  public function datos()
  {
      return $this->hasMany(\App\Dato::class);
  }
}
