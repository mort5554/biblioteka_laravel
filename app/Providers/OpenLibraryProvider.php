<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class OpenLibraryProvider extends ServiceProvider
{
    /**
     * Register services.
     */

    protected $serviceURL;

    public function __construct(){
        $this->serviceURL = env('OPEN_LIBRARY_API_URL');
    }

    private function sendGetRequest(array $params){
        $query = http_build_query($params);

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $this->serviceURL.'?'.$query,
        ]);
        $response = curl_exec($curl);

        curl_close($curl);

        return $response;
    }

    public function search(string $bookTitle){
        return $this->sendGetRequest(array("q" => $bookTitle));
    }
}
