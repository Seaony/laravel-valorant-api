<?php

namespace Seaony\ValorantApi;

use GuzzleHttp\Client;
use Illuminate\Support\Arr;

/**
 * --------------------------------------------------------------------------
 * Valorant-API
 * --------------------------------------------------------------------------
 *
 * Valorant-API 是一个非官方的 Valorant 资产获取 API，
 * 不受 Riot Games 支持，可以使用它来获取游戏中的大部分物品、资源等。
 *
 * @website https://valorant-api.com
 * @document https://dash.valorant-api.com/docs
 */
class ValorantAsset
{
    /**
     * Returns data and assets of all agents and their abilities
     * Info: Yes, there are 2 Sovas. Use the isPlayableCharacter=true filter to make sure you don't have a "duplicate" Sova.
     *
     * @param $isPlayableCharacter bool
     * @param $language string
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function agents(bool $isPlayableCharacter = true, string $language = 'en-US')
    {
        return self::request('agents', ['isPlayableCharacter' => $isPlayableCharacter ? 'True' : 'False', 'language' => $language]);
    }

    /**
     * Returns data and assets of the requested agent
     *
     * @param  string  $agentUuid
     * @param  string  $language
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function agentByUuid(string $agentUuid, string $language = 'en-US')
    {
        return self::request("agents/{$agentUuid}", ['language' => $language]);
    }

    /**
     * Returns data and assets of all weapon buddies
     *
     * @param  string  $language
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function buddies(string $language = 'en-US')
    {
        return self::request("buddies", ['language' => $language]);
    }

    /**
     * Returns data and assets of the requested weapon buddy
     *
     * @param  string  $buddyUuid
     * @param  string  $language
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function buddyByUuid(string $buddyUuid, string $language = 'en-US')
    {
        return self::request("buddies/{$buddyUuid}", ['language' => $language]);
    }

    /**
     * Returns data and assets of all weapon buddy levels
     *
     * @param  string  $language
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function buddyLevels(string $language = 'en-US')
    {
        return self::request("buddies/levels", ['language' => $language]);
    }

    /**
     * Returns data and assets of the requested weapon buddy level
     *
     * @param  string  $buddyLevelUuid
     * @param  string  $language
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function buddyLevelByUuid(string $buddyLevelUuid, string $language = 'en-US')
    {
        return self::request("buddies/levels/{$buddyLevelUuid}", ['language' => $language]);
    }

    /**
     * Returns data and assets of all bundles
     *
     * @param  string  $language
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function bundles(string $language = 'en-US')
    {
        return self::request('bundles', ['language' => $language]);
    }

    /**
     * Returns data and assets of the requested bundle
     *
     * @param  string  $bundleUuid
     * @param  string  $language
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function bundleByUuid(string $bundleUuid, string $language = 'en-US')
    {
        return self::request("bundles/{$bundleUuid}", ['language' => $language]);
    }

    /**
     * Returns data and assets of all ceremonies
     *
     * @param  string  $language
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function ceremonies(string $language = 'en-US')
    {
        return self::request('ceremonies', ['language' => $language]);
    }

    /**
     * Returns data and assets of the requested ceremony
     *
     * @param  string  $ceremoniesUuid
     * @param  string  $language
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function ceremonyByUuid(string $ceremoniesUuid, string $language = 'en-US')
    {
        return self::request("ceremonies/{$ceremoniesUuid}", ['language' => $language]);
    }

    /**
     * Returns data and assets of all competitive tiers
     *
     * @param  string  $language
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function competitiveTiers(string $language = 'en-US')
    {
        return self::request('competitivetiers', ['language' => $language]);
    }

    /**
     * Returns data and assets the requested competitive tier table
     *
     * @param  string  $competitivetierUuid
     * @param  string  $language
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function competitiveTierByUuid(string $competitivetierUuid, string $language = 'en-US')
    {
        return self::request("competitivetiers/{$competitivetierUuid}", ['language' => $language]);
    }

    /**
     * Returns data and assets of all content tiers
     *
     * @param  string  $language
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function contentTiers(string $language = 'en-US')
    {
        return self::request('contenttiers', ['language' => $language]);
    }

    /**
     * Returns data and assets the requested content tier
     *
     * @param  string  $contenttierUuid
     * @param  string  $language
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function contentTierByUuid(string $contenttierUuid, string $language = 'en-US')
    {
        return self::request("contenttiers/{$contenttierUuid}", ['language' => $language]);
    }

    /**
     * https://valorant-api.com/v1/contracts
     *
     * @param  string  $language
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function contracts(string $language = 'en-US')
    {
        return self::request('contracts', ['language' => $language]);
    }

    /**
     * Returns data and assets the requested contract
     *
     * @param  string  $contractUuid
     * @param  string  $language
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function contractByUuid(string $contractUuid, string $language = 'en-US')
    {
        return self::request("contracts/{$contractUuid}", ['language' => $language]);
    }

    /**
     * Returns data and assets of all in-game currencies
     *
     * @param  string  $language
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function currencies(string $language = 'en-US')
    {
        return self::request('currencies', ['language' => $language]);
    }

    /**
     * Returns data and assets the requested in-game currency
     *
     * @param  string  $currencyUuid
     * @param  string  $language
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function currencyByUuid(string $currencyUuid, string $language = 'en-US')
    {
        return self::request("currencies/{$currencyUuid}", ['language' => $language]);
    }

    /**
     * Returns data and assets of all events
     *
     * @param  string  $language
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function events(string $language = 'en-US')
    {
        return self::request('events', ['language' => $language]);
    }

    /**
     * Returns data and assets of all events
     *
     * @param  string  $eventUuid
     * @param  string  $language
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function eventByUuid(string $eventUuid, string $language = 'en-US')
    {
        return self::request("events/{$eventUuid}", ['language' => $language]);
    }

    /**
     * Returns data and assets of all gamemodes
     *
     * @param  string  $language
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function gamemodes(string $language = 'en-US')
    {
        return self::request('gamemodes', ['language' => $language]);
    }

    /**
     * Returns data and assets of the requested gamemode
     *
     * @param  string  $gamemodeUuid
     * @param  string  $language
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function gamemodeByUuid(string $gamemodeUuid, string $language = 'en-US')
    {
        return self::request("gamemodes/{$gamemodeUuid}", ['language' => $language]);
    }

    /**
     * Returns data and assets of all gamemode equippables
     *
     * @param  string  $language
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function gamemodeEquippables(string $language = 'en-US')
    {
        return self::request('gamemodes/equippables', ['language' => $language]);
    }

    /**
     * Returns data and assets of the requested gamemode equippable
     *
     * @param  string  $gamemodeequippableUuid
     * @param  string  $language
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function gamemodeEquippableByUuid(string $gamemodeequippableUuid, string $language = 'en-US')
    {
        return self::request("gamemodes/equippables/{$gamemodeequippableUuid}", ['language' => $language]);
    }

    /**
     * Returns data and assets of all gear
     *
     * @param  string  $language
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function gear(string $language = 'en-US')
    {
        return self::request('gear', ['language' => $language]);
    }

    /**
     * Returns data and assets of the requested gear
     *
     * @param  string  $gearUuid
     * @param  string  $language
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function gearByUuid(string $gearUuid, string $language = 'en-US')
    {
        return self::request("gear/{$gearUuid}", ['language' => $language]);
    }

    /**
     * Returns data and assets of all level borders
     *
     * @param  string  $language
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function levelborders(string $language = 'en-US')
    {
        return self::request('levelborders', ['language' => $language]);
    }

    /**
     * Returns data and assets of the requested level border
     *
     * @param  string  $levelborderUuid
     * @param  string  $language
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function levelBorderByUuid(string $levelborderUuid, string $language = 'en-US')
    {
        return self::request("levelborders/{$levelborderUuid}", ['language' => $language]);
    }

    /**
     * Returns data and assets of all maps
     *
     * @param  string  $language
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function maps(string $language = 'en-US')
    {
        return self::request('maps', ['language' => $language]);
    }

    /**
     * Returns data and assets of the requested map
     *
     * @param  string  $mapUuid
     * @param  string  $language
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function mapByUuid(string $mapUuid, string $language = 'en-US')
    {
        return self::request("maps/{$mapUuid}", ['language' => $language]);
    }

    /**
     * Returns data and assets of all player cards
     *
     * @param  string  $language
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function playerCards(string $language = 'en-US')
    {
        return self::request('playercards', ['language' => $language]);
    }

    /**
     * Returns data and assets of the requested player card
     *
     * @param  string  $playercardUuid
     * @param  string  $language
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function playerCardByUuid(string $playercardUuid, string $language = 'en-US')
    {
        return self::request("playercards/{$playercardUuid}", ['language' => $language]);
    }

    /**
     * Returns data of all player title
     *
     * @param  string  $language
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function playerTitles(string $language = 'en-US')
    {
        return self::request('playertitles', ['language' => $language]);
    }

    /**
     * Returns data of the requested player title
     *
     * @param  string  $playertitleUuid
     * @param  string  $language
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function playerTitleByUuid(string $playertitleUuid, string $language = 'en-US')
    {
        return self::request("playertitles/{$playertitleUuid}", ['language' => $language]);
    }

    /**
     * Returns data of all seasons
     *
     * @param  string  $language
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function seasons(string $language = 'en-US')
    {
        return self::request('seasons', ['language' => $language]);
    }

    /**
     * Returns data of the requested season
     *
     * @param  string  $seasonUuid
     * @param  string  $language
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function seasonByUuid(string $seasonUuid, string $language = 'en-US')
    {
        return self::request("seasons/{$seasonUuid}", ['language' => $language]);
    }

    /**
     * Returns data of the requested season
     *
     * @param  string  $language
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function competitiveSeasons(string $language = 'en-US')
    {
        return self::request('seasons/competitive', ['language' => $language]);
    }

    /**
     * Returns data of the requested competitive season
     *
     * @param  string  $competitiveSeasonUuid
     * @param  string  $language
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function competitiveSeasonByUuid(string $competitiveSeasonUuid, string $language = 'en-US')
    {
        return self::request("seasons/competitive/{$competitiveSeasonUuid}", ['language' => $language]);
    }

    /**
     * Returns data and assets of all sprays
     *
     * @param  string  $language
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function sprays(string $language = 'en-US')
    {
        return self::request('sprays', ['language' => $language]);
    }

    /**
     * Returns data and assets of the requested spray
     *
     * @param  string  $sprayUuid
     * @param  string  $language
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function sprayByUuid(string $sprayUuid, string $language = 'en-US')
    {
        return self::request("sprays/{$sprayUuid}", ['language' => $language]);
    }

    /**
     * Returns data and assets of the requested spray
     *
     * @param  string  $language
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function sprayLevels(string $language = 'en-US')
    {
        return self::request('sprays/levels', ['language' => $language]);
    }

    /**
     * Returns data and assets of the requested spray level
     *
     * @param  string  $sprayLevelUuid
     * @param  string  $language
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function sprayLevelByUuid(string $sprayLevelUuid, string $language = 'en-US')
    {
        return self::request("sprays/levels/{$sprayLevelUuid}", ['language' => $language]);
    }

    /**
     * Returns data and assets of all themes
     *
     * @param  string  $language
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function themes(string $language = 'en-US')
    {
        return self::request('themes', ['language' => $language]);
    }

    /**
     * Returns data and assets of the requested theme
     *
     * @param  string  $themeUuid
     * @param  string  $language
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function themeByUuid(string $themeUuid, string $language = 'en-US')
    {
        return self::request("themes/{$themeUuid}", ['language' => $language]);
    }

    /**
     * Returns data and assets of all weapons
     *
     * @param  string  $language
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function weapons(string $language = 'en-US')
    {
        return self::request('weapons', ['language' => $language]);
    }

    /**
     * Returns data and assets of the requeted weapon
     *
     * @param  string  $weaponUuid
     * @param  string  $language
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function weaponByUuid(string $weaponUuid, string $language = 'en-US')
    {
        return self::request("weapons/{$weaponUuid}", ['language' => $language]);
    }

    /**
     * Returns data and assets of all weapon skins
     *
     * @param  string  $language
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function weaponSkins(string $language = 'en-US')
    {
        return self::request('weapons/skins', ['language' => $language]);
    }

    /**
     * Returns data and assets of the requeted weapon skin
     *
     * @param  string  $weaponSkinUuid
     * @param  string  $language
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function weaponSkinByUuid(string $weaponSkinUuid, string $language = 'en-US')
    {
        return self::request("weapons/skins/{$weaponSkinUuid}", ['language' => $language]);
    }

    /**
     * Returns data and assets of all weapon skin chromas
     *
     * @param  string  $language
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function weaponSkinChromas(string $language = 'en-US')
    {
        return self::request('weapons/skinchromas', ['language' => $language]);
    }

    /**
     * Returns data and assets of the requeted weapon skin chroma
     *
     * @param  string  $weaponSkinChromaUuid
     * @param  string  $language
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function weaponSkinChromaByUuid(string $weaponSkinChromaUuid, string $language = 'en-US')
    {
        return self::request("weapons/skinchromas/{$weaponSkinChromaUuid}", ['language' => $language]);
    }

    /**
     * Returns data and assets of all weapon skin levels
     *
     * @param  string  $language
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function weaponSkinLevels(string $language = 'en-US')
    {
        return self::request('weapons/skinlevels', ['language' => $language]);
    }

    /**
     * Returns data and assets of the requeted weapon skin level
     *
     * @param  string  $weaponSkinLevelUuid
     * @param  string  $language
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function weaponSkinLevelByUuid(string $weaponSkinLevelUuid, string $language = 'en-US')
    {
        return self::request("weapons/skinlevels/{$weaponSkinLevelUuid}", ['language' => $language]);
    }

    /**
     * Returns data of the current manifest & version the API is running on
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function version()
    {
        return self::request('version');
    }

    /**
     * @param $path string request path
     * @param $query array query parameters
     * @param $method string http method
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function request($path, $query = [], $method = 'GET')
    {
        // 构建 GuzzleHttp\Client 实例
        $client = new Client(['base_uri' => config('valorant.asset_uri', 'https://valorant-api.com/v1/')]);

        // 发送请求
        $response = $client->request($method, $path, ['query' => $query]);

        // 拆包
        $data = json_decode($response->getBody()->getContents(), true);

        // 返回响应
        return Arr::get($data, 'data');
    }
}