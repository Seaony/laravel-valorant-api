<?php

namespace Seaony\ValorantApi\Endpoints;

trait StoreEndpoints
{
    /**
     * Get the current store prices for all items
     *
     * @param  string  $shard
     *
     * @return mixed
     */
    public function prices(string $shard)
    {
        return $this->request('GET', "https://pd.{$shard}.a.pvp.net/store/v1/offers");
    }

    /**
     * Get the currently available items in the store
     *
     * @param  string  $shard
     * @param  string  $puuid
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function storefront(string $shard, string $puuid)
    {
        return $this->request('GET', "https://pd.{$shard}.a.pvp.net/store/v2/storefront/{$puuid}");
    }

    /**
     * Get the current wallet balance for the user
     *
     * @param  string  $shard
     * @param  string  $puuid
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function wallet(string $shard, string $puuid)
    {
        return $this->request('GET', "https://pd.{$shard}.a.pvp.net/store/v1/wallet/{$puuid}");
    }

    /**
     * List what the player owns (agents, skins, buddies, ect.) Category names and IDs:
     *
     * @param  string  $shard
     * @param  string  $puuid
     * @param  int  $ItemTypeID
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function ownedItems(string $shard, string $puuid, string $ItemTypeID)
    {
        return $this->request('GET', "https://pd.{$shard}.a.pvp.net/store/v1/entitlements/{$puuid}/{$ItemTypeID}");
    }
}
