<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dato extends Model
{
  use SoftDeletes;
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'datos';

  /**
  * The database primary key value.
  *
  * @var string
  */
  //protected $primaryKey = 'id';

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = [
                          'id',
                          'NAVES',
                          'PROYECTO',
                          'PROCESOS',
                          'LINEAS',
                          'AFOS',
                          'v1',
                          'NOMBREPADRE',
                          'MODELOBEMIPADRE',
                          'DESCRIPCION',
                          'CANTPADRES',
                          'v2',
                          'NOMBREEQUIPO',
                          'MARCAEQUIPO',
                          'TYPE',
                          'NUMSERIE',
                          'DESCRIPCIONCOMPLEMENTARIA',
                          'MAXIMO',
                          'CANTELEMENTO',
                          'v3',
                          'NOMENCLATURA',
                          'NUMTABLERO',
                          'OBSERVACIONES',
                          'NUMINVENTARIO',
                          'user'
                      ];
  protected $dates = ['deleted_at'];



  public function nave()
  {
    return $this->belongsToMany('App\Nave','NAVES');
    //return $this->belongsToMany('\App\Nave','nave_id')
      //      ->withPivot('nave_id','nombre');
  }

  public function proceso()
  {
    return $this->belongsTo('App\Proceso','PROCESOS');
  }

  public function linea()
  {
    return $this->belongsTo('App\Linea','LINEAS');
  }

  public function afo()
  {
    return $this->belongsTo('App\Afo','AFOS');
  }

  public function padre()
  {
    return $this->belongsTo('App\Padre','NOMBREPADRE');
  }
}
