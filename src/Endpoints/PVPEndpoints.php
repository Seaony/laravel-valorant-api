<?php

namespace Seaony\ValorantApi\Endpoints;

trait PVPEndpoints
{
    /**
     * Get a list of seasons, acts, and events
     *
     * @param  string  $shard
     *
     * @return mixed
     */
    public function fetchContent(string $shard)
    {
        return $this->request('GET', "https://shared.{$shard}.a.pvp.net/content-service/v3/content");
    }

    /**
     * Get the account level, XP, and XP history for the given player
     *
     * @param  string  $shard
     * @param  string  $puuid
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function accountXP(string $shard, string $puuid)
    {
        return $this->request('GET', "https://pd.{$shard}.a.pvp.net/account-xp/v1/players/{$puuid}");
    }

    /**
     * Get the player's current loadout. Only works for your own PUUID.
     *
     * @param  string  $shard
     * @param  string  $puuid
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function playerLoadout(string $shard, string $puuid)
    {
        return $this->request('GET', "https://pd.{$shard}.a.pvp.net/personalization/v2/players/{$puuid}/playerloadout");
    }

    /**
     * Set the player's current loadout.
     *
     * @param  string  $shard
     * @param  string  $puuid
     * @param  array  $params
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function setPlayerLoadout(string $shard, string $puuid, array $params)
    {
        return $this->request('PUT', "https://pd.{$shard}.a.pvp.net/personalization/v2/players/{$puuid}/playerloadout", ['json' => $params]);
    }

    /**
     * Get a player's MMR and history
     *
     * @param  string  $shard
     * @param  string  $puuid
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function playerMMR(string $shard, string $puuid)
    {
        return $this->request('GET', "https://pd.{$shard}.a.pvp.net/mmr/v1/players/{$puuid}");
    }

    /**
     * Get the match history for the given player
     *
     * @param  string  $shard
     * @param  string  $puuid
     * @param  int  $startIndex
     * @param  int  $endIndex
     * @param  string  $queue
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function matchHistory(string $shard, string $puuid, int $startIndex = 0, int $endIndex = 20, string $queue = '')
    {
        $query = array_filter([
            'startIndex' => $startIndex,
            'endIndex'   => $endIndex,
            'queue'      => $queue,
        ]);

        return $this->request('GET', "https://pd.{$shard}.a.pvp.net/match-history/v1/history/{$puuid}", ['query' => $query]);
    }

    /**
     * Get the details of a match after it ends
     *
     * @param  string  $shard
     * @param  string  $matchID
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function matchDetails(string $shard, string $matchID)
    {
        return $this->request('GET', "https://pd.{$shard}.a.pvp.net/match-details/v1/matches/{$matchID}");
    }

    /**
     * Get recent games and how they changed ranking
     *
     * @param  string  $shard
     * @param  string  $puuid
     * @param  int  $startIndex
     * @param  int  $endIndex
     * @param  string  $queue
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function competitiveUpdates(string $shard, string $puuid, int $startIndex = 0, int $endIndex = 20, string $queue = '')
    {
        $query = array_filter([
            'startIndex' => $startIndex,
            'endIndex'   => $endIndex,
            'queue'      => $queue,
        ]);

        return $this->request('GET', "https://pd.{$shard}.a.pvp.net/mmr/v1/players/{$puuid}/competitiveupdates", ['query' => $query]);
    }

    /**
     * Get the leaderboard for a given season
     *
     * @param  string  $shard
     * @param  string  $seasonId
     * @param  int  $startIndex
     * @param  int  $size
     * @param  string  $query
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function leaderboard(string $shard, string $seasonId, int $startIndex = 0, int $size = 510, string $query = '')
    {
        $params = array_filter([
            'startIndex' => $startIndex,
            'size'       => $size,
            'query'      => $query,
        ]);

        return $this->request('GET', "https://pd.{$shard}.a.pvp.net/mmr/v1/leaderboards/affinity/${shard}/queue/competitive/season/{$seasonId}", ['query' => $params]);
    }

    /**
     * Get the matchmaking penalties for the given player
     *
     * @param  string  $shard
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function penalties(string $shard)
    {
        return $this->request('GET', "https://pd.{$shard}.a.pvp.net/restrictions/v3/penalties");
    }

    /**
     * Get the config for the given player
     *
     * @param  string  $shard
     * @param  string  $region
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function config(string $shard, string $region)
    {
        return $this->request('GET', "https://pd.{$shard}.a.pvp.net/v1/config/{$region}");
    }

    /**
     * @param  string  $shard
     * @param  array  $nameServiceBody
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function nameService(string $shard, array $nameServiceBody = [])
    {
        return $this->request('PUT', "https://pd.{$shard}.a.pvp.net/name-service/v2/players", ['json' => $nameServiceBody]);
    }
}
