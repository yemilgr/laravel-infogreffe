<?php

namespace Yemilgr\Infogreffe;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use InvalidArgumentException;
use Yemilgr\Infogreffe\Entity\Enterprise;

/**
 * Class Infogreffe
 * @package Yemilgr\Infogreffe
 */
class Infogreffe
{
    private string $apiEndpoint = 'https://api.datainfogreffe.fr/api/v1/';

    private array $apiToken;

    private string $lastError = '';

    public function __construct(string $token = null)
    {
        if (is_null($token)) {
            throw new InvalidArgumentException('Infogreffe apiToken is missing');
        }

        $this->apiToken = ['token' => $token];
    }

    /**
     * Get Enterprise Fiche
     *
     * @param string $sirenNumber
     * @return Enterprise|null
     */
    public function getEnterpriceFiche(string $sirenNumber)
    {
        $response = Http::get("{$this->apiEndpoint}Entreprise/FicheIdentite/$sirenNumber", $this->apiToken);

        if ($response->failed()) {
            $this->handleFailResponse($response);
            return null;
        }

        return new Enterprise($response->json('Data'));
    }

    private function handleFailResponse(Response $response): void
    {
        if ($response->clientError()) {
            $this->lastError = $response->json('Message');
        }
    }

    public function getLastError(): string
    {
        return $this->lastError;
    }
}