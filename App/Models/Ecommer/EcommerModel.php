<?php

namespace App\Models\Ecommer;

class EcommerModel
{

    public function getCategory()
    {
        $apiUrl = 'https://api.bind.com.mx/api/Categories';

        $options = [
            'http' => [
                'method' => 'GET',
                'header' => [
                    'Content-Type: application/json; charset =utf-8',

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

        if (
            $data === null
        ) {
            die('Error al decodificar la respuesta JSON');
        }

        return $data;
    }

    public function getInventoryByWarehouses()
    {
        $apiUrl = "https://api.bind.com.mx/api/Inventory?warehouseID=d8592359-619f-46e4-942c-77df27bb96f2&";

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

        if (
            $data === null
        ) {
            die('Error al decodificar la respuesta JSON');
        }

        return $data;
    }

    public function ProductsPriceAndInventory()
    {
        $apiUrl = "https://api.bind.com.mx/api/ProductsPriceAndInventory?warehouseID=d8592359-619f-46e4-942c-77df27bb96f2&priceListId=9b30f5b9-7b7c-4b08-bb53-a85194e3b5a9";

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

        if (
            $data === null
        ) {
            die('Error al decodificar la respuesta JSON');
        }

        return $data;
    }

    public function getUrlImg()
    {
        $apiUrl = "https://api.bind.com.mx/api/Products";

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

        if (
            $data === null
        ) {
            die('Error al decodificar la respuesta JSON');
        }

        return $data;
    }
}
