<?php

namespace App;

use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7;

class Api{
    //
     public function getNews($source)
    {

        try {

              $client  = new GuzzleHttpClient();
              //with the code below, we can get news from multiple sources 
              $apiRequest = $client->request('GET', 'https://newsapi.org/v1/articles?source='.$source.'&sortBy=top&apiKey=YOUR-API-KEY' );

              $content = json_decode($apiRequest->getBody()->getContents(), true);

            return $content['articles'];

            } catch (RequestException $e) {
              //For handling exception
              echo Psr7\str($e->getRequest());
              if ($e->hasResponse()) {
                echo Psr7\str($e->getResponse());
              }
         }
    }

    public function getAllSources()
    {

        try {

                $client = new GuzzleHttpClient();

                $apiRequest = $client->request('GET', 'https://newsapi.org/v1/sources?language=en' );

                $content = json_decode($apiRequest->getBody()->getContents(), true);

            return $content['sources'];

            } catch (RequestException $e) {
              //For handling exception
               echo Psr7\str($e->getRequest());
               if ($e->hasResponse()) {
                    echo Psr7\str($e->getResponse());
                }
          }
    }
}