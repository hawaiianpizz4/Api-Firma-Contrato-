<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');
header('Content-Type: application/json');

// require_once "../Categoria.php";

//     switch($_SERVER['REQUEST_METHOD']){
//         case 'GET':
//             echo json_encode(Categoria::getAll());
//             break;


//         case 'POST':
//             $datos=json_decode(file_get_contents('php://input'));
//             $pdf =base64_decode($datos->campo5, true);
//             // file_put_contents('/var/www/html/ventaspdv/ApiRi/file.pdf', $pdf);
//             // var_dump($pdf);
//             // var_dump($cedula->dato1);
//             if($datos != NULL){
//                 if(Categoria::insert($datos->dato1, $datos->campo2, $datos->campo3, $datos->campo4, $datos->campo5)){
//                     http_response_code(200);

//                 }//end if
//                 else{
//                     http_response_code(400);
//                 }//end else
//             }//end if
//             else{
//                 http_response_code(405);
//             }//end else
//             break;   
//         default:
//             break;
//     }

require_once "../models/Categoria.php";

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        // echo json_encode(Categoria::getAll());
        // break;
        http_response_code(400);
        echo json_encode("Metodo POST");
    case 'POST':
        // $datos = json_decode(file_get_contents('php://input'));
        // print_r($_POST);
        // die();
        $json = json_encode($_POST);
        $jsondecode = json_decode($json);
        // $codigo_interno = $datos->CODIGO_INTERNO;

        // print_r($jsondecode);
        // die();
        // $result=json_decode($jsondecode->value);
        // $result1=$result->CODIGO_INTERNO;
        // echo($result1);


        // die();
        // guardamos en el archivo el contenido que hay despues de la coma
        // $f = fopen("archivos", "w") or die("Unable to open file!");
        // fwrite($f, $pdf);
        // fclose($f);
        // var_dump($pdf);
        // if ($jsondecode != NULL) {
        $num1 = 1;
        $num2 = 2;
        // $nombrecodif=$datos->nombre;
        // $nombreformateado1=str_replace(' ', '', $nombrecodif);
        // Nuevos parametros
        $codigo_interno = $jsondecode->CODIGO_INTERNO;
        $cod_firma = $jsondecode->COD_FIRMA;
        $fecha_firma = $jsondecode->FECHA_FIRMA;
        $estado = $jsondecode->ESTADO;
        // Firmantes 1
        $cedula_firmante1 = $jsondecode->FIRMANTES->$num1->CEDULA;
        $nombre_firmante1 = $jsondecode->FIRMANTES->$num1->NOMBRE;
        $fecha_firma1 = $jsondecode->FIRMANTES->$num1->FECHA_FIRMA;
        $estado1 = $jsondecode->FIRMANTES->$num1->ESTADO;
        $canal1 = $jsondecode->FIRMANTES->$num1->CANAL;
        // Firmantes 2
        $cedula_firmante2 = $jsondecode->FIRMANTES->$num2->CEDULA;
        $nombre_firmante2 = $jsondecode->FIRMANTES->$num2->NOMBRE;
        $fecha_firma2 = $jsondecode->FIRMANTES->$num2->FECHA_FIRMA;
        $estado2 = $jsondecode->FIRMANTES->$num2->ESTADO;
        $canal2 = $jsondecode->FIRMANTES->$num2->CANAL;
        // Documentos
        $codigo_doc = $jsondecode->DOCUMENTOS->$num1->CODIGO_DOC;
        $nombre_doc = $jsondecode->DOCUMENTOS->$num1->NOMBRE_DOC;
        $estado = $jsondecode->DOCUMENTOS->$num1->ESTADO;
        $fecha_actualizacion = $jsondecode->DOCUMENTOS->$num1->FECHA_ACTUALIZACION;
        $pdf1 = $jsondecode->DOCUMENTOS->$num1->PDF;
        // Codigo
        $codigo = $jsondecode->codigo;
        if (
            Categoria::insert(
                $jsondecode->CODIGO_INTERNO, $jsondecode->COD_FIRMA, $jsondecode->FECHA_FIRMA, $jsondecode->ESTADO, $jsondecode->FIRMANTES->$num1->CEDULA, $jsondecode->FIRMANTES->$num1->NOMBRE,
                $jsondecode->FIRMANTES->$num1->FECHA_FIRMA, $jsondecode->FIRMANTES->$num1->ESTADO, $jsondecode->FIRMANTES->$num1->CANAL, $jsondecode->FIRMANTES->$num2->CEDULA, $jsondecode->FIRMANTES->$num2->NOMBRE,
                $jsondecode->FIRMANTES->$num2->FECHA_FIRMA, $jsondecode->FIRMANTES->$num2->ESTADO, $jsondecode->FIRMANTES->$num2->CANAL, $jsondecode->DOCUMENTOS->$num1->CODIGO_DOC,
                $jsondecode->DOCUMENTOS->$num1->NOMBRE_DOC, $jsondecode->DOCUMENTOS->$num1->ESTADO, $jsondecode->DOCUMENTOS->$num1->FECHA_ACTUALIZACION, $jsondecode->DOCUMENTOS->$num1->PDF,
                $jsondecode->codigo
            )
        ) {
            $pdf = base64_decode($jsondecode->DOCUMENTOS->$num1->PDF, true);
            $fechaActual = date('d-m-y');
            $nombreguardado = $nombre_firmante1;
            $nombrefinal = str_replace(' ', '', $nombreguardado);
            $url = "\\\\210.17.1.38\htdocs\\archivoscontratos\\";
            $pdf_final = file_put_contents($url . $codigo . '_' . $nombre_firmante1 . '_' . $fechaActual . '.pdf', $pdf);
            // $pdf_final = file_put_contents( $url. $codigo. '_' .$fechaActual. 'file.pdf');
            http_response_code(200);
            http_response_code(200);
            http_response_code(200);
            echo json_encode("Archivo Guardado correctamente");

        } //end if
        else {
            http_response_code(400);
            echo json_encode("No se Guardo el archivo correctamente");
        } //end else
        // 
        // var_dump($codigo_interno);
        // var_dump($cod_firma);
        // var_dump($fecha_firma);
        // var_dump($estado);

        // var_dump($cedula_firmante1);
        // var_dump($fecha_firma1);
        // var_dump($estado1);
        // var_dump($canal1);

        // var_dump($cedula_firmante2);
        // var_dump($fecha_firma2);
        // var_dump($estado2);
        // var_dump($canal2);



        // var_dump($codigo_doc);
        // var_dump($nombre_doc);
        // var_dump($estado);
        // var_dump($fecha_actualizacion);


        // var_dump($codigo);






        // } //end if
        // else {
        //     http_response_code(405);
        //     echo json_encode("405");

        // } //end else
        break;
    default:
        break;
}