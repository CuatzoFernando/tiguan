<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nave extends Model
{
  use  SoftDeletes;
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'naves';

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
                        'proyecto',
                        'imagen',
                        'user',
                        'deleted_at'
                      ];

  protected $dates = ['deleted_at'];

  // el modelo datos depende de naves
  public function datos()
  {
      return $this->hasMany(\App\Dato::class);
      //return $this->hasMany('App\Dato', 'nave_id', 'id');
  }
}
