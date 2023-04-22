<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsultasController extends Controller
{
    public function consultar(Request $request)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://armada.mide.gob.do/api/auth/login',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'authentication: eyJ1c2VybmFtZSI6IjAwMDAwMDAwMDAwIiwicGFzc3dvcmQiOiJ0ZXN0MTIzIiwiaXNBcHBVc2VyIjoiZmFsc2UifQ=='
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        $resp = json_decode($response, true);
        // obteniendo el token autentication para poder usar la consulta de la cedula
        $tokenAuth = $resp['accessToken'];
        $documento = $request->documento;

        $curl_c = curl_init();

        curl_setopt_array($curl_c, array(
            CURLOPT_URL => 'https://armada.mide.gob.do/api/JceConsult/consultarCedula?cedula=' . $documento . '&includeFoto=false',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $tokenAuth
            ),
        ));

        $response_ced = curl_exec($curl_c);
        curl_close($curl_c);
        $resp_c = json_decode($response_ced, true);
        $datos = array();
        $oldDate = strtotime($resp_c['fecha_nac']);
        $newDate = date('Y-m-d', $oldDate);
        $datos[] = array('nombres' => trim(ucfirst($resp_c['nombres'])), 'apellidos' => trim(ucfirst($resp_c['apellido1'])) . ' ' . trim(ucfirst($resp_c['apellido2'])));
        return json_encode($datos);
    }
}
