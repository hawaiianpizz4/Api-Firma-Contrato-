<?php
// require_once "Connection.php";
// class Categoria{
//     public static function getAll(){
//         $db =new Connection();
//         $query="SELECT * FROM encuesta_pdv_tbl LIMIT 3";
//         $resultado= $db->query($query);
//         $datos=[];
//         if($resultado->num_rows){
//             while($row = $resultado->fetch_assoc()){
//                 $datos[]=[
//                     'campo1' => $row['cmpIdentificacion'],
//                     'campo2' => $row['estadoVerificaPdv'],
//                     'campo3' => $row['pregunta1'],
//                     'campo4' => $row['respuesta1'],
//                     'campo5' => $row['pregunta2'],
//                     'campo6' => $row['respuesta2'],
//                 ];
//             }//end while
//             return $datos;
//         }//end if
//         return $datos;
//     }//end getAll

//     public static function insert($nombre, $ap, $am, $fn, $genero){
//         $db =new Connection();
//         $query="INSERT INTO example_tb(campo1, campo2, campo3, campo4, campo5)
//         VALUES('".$nombre."', '".$ap."', '".$am."', '".$fn."', '".$genero."')";
//         $db->query($query);
//         if($db->affected_rows){
//             return TRUE;
//         }//end insert
//         return FALSE;
//     }
// }
// require_once "../models/Connection.php";
require_once "../models/Connection2.php";
// require_once "Connection2.php";
class Categoria
{
    // public static function getAll()
    // {
    //     $db = new Connection();
    //     $query = "SELECT * FROM encuesta_pdv_tbl LIMIT 3";
    //     $resultado = $db->query($query);
    //     $datos = [];
    //     if ($resultado->num_rows) {
    //         while ($row = $resultado->fetch_assoc()) {
    //             $datos[] = [
    //                 'campo1' => $row['cmpIdentificacion'],
    //                 'campo2' => $row['estadoVerificaPdv'],
    //                 'campo3' => $row['pregunta1'],
    //                 'campo4' => $row['respuesta1'],
    //                 'campo5' => $row['pregunta2'],
    //                 'campo6' => $row['respuesta2'],
    //             ];
    //         } //end while
    //         return $datos;
    //     } //end if
    //     return $datos;
    // } //end getAll

    public static function insert(
        $CODIGO_INTERNOPROBANDO2,
        $COD_FIRMA,
        $FECHA_FIRMA,
        $ESTADO,
        $FIRMANTES_CEDULA1,
        $FIRMANTES_NOMBRE1,
        $FIRMANTES_FECHA_FIRMA1,
        $FIRMANTES_ESTADO1,
        $FIRMANTES_CANAL1,
        $FIRMANTES_CEDULA2,
        $FIRMANTES_NOMBRE2,
        $FIRMANTES_FECHA_FIRMA2,
        $FIRMANTES_ESTADO2,
        $FIRMANTES_CANAL2,
        $DOCUMENTOS_CODIGO_DOC,
        $DOCUMENTOS_NOMBRE_DOC,
        $DOCUMENTOS_ESTADO,
        $DOCUMENTOS_FECHA_ACTUALIZACION,
        $DOCUMENTOS_PDF,
        $CODIGO
    )
    {
        // $db =new Connection();
        $db2 = new Connection2();
        $fechaActual = date('d-m-y');
        // $nombrefinal=str_replace(' ', '',$FIRMANTES_NOMBRE1);
        $url = "http://200.7.249.21:90/archivoscontratos/" . $CODIGO . '_' . $FIRMANTES_NOMBRE1 . '_' . $fechaActual . '.pdf';
        $query = $db2->prepare ("INSERT INTO informacionfirma_tb(CODIGO_INTERNOPROBANDO,COD_FIRMA,FECHA_FIRMA,ESTADO,FIRMANTES_CEDULA1,FIRMANTES_NOMBRE1,FIRMANTES_FECHA_FIRMA1,
        FIRMANTES_ESTADO1,FIRMANTES_CANAL1,FIRMANTES_CEDULA2, FIRMANTES_NOMBRE2, FIRMANTES_FECHA_FIRMA2,FIRMANTES_ESTADO2,FIRMANTES_CANAL2,
        DOCUMENTOS_CODIGO_DOC,DOCUMENTOS_NOMBRE_DOC,DOCUMENTOS_ESTADO,DOCUMENTOS_FECHA_ACTUALIZACION,DOCUMENTOS_PDF, CODIGO)
        VALUES('" . $CODIGO_INTERNOPROBANDO2 . "', '" . $COD_FIRMA . "', '" . $FECHA_FIRMA . "', '" . $ESTADO . "', '" . $FIRMANTES_CEDULA1 . "', '" . $FIRMANTES_NOMBRE1 . "','" . $FIRMANTES_FECHA_FIRMA1 . "',
        '" . $FIRMANTES_ESTADO1 . "', '" . $FIRMANTES_CANAL1 . "', '" . $FIRMANTES_CEDULA2 . "',  '" . $FIRMANTES_NOMBRE2 . "', '" . $FIRMANTES_FECHA_FIRMA2 . "', '" . $FIRMANTES_ESTADO2 . "',
        '" . $FIRMANTES_CANAL2 . "', '" . $DOCUMENTOS_CODIGO_DOC . "', '" . $DOCUMENTOS_NOMBRE_DOC . "', '" . $DOCUMENTOS_ESTADO . "', '" . $DOCUMENTOS_FECHA_ACTUALIZACION . "','" . $url . "',
        '" . $CODIGO . "')");
        // $query2="UPDATE vivewow.validacion_datos_vivewow
        // SET ESTADO = 'FIRMADO' WHERE vivewow.validacion_datos_vivewow.CEDULA='".$nombre."'";
        $query->execute();
        // $db2->query($query2);
        // var_dump($db2);
        if ($db2->affected_rows) {
            return TRUE;
        } else {
            return FALSE;
        }
        //end insert

    }
}