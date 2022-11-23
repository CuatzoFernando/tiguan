<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use Excel;
use DB;
use App\Documento;
use Auth;
use App\Proceso;

class ExcelController extends Controller
{

  public function AfosDetalle($id, Request $request)
  {
    $afo_detalle = \DB::table('datos as d')
        ->join('afos as a', 'a.id', '=', 'd.AFOS')
        ->join('procesos as pr', 'pr.id', '=', 'd.PROCESOS')
        ->join('lineas as l', 'l.id', '=', 'd.LINEAS')
        ->join('naves as n', 'n.id', '=', 'd.NAVES')
        ->select('d.id as Id','n.nombre as Nave','d.PROYECTO as Proyecto','pr.nombre as Proceso','l.nombre as Linea','a.nombre as Afo','d.V1',
                                    'd.NOMBREPADRE as Nombre_del_Padre','d.MODELOBEMIPADRE as Modelo/#ro_Bemi_Padre','d.DESCRIPCION as Descripción',
                                    'd.CANTPADRES as Cantidad_Padres','d.V2','d.NOMBREEQUIPO as Nombre_de_Equipo/Elemento','d.MARCAEQUIPO as Marca_Equipo/Elemento',
                                    'd.TYPE as Modelo_de_Equipo(Type)','d.NUMSERIE as #ro_Serie(Fabr_Nr)','d.DESCRIPCIONCOMPLEMENTARIA as Descripción_Complementaria',
                                    'd.MAXIMO as #ro_de_Parte_VW(Máximo)','d.CANTELEMENTO as Cantidad_Elementos','d.V3', 'd.NOMENCLATURA as Nomenclatura_del_Equipo/Robot/Dispositivo',
                                    'd.NUMTABLERO as No_de_Tablero_O_Etiqueta','d.OBSERVACIONES as Observaciones','d.NUMINVENTARIO as #ro_de_Inventario')
        ->where('AFOS', '=', $id)
        ->get();

        $afos = json_decode(json_encode($afo_detalle), true);

        return Excel::create('Datos', function($excel) use ($afos) {
          $excel->getDefaultStyle()
          ->getAlignment()
          ->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

          $excel->sheet('datos', function($sheet) use ($afos){

            $sheet->row(1, [
                '#', 'Nave', 'Proyecto', 'Proceso', 'Linea', 'Afo', 'v1', 'Nombre Padre', 'Modelo BemiPadre',
                'Descripción', 'Cantidad Padres', 'v2', 'Nombre Equipo', 'Marca Equipo', 'Type', '#ro Serie', 'Descripción Complementaria',
                'Máximo', 'Cantidad Elemento', 'v3', 'Nomenclatura', '#ro Tablero', 'Observaciones', '#ro Inventario'
            ]);

            $sheet->cells('A1:F1', function($cells) {
                // manipulate the range of cells
                $cells->setBackground('#3EE3E8');
                $cells->setValignment('center');
                $cells->setAlignment('center');
                $cells->setFontFamily('Arial');
                $cells->setFontWeight('bold');
                $cells->setFontSize('9');
                $cells->setTextRotation(90);
            });
            $sheet->cells('G1', function($cells) {
                // manipulate the range of cells
                $cells->setBackground('#25D6BF');
                $cells->setFontColor('#25D6BF');
            });
            $sheet->cells('H1:K1', function($cells) {
                // manipulate the range of cells
                $cells->setBackground('#3EE3E8');
                $cells->setValignment('center');
                $cells->setAlignment('center');
                $cells->setFontFamily('Arial');
                $cells->setFontWeight('bold');
                $cells->setFontSize('9');
            });
            $sheet->cells('L1', function($cells) {
                // manipulate the range of cells
                $cells->setBackground('#25D6BF');
                $cells->setFontColor('#25D6BF');
            });
            $sheet->cells('M1', function($cells) {
                // manipulate the range of cells
                $cells->setBackground('#3EE3E8');
                $cells->setValignment('center');
                $cells->setAlignment('center');
                $cells->setFontFamily('Arial');
                $cells->setFontWeight('bold');
                $cells->setFontSize('9');
            });
            $sheet->cells('N1:S1', function($cells) {
                // manipulate the range of cells
                $cells->setBackground('#3EE3E8');
                $cells->setValignment('center');
                $cells->setAlignment('center');
                $cells->setFontFamily('Arial');
                $cells->setFontSize('9');
                $cells->setFontWeight('bold');
            });
            $sheet->cells('T1', function($cells) {
                // manipulate the range of cells
                $cells->setBackground('#25D6BF');
                $cells->setFontColor('#25D6BF');
            });
            $sheet->cells('U1:X1', function($cells) {
                // manipulate the range of cells
                $cells->setBackground('#3EE3E8');
                $cells->setValignment('center');
                $cells->setAlignment('center');
                $cells->setFontFamily('Arial');
                $cells->setFontSize(9);
                $cells->setFontWeight('bold');
            });

            $sheet->setHeight(1, 60);
            $sheet->setBorder('A1:X1', 'solid');


              $sheet->setWidth(array(
                'A'     =>  12,
                'B'     =>  5,
                'C'     =>  10,
                'D'     =>  15,
                'E'     =>  5,
                'F'     =>  5,
                'G'     =>  5,
                'H'     =>  25,
                'I'     =>  20,
                'J'     =>  20,
                'K'     =>  15,
                'L'     =>  5,
                'M'     =>  25,
                'N'     =>  18,
                'O'     =>  30,
                'P'     =>  25,
                'Q'     =>  25,
                'R'     =>  22,
                'S'     =>  18,
                'T'     =>  5,
                'U'     =>  35,
                'V'     =>  20,
                'W'     =>  25,
                'X'     =>  15
              ));


            //$sheet->rows($afos);
            //$sheet->fromArray($afos);
            $sheet->fromArray($afos, null, false, false);
          });
        })->download('xlsx');

        //return response()->json($afo_detalle);
  }

  public function PadresAfosDetalle($id, $NOMBREPADRE, Request $request)
  {
    $padres_detalle = \DB::table('datos as d')
      ->join('afos as a', 'a.id', '=', 'd.AFOS')
      ->join('procesos as pr', 'pr.id', '=', 'd.PROCESOS')
      ->join('lineas as l', 'l.id', '=', 'd.LINEAS')
      ->join('naves as n', 'n.id', '=', 'd.NAVES')
      ->select('d.id as Id','n.nombre as Nave','d.PROYECTO as Proyecto','pr.nombre as Proceso','l.nombre as Linea','a.nombre as Afo','d.V1',
                                  'd.NOMBREPADRE as Nombre_del_Padre','d.MODELOBEMIPADRE as Modelo/#ro_Bemi_Padre','d.DESCRIPCION as Descripción',
                                  'd.CANTPADRES as Cantidad_Padres','d.V2','d.NOMBREEQUIPO as Nombre_de_Equipo/Elemento','d.MARCAEQUIPO as Marca_Equipo/Elemento',
                                  'd.TYPE as Modelo_de_Equipo(Type)','d.NUMSERIE as #ro_Serie(Fabr_Nr)','d.DESCRIPCIONCOMPLEMENTARIA as Descripción_Complementaria',
                                  'd.MAXIMO as #ro_de_Parte_VW(Máximo)','d.CANTELEMENTO as Cantidad_Elementos','d.V3', 'd.NOMENCLATURA as Nomenclatura_del_Equipo/Robot/Dispositivo',
                                  'd.NUMTABLERO as No_de_Tablero_O_Etiqueta','d.OBSERVACIONES as Observaciones','d.NUMINVENTARIO as #ro_de_Inventario')
      ->where('AFOS', '=', $id)
      ->where('NOMBREPADRE', '=', $NOMBREPADRE)
      ->get();

        $afos = json_decode(json_encode($padres_detalle), true);

        return Excel::create('Datos', function($excel) use ($afos) {

          $excel->getDefaultStyle()
          ->getAlignment()
          ->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

          $excel->sheet('datos', function($sheet) use ($afos){

            $sheet->row(1, [
                '#', 'Nave', 'Proyecto', 'Proceso', 'Linea', 'Afo', 'v1', 'Nombre Padre', 'Modelo BemiPadre',
                'Descripción', 'Cantidad Padres', 'v2', 'Nombre Equipo', 'Marca Equipo', 'Type', '#ro Serie', 'Descripción Complementaria',
                'Máximo', 'Cantidad Elemento', 'v3', 'Nomenclatura', '#ro Tablero', 'Observaciones', '#ro Inventario'
            ]);

            $sheet->cells('A1:F1', function($cells) {
                // manipulate the range of cells
                $cells->setBackground('#3EE3E8');
                $cells->setValignment('center');
                $cells->setAlignment('center');
                $cells->setFontFamily('Arial');
                $cells->setFontWeight('bold');
                $cells->setFontSize('9');
                $cells->setTextRotation(90);
            });
            $sheet->cells('G1', function($cells) {
                // manipulate the range of cells
                $cells->setBackground('#25D6BF');
                $cells->setFontColor('#25D6BF');
            });
            $sheet->cells('H1:K1', function($cells) {
                // manipulate the range of cells
                $cells->setBackground('#3EE3E8');
                $cells->setValignment('center');
                $cells->setAlignment('center');
                $cells->setFontFamily('Arial');
                $cells->setFontWeight('bold');
                $cells->setFontSize('9');
            });
            $sheet->cells('L1', function($cells) {
                // manipulate the range of cells
                $cells->setBackground('#25D6BF');
                $cells->setFontColor('#25D6BF');
            });
            $sheet->cells('M1', function($cells) {
                // manipulate the range of cells
                $cells->setBackground('#3EE3E8');
                $cells->setValignment('center');
                $cells->setAlignment('center');
                $cells->setFontFamily('Arial');
                $cells->setFontWeight('bold');
                $cells->setFontSize('9');
            });
            $sheet->cells('N1:S1', function($cells) {
                // manipulate the range of cells
                $cells->setBackground('#3EE3E8');
                $cells->setValignment('center');
                $cells->setAlignment('center');
                $cells->setFontFamily('Arial');
                $cells->setFontSize('9');
                $cells->setFontWeight('bold');
            });
            $sheet->cells('T1', function($cells) {
                // manipulate the range of cells
                $cells->setBackground('#25D6BF');
                $cells->setFontColor('#25D6BF');
            });
            $sheet->cells('U1:X1', function($cells) {
                // manipulate the range of cells
                $cells->setBackground('#3EE3E8');
                $cells->setValignment('center');
                $cells->setAlignment('center');
                $cells->setFontFamily('Arial');
                $cells->setFontSize(9);
                $cells->setFontWeight('bold');
            });

            $sheet->setHeight(1, 60);
            $sheet->setBorder('A1:X1', 'solid');


              $sheet->setWidth(array(
                  'A'     =>  12,
                  'B'     =>  5,
                  'C'     =>  10,
                  'D'     =>  15,
                  'E'     =>  5,
                  'F'     =>  5,
                  'G'     =>  5,
                  'H'     =>  25,
                  'I'     =>  20,
                  'J'     =>  20,
                  'K'     =>  15,
                  'L'     =>  5,
                  'M'     =>  25,
                  'N'     =>  18,
                  'O'     =>  30,
                  'P'     =>  25,
                  'Q'     =>  25,
                  'R'     =>  22,
                  'S'     =>  18,
                  'T'     =>  5,
                  'U'     =>  35,
                  'V'     =>  20,
                  'W'     =>  25,
                  'X'     =>  15
              ));


            //$sheet->rows($afos);
            //$sheet->fromArray($afos);
            $sheet->fromArray($afos, null, false, false);
          });
        })->download('xlsx');



        //return response()->json($afo_detalle);
  }

  public function LineaDetalle($id)
  {
    $padres_detalle = DB::table('datos as d')->where('LINEAS','=',$id)
   ->leftJoin('lineas as l', 'd.LINEAS', '=', 'l.id')
   ->leftJoin('procesos as pr', 'pr.id', '=', 'd.PROCESOS')
   ->leftJoin('naves as n', 'n.id', '=', 'd.NAVES')
   /*->select('d.id','n.nombre as nave','d.PROYECTO','pr.nombre as proceso','l.nombre as linea','d.V1',
                               'd.NOMBREPADRE','d.MODELOBEMIPADRE','d.DESCRIPCION','d.CANTPADRES','d.V2','d.NOMBREEQUIPO',
                               'd.MARCAEQUIPO','d.TYPE','d.NUMSERIE','d.DESCRIPCIONCOMPLEMENTARIA','d.MAXIMO','d.CANTELEMENTO','d.V3',
                               'd.NOMENCLATURA','d.NUMTABLERO','d.OBSERVACIONES','d.NUMINVENTARIO')*/

   ->select('d.id as Id','n.nombre as Nave','d.PROYECTO as Proyecto','pr.nombre as Proceso','l.nombre as Linea','d.V1',
                               'd.NOMBREPADRE as Nombre_del_Padre','d.MODELOBEMIPADRE as Modelo/#ro_Bemi_Padre','d.DESCRIPCION as Descripción',
                               'd.CANTPADRES as Cantidad_Padres','d.V2','d.NOMBREEQUIPO as Nombre_de_Equipo/Elemento','d.MARCAEQUIPO as Marca_Equipo/Elemento',
                               'd.TYPE as Modelo_de_Equipo(Type)','d.NUMSERIE as #ro_Serie(Fabr_Nr)','d.DESCRIPCIONCOMPLEMENTARIA as Descripción_Complementaria',
                               'd.MAXIMO as #ro_de_Parte_VW(Máximo)','d.CANTELEMENTO as Cantidad_Elementos','d.V3', 'd.NOMENCLATURA as Nomenclatura_del_Equipo/Robot/Dispositivo',
                               'd.NUMTABLERO as No_de_Tablero_O_Etiqueta','d.OBSERVACIONES as Observaciones','d.NUMINVENTARIO as #ro_de_Inventario')

   ->get();

   $padres = json_decode(json_encode($padres_detalle), true);

   return Excel::create('Datos', function($excel) use ($padres) {

     $excel->getDefaultStyle()
     ->getAlignment()
     ->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

     $excel->sheet('datos', function($sheet) use ($padres){
       $sheet->cells('A1:E1', function($cells) {
           // manipulate the range of cells
           $cells->setBackground('#3EE3E8');
           $cells->setValignment('center');
           $cells->setAlignment('center');
           $cells->setFontFamily('Arial');
           $cells->setFontWeight('bold');
           $cells->setFontSize('9');
           $cells->setTextRotation(90);
       });
       $sheet->cells('F1', function($cells) {
           // manipulate the range of cells
           $cells->setBackground('#25D6BF');
           $cells->setFontColor('#25D6BF');
       });
       $sheet->cells('G1:I1', function($cells) {
           // manipulate the range of cells
           $cells->setBackground('#3EE3E8');
           $cells->setValignment('center');
           $cells->setAlignment('center');
           $cells->setFontFamily('Arial');
           $cells->setFontWeight('bold');
           $cells->setFontSize('9');
       });
       $sheet->cells('J1', function($cells) {
           // manipulate the range of cells
           $cells->setBackground('#3EE3E8');
           $cells->setValignment('center');
           $cells->setAlignment('center');
           $cells->setFontFamily('Arial');
           $cells->setFontWeight('bold');
           $cells->setFontSize('9');
       });
       $sheet->cells('K1', function($cells) {
           // manipulate the range of cells
           $cells->setBackground('#25D6BF');
           $cells->setFontColor('#25D6BF');
       });
       $sheet->cells('L1:R1', function($cells) {
           // manipulate the range of cells
           $cells->setBackground('#3EE3E8');
           $cells->setValignment('center');
           $cells->setAlignment('center');
           $cells->setFontFamily('Arial');
           $cells->setFontSize('9');
           $cells->setFontWeight('bold');
       });
       $sheet->cells('S1', function($cells) {
           // manipulate the range of cells
           $cells->setBackground('#25D6BF');
           $cells->setFontColor('#25D6BF');
       });
       $sheet->cells('T1:W1', function($cells) {
           // manipulate the range of cells
           $cells->setBackground('#3EE3E8');
           $cells->setValignment('center');
           $cells->setAlignment('center');
           $cells->setFontFamily('Arial');
           $cells->setFontSize(9);
           $cells->setFontWeight('bold');
       });

       $sheet->setHeight(1, 60);
       $sheet->setBorder('A1:W1', 'solid');

       $sheet->setWidth(array(
           'A'     =>  12,
           'B'     =>  10,
           'C'     =>  10,
           'D'     =>  25,
           'E'     =>  10,
           'F'     =>  5,
           'G'     =>  25,
           'H'     =>  25,
           'I'     =>  25,
           'J'     =>  25,
           'K'     =>  5,
           'L'     =>  30,
           'M'     =>  30,
           'N'     =>  30,
           'O'     =>  30,
           'P'     =>  35,
           'Q'     =>  30,
           'R'     =>  25,
           'S'     =>  5,
           'T'     =>  25,
           'U'     =>  25,
           'V'     =>  25,
           'W'     =>  25
       ));


       //$sheet->rows($afos);
       //$sheet->fromArray($afos);
       $sheet->fromArray($padres, null, 'A1', true);
     });
   })->download('xlsx');

  }

  public function TransporteDetalle($id, $NOMBREPADRE)
  {
    $padres_detalle = DB::table('datos as d')->where('LINEAS','=',$id)->where('NOMBREPADRE', '=', $NOMBREPADRE)
   ->leftJoin('lineas as l', 'd.LINEAS', '=', 'l.id')
   ->leftJoin('procesos as pr', 'pr.id', '=', 'd.PROCESOS')
   ->leftJoin('naves as n', 'n.id', '=', 'd.NAVES')
   ->select('d.id as Id','n.nombre as Nave','d.PROYECTO as Proyecto','pr.nombre as Proceso','l.nombre as Linea','d.V1',
                               'd.NOMBREPADRE as Nombre_del_Padre','d.MODELOBEMIPADRE as Modelo/#ro_Bemi_Padre','d.DESCRIPCION as Descripción',
                               'd.CANTPADRES as Cantidad_Padres','d.V2','d.NOMBREEQUIPO as Nombre_de_Equipo/Elemento','d.MARCAEQUIPO as Marca_Equipo/Elemento',
                               'd.TYPE as Modelo_de_Equipo(Type)','d.NUMSERIE as #ro_Serie(Fabr_Nr)','d.DESCRIPCIONCOMPLEMENTARIA as Descripción_Complementaria',
                               'd.MAXIMO as #ro_de_Parte_VW(Máximo)','d.CANTELEMENTO as Cantidad_Elementos','d.V3', 'd.NOMENCLATURA as Nomenclatura_del_Equipo/Robot/Dispositivo',
                               'd.NUMTABLERO as No_de_Tablero_O_Etiqueta','d.OBSERVACIONES as Observaciones','d.NUMINVENTARIO as #ro_de_Inventario')
   ->get();
   $padres = json_decode(json_encode($padres_detalle), true);

   return Excel::create('Datos', function($excel) use ($padres) {

     $excel->getDefaultStyle()
     ->getAlignment()
     ->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

     $excel->sheet('datos', function($sheet) use ($padres){
       $sheet->cells('A1:E1', function($cells) {
           // manipulate the range of cells
           $cells->setBackground('#3EE3E8');
           $cells->setValignment('center');
           $cells->setAlignment('center');
           $cells->setFontFamily('Arial');
           $cells->setFontWeight('bold');
           $cells->setFontSize('9');
           $cells->setTextRotation(90);
       });
       $sheet->cells('F1', function($cells) {
           // manipulate the range of cells
           $cells->setBackground('#25D6BF');
           $cells->setFontColor('#25D6BF');
       });
       $sheet->cells('G1:I1', function($cells) {
           // manipulate the range of cells
           $cells->setBackground('#3EE3E8');
           $cells->setValignment('center');
           $cells->setAlignment('center');
           $cells->setFontFamily('Arial');
           $cells->setFontWeight('bold');
           $cells->setFontSize('9');
       });
       $sheet->cells('J1', function($cells) {
           // manipulate the range of cells
           $cells->setBackground('#3EE3E8');
           $cells->setValignment('center');
           $cells->setAlignment('center');
           $cells->setFontFamily('Arial');
           $cells->setFontWeight('bold');
           $cells->setFontSize('9');
       });
       $sheet->cells('K1', function($cells) {
           // manipulate the range of cells
           $cells->setBackground('#25D6BF');
           $cells->setFontColor('#25D6BF');
       });
       $sheet->cells('L1:R1', function($cells) {
           // manipulate the range of cells
           $cells->setBackground('#3EE3E8');
           $cells->setValignment('center');
           $cells->setAlignment('center');
           $cells->setFontFamily('Arial');
           $cells->setFontSize('9');
           $cells->setFontWeight('bold');
       });
       $sheet->cells('S1', function($cells) {
           // manipulate the range of cells
           $cells->setBackground('#25D6BF');
           $cells->setFontColor('#25D6BF');
       });
       $sheet->cells('T1:W1', function($cells) {
           // manipulate the range of cells
           $cells->setBackground('#3EE3E8');
           $cells->setValignment('center');
           $cells->setAlignment('center');
           $cells->setFontFamily('Arial');
           $cells->setFontSize(9);
           $cells->setFontWeight('bold');
       });

       $sheet->setHeight(1, 60);
       $sheet->setBorder('A1:W1', 'solid');

       $sheet->setWidth(array(
         'A'     =>  12,
         'B'     =>  10,
         'C'     =>  10,
         'D'     =>  32,
         'E'     =>  10,
         'F'     =>  5,
         'G'     =>  32,
         'H'     =>  25,
         'I'     =>  25,
         'J'     =>  25,
         'K'     =>  5,
         'L'     =>  30,
         'M'     =>  30,
         'N'     =>  30,
         'O'     =>  30,
         'P'     =>  35,
         'Q'     =>  30,
         'R'     =>  25,
         'S'     =>  5,
         'T'     =>  25,
         'U'     =>  25,
         'V'     =>  25,
         'W'     =>  25
       ));


       //$sheet->rows($afos);
       //$sheet->fromArray($afos);
       $sheet->fromArray($padres, null, 'A1', true);
     });
   })->download('xlsx');
  }

}
