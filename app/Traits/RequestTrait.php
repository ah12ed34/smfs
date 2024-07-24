<?php

namespace App\Traits;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

trait RequestTrait
{


    //For emitting Scoket IO Messages
    public function sendSocketIONotification($channel, $message)
    {
        try {

            if (is_array($message)) {
                $message = json_encode($message);
            }



            // $endpoint = 'http://localhost:3000/broadcast';
            $endpoint = 'https://server-v02x.onrender.com/broadcast';
            $endpoint .= '?channel=' . $channel . '&message=' . urlencode($message);;
            $headers = ['Content-Type' => 'application/json', 'Accept' => 'application/json'];
            $client = new Client(['verify' => false]);
            $response = $client->request('GET', $endpoint, ['headers' => $headers]);
            return [
                'statusCode' => $response->getStatusCode(),
                'body' => json_decode($response->getBody(), true),
            ];
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        } catch (ClientException $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
