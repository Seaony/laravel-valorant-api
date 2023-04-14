<?php

namespace Seaony\ValorantApi\Endpoints;

use Illuminate\Support\Arr;

trait AuthenticationEndpoints
{
    /**
     * Prepare cookies for auth request
     *
     * @return false|mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function authCookies($params = [])
    {
        $params = $params ?: [
            'client_id'     => 'play-valorant-web-prod',
            'nonce'         => '1',
            'redirect_uri'  => 'https://playvalorant.com/opt_in',
            'response_type' => 'token id_token',
            'scope'         => 'account openid',
        ];

        return $this->request('POST', 'https://auth.riotgames.com/api/v1/authorization', ['json' => $params]);
    }

    /**
     * Perform authorization request to get token
     * Requires cookies from the Auth Cookies stage. The token can be found in the uri property.
     *
     * @param  string  $username  Riot Username
     * @param  string  $password  Riot Password
     * @param $remember
     *
     * @return false|mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function authRequest(string $username, string $password, $remember = true)
    {
        $params = [
            'type'     => 'auth',
            'username' => $username,
            'password' => $password,
            'remember' => $remember,
            'language' => 'en_US',
        ];

        return $this->request('PUT', 'https://auth.riotgames.com/api/v1/authorization', ['json' => $params]);
    }

    /**
     * Get a new token using the cookies from a previous
     * authorization request Use the saved cookies from Auth Request
     * (specifically the ssid cookie). The token can be found from the url
     * this request redirects to. Recommended to use this endpoint instead of
     * storing the password and sending it again.
     *
     * @return false|mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function reauthCookie()
    {
        $reauthURL = 'https://auth.riotgames.com/authorize?redirect_uri=https%3A%2F%2Fplayvalorant.com%2Fopt_in&client_id=play-valorant-web-prod&response_type=token%20id_token&nonce=1';

        $response = $this->request('GET', $reauthURL, ['allow_redirects' => false], false);

        // 从响应头中获取 location
        $location = $response->getHeader('location');

        // 如果没有 location 则返回 false
        if (!count($location)) {
            return false;
        }

        // 返回 Token
        return $this->parseTokenURL($location[0]);
    }

    /**
     * Get entitlement for remote requests with a token
     *
     * @return void
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function entitlement()
    {
        return $this->request('POST', 'https://entitlements.auth.riotgames.com/api/token/v1');
    }

    /**
     * https://auth.riotgames.com/api/v1/authorization
     *
     * @param $code Multi-Factor Authentication Code
     *
     * @return false|mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function multiFactorAuthentication($code, $rememberDevice = true)
    {
        $params = [
            'type'           => 'multifactor',
            'code'           => $code,
            'rememberDevice' => $rememberDevice,
        ];

        return $this->request('PUT', 'https://auth.riotgames.com/api/v1/authorization', ['json' => $params]);
    }

    /**
     * Get the PUUID and other info from a token
     *
     * @return false|mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function playerInfo()
    {
        return $this->request('GET', 'https://auth.riotgames.com/userinfo');
    }

    /**
     * Parse token from auth url
     *
     * @param $url string Riot auth url
     *
     * @return array
     */
    public function parseTokenURL(string $url)
    {
        $parsed = parse_url($url);

        if (!isset($parsed['fragment'])) {
            return false;
        }

        parse_str($parsed['fragment'], $params);

        return $params;
    }
}
