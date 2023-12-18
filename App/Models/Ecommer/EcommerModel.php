<?php 
namespace App\Models\Ecommer;
class EcommerModel{

    public function getCategory(){
        $apiUrl= 'https://api.bind.com.mx/api/Categories';

        $options = [
                'http' => [
                    'method' => 'GET',
                    'header' => [
                        'Content-Type: application/json',
                        'Authorization: Bearer ' . TOKE_ACCESS,
                    ],
                ],
            ];
        $context = stream_context_create($options);

        $response = file_get_contents($apiUrl, false, $context);

        if ($response === false) {
            die('Error al realizar la solicitud a la API');
        }

        $data = json_decode($response, true);

        if ($data === null
        ) {
            die('Error al decodificar la respuesta JSON');
        }

        return $data;
    }
}