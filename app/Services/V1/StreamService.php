<?php

namespace App\Services\V1;

use App\Http\Resources\AlbumResource;
use App\Models\Album;
use App\Utils\ArrayTrait;
use App\Utils\UrlTrait;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;

class StreamService implements SpotifyInterface
{
    use ArrayTrait, UrlTrait;

    protected string $accessToken;

    public function __construct()
    {
        $this->accessToken = '';
    }

    public function requestAccessToken(): Response
    {
        $parameters = [
            'form_params' => [
                'client_id' => '',
                'grant_type' => 'client_credentials'
            ]
        ];

        $credentials = base64_encode(env('SPOTIFY_CLIENT_ID').':'.env('SPOTIFY_SECRET'));
        $headers = [
            'Authorization' => 'Basic '.$credentials,
            'Content-Type' => 'application/x-www-form-urlencoded'
        ];

        $client = new Client();
        $request = new Request(
            'POST',
            self::URI_SITE_AUTHORIZE.'/api/token', $headers
        );
        $response = $client->sendAsync($request, $parameters)->wait();
        $response = $this->normalizeRequest($response);
        $this->setAccessToken($response->access_token);

        return response("Access Token", 200);
    }

    protected function authHeaders(): array
    {
        return [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => "Bearer {$this->getAccessToken()}"
        ];
    }

    public function sendRequest($method, $url, $id = null, $parameters = [])
    {
        $parameters = $this->arrayToStringUrl($parameters);
        $url = $this->formatUrl($url, $id, $parameters);
        $client = new Client();
        $request = new Request(
            $method,
            $url,
            $this->authHeaders()
        );

        $response = $client->sendAsync($request)->wait();

        return $this->normalizeRequest($response);
    }

    public function normalizeRequest($response)
    {
        return json_decode($response->getBody()->getContents());
    }

    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
    }
}
