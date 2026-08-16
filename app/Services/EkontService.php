<?php

namespace App\Services;

use App\Models\Admin\EkontOffice;
use Illuminate\Support\Facades\Http;

class EkontService
{
    /**
     * This service handles the logic for the Econt API.
     * This includes offices, cities, addresses etc.
     */


    /**
     * Return all Econt offices.
     *
     * @return array
     */
    private static function offices(): array
    {
        $response = Http::timeout(30)->get(
            'https://ee.econt.com/services/Nomenclatures/NomenclaturesService.getOffices.json'
        );

        if ($response->failed()) {
            throw new \RuntimeException(
                'Неуспешно зареждане на офисите на Еконт.'
            );
        }

        $data = $response->json();

        return $data['offices'] ?? [];
    }


    /**
     * Insert all latest Econt offices in the database.
     *
     * @return void
     */
    public static function insertOffices(): void
    {
        $offices = static::offices();

        EkontOffice::truncate();

        foreach ($offices as $office) {

            EkontOffice::create([
                'office_id' => $office['id'],
                'name' => $office['name'],
                'city' => $office['address']['city']['name'] ?? '',
                'full_address' => $office['address']['fullAddress'] ?? '',
            ]);
        }
    }


    
}
