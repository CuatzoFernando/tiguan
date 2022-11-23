<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Padre extends Model
{
  use  SoftDeletes;
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'padres';

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
                        'NOMBREPADRE',
                        'imagen',
                        'documentos',
                        'user',
                        'deleted_at'
                      ];

  protected $dates = ['deleted_at'];

  public function afos()
  {
    return $this->belongsTo('App\Afo','afo_id');
  }

  public function lineas()
  {
      return $this->belongsTo('App\Linea', 'linea_id');
  }

  // el modelo datos depende de padre
  public function datos()
  {
      return $this->hasMany(\App\Dato::class);
  }
}
