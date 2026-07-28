<?php

namespace App\Services;

use App\Models\Admin\SpeedyOffice;


class SpeedyService
{
    /** This controller handles the logic for the Speedy API */
    /** This includes offices, cities etc. */

    /** API request to Speedy
     *
     * @param string $apiURL
     * @param array[] $jsonData
     *
     */
    private static function apiRequest($apiURL, $jsonData)
    {
        $jsonDataEncoded = json_encode($jsonData);

        $curl = curl_init($apiURL);

        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonDataEncoded);

        $jsonResponse = curl_exec($curl);

        if ($jsonResponse === FALSE) {
            exit("cURL Error: " . curl_error($curl));
        }

        return ($jsonResponse);
    }


    /** Return all the speedy offices
     * @return array[]
     */
    private static function offices(): array
    {
        $jsonData = [
            'userName' => env('SPEEDY_API_USERNAME'),
            'password' => env('SPEEDY_API_PASSWORD'),
            'language' => 'BG',
            'countryId' => 100,
        ];


        $jsonResponse = self::apiRequest(env('SPEEDY_API_BASE_URL') . 'location/office/', $jsonData);
        $jsonResponse = json_decode($jsonResponse, true);

        return  $jsonResponse['offices'];
    }

    /**
     * Call this method whenever you want to insert all latest offices
     *
     * @return void
     */
    public static function insertOffices(): void
    {
        $offices = static::offices();

        SpeedyOffice::truncate();

        foreach ($offices as $office) {
            SpeedyOffice::create([
                'office_id' => $office['id'],
                'name'      => $office['name'],
            ]);
        }
    }
}
