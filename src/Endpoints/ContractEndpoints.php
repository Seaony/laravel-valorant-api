<?php

namespace Seaony\ValorantApi\Endpoints;

trait ContractEndpoints
{
    /**
     * Get details for item upgrades
     *
     * @param  string  $shard
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function itemUpgrades(string $shard)
    {
        return $this->request('GET', "https://pd.{$shard}.a.pvp.net/contract-definitions/v3/item-upgrades");
    }

    /**
     * @param  string  $shard
     * @param  string  $puuid
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function contracts(string $shard, string $puuid)
    {
        return $this->request('GET', "https://pd.{$shard}.a.pvp.net/contracts/v1/contracts/{$puuid}");
    }

    /**
     * Activate a specific contract by ID
     *
     * @param  string  $shard
     * @param  string  $puuid
     * @param  string  $contractId
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function activateContract(string $shard, string $puuid, string $contractId)
    {
        return $this->request('POST', "https://pd.{$shard}.a.pvp.net/contracts/v1/contracts/{$puuid}/special/{$contractId}");
    }

}
