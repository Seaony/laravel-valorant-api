<?php

namespace Seaony\ValorantApi\Endpoints;

trait CurrentGameEndpoints
{
    /**
     * Get the current game match ID for the provided player
     *
     * @param  string  $shard
     * @param  string  $region
     * @param  string  $puuid
     *
     * @return mixed
     */
    public function currentGamePlayer(string $shard, string $region, string $puuid)
    {
        return $this->request('GET', "https://glz-{$region}-1.{$shard}.a.pvp.net/core-game/v1/players/{$puuid}");
    }

    /**
     * Get the current game match info
     *
     * @param  string  $shard
     * @param  string  $region
     * @param  string  $currentGameMatchId
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function currentGameMatch(string $shard, string $region, string $currentGameMatchId)
    {
        return $this->request('GET', "https://glz-{$region}-1.{$shard}.a.pvp.net/core-game/v1/matches/{$currentGameMatchId}");
    }

    /**
     * @param  string  $shard
     * @param  string  $region
     * @param  string  $currentGameMatchId
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function currentGameLoadouts(string $shard, string $region, string $currentGameMatchId)
    {
        return $this->request('GET', "https://glz-{$region}-1.{$shard}.a.pvp.net/core-game/v1/matches/{$currentGameMatchId}/loadouts");
    }

    /**
     * Quits the current game
     *
     * @param  string  $shard
     * @param  string  $region
     * @param  string  $puuid
     * @param  string  $currentGameMatchId
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function currentGameQuit(string $shard, string $region, string $puuid, string $currentGameMatchId)
    {
        return $this->request('POST', "https://glz-{$region}-1.{$shard}.a.pvp.net/core-game/v1/players/{$puuid}/disassociate/{$currentGameMatchId}");
    }

}