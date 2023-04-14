<?php

namespace Seaony\ValorantApi\Endpoints;

trait PreGameEndpoints
{
    /**
     * Get the pre-game match ID for the provided player
     *
     * @param  string  $shard
     * @param  string  $region
     * @param  string  $puuid
     *
     * @return mixed
     */
    public function preGamePlayer(string $shard, string $region, string $puuid)
    {
        return $this->request('GET', "https://glz-{$region}-1.{$shard}.a.pvp.net/pregame/v1/players/{$puuid}");
    }

    /**
     * Get Pre-Game match data
     *
     * @param  string  $shard
     * @param  string  $region
     * @param  string  $preGameMatchId
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function preGameMatch(string $shard, string $region, string $preGameMatchId)
    {
        return $this->request('GET', "https://glz-{$region}-1.{$shard}.a.pvp.net/pregame/v1/matches/{$preGameMatchId}");
    }

    /**
     * Get Pre-Game loadout data
     *
     * @param  string  $shard
     * @param  string  $region
     * @param  string  $preGameMatchId
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function preGameLoadouts(string $shard, string $region, string $preGameMatchId)
    {
        return $this->request('GET', "https://glz-{$region}-1.{$shard}.a.pvp.net/pregame/v1/matches/{$preGameMatchId}/loadouts");
    }
}
