<?php

namespace App\Http\Controllers\Api\V1;

use App\Assembler\V1\AlbumAssembler;
use App\Http\Controllers\Controller;
use App\Models\FavoriteList;
use App\Services\V1\StreamService;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AlbumController extends Controller
{
    protected StreamService $service;

    public function __construct(StreamService $service)
    {
        $this->service = $service;
    }

    /**
     * @OA\Get (
     *  path="/api/V1/albums))
     *  tags={"Albums"},
     * @OA\Parameter(
     *     name="page",
     *     description="Page number",
     *     required=false,
     *     in="path",
     *       @OA\Schema(
     *       type="integer"
     *     )
     *   ),
     * @OA\Response(
     *     response="200",
     *     description="Returns the album by id",
     *     @OA\JsonContent(
     *       type="array",
     *       @OA\Items(ref="#/components/schemas/Album")
     *     )
     *   )
     * )
     * @throws GuzzleException
     */
    public function search(Request $request)
    {
        $parameters = $request->all();
        $parameters['type'] = 'album';
        $this->service->requestAccessToken();
        $response = $this->service->sendRequest('GET','/api/v1/search', null, $parameters);
        $album = new AlbumAssembler();
        return $album->assembler($response);
    }
}
