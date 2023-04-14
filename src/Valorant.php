<?php

namespace Seaony\ValorantApi;

use GuzzleHttp\Client;
use Illuminate\Support\Arr;
use GuzzleHttp\Cookie\CookieJar;
use Illuminate\Support\Facades\Cache;
use Seaony\ValorantApi\Endpoints\PVPEndpoints;
use Seaony\ValorantApi\Endpoints\StoreEndpoints;
use Seaony\ValorantApi\Endpoints\PreGameEndpoints;
use Seaony\ValorantApi\Endpoints\ContractEndpoints;
use Seaony\ValorantApi\Endpoints\CurrentGameEndpoints;
use Seaony\ValorantApi\Endpoints\AuthenticationEndpoints;

class Valorant
{
    use PVPEndpoints,
        StoreEndpoints,
        PreGameEndpoints,
        ContractEndpoints,
        CurrentGameEndpoints,
        AuthenticationEndpoints;

    /**
     * @var \GuzzleHttp\Client http client
     */
    protected Client $client;

    /**
     * @var array $version latest riot version
     */
    protected array $version;

    /**
     * @var string Riot token
     */
    protected string $authorization;

    /**
     * @var string Riot entitlements
     */
    protected string $entitlements;

    public const ITEM_TYPE_AGENTS        = '01bb38e1-da47-4e6a-9b3d-945fe4655707';
    public const ITEM_TYPE_CONTRACTS     = 'f85cb6f7-33e5-4dc8-b609-ec7212301948';
    public const ITEM_TYPE_SPRAYS        = 'd5f120f8-ff8c-4aac-92ea-f2b5acbe9475';
    public const ITEM_TYPE_GUN_BUDDIES   = 'dd3bf334-87f3-40bd-b043-682a57a8dc3a';
    public const ITEM_TYPE_CARDS         = '3f296c07-64c3-494c-923b-fe692a4fa1bd';
    public const ITEM_TYPE_SKINS         = 'e7c63390-eda7-46e0-bb7a-a6abdacd2433';
    public const ITEM_TYPE_SKIN_VARIANTS = '3ad1b2b2-acdb-4524-852f-954a76ddae0a';
    public const ITEM_TYPE_TITLES        = 'de7caa6b-adf7-4588-bbd1-143831e786c6';

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function __construct(array $config = [])
    {
        $this->authorization = Arr::get($config, 'authorization', '');

        $this->entitlements = Arr::get($config, 'entitlements', '');

        $this->buildClient(
            Arr::get($config, 'cookies', [])
        );

        $this->getLatesVersion();
    }

    /**
     * send request
     *
     * @param $method
     * @param $uri
     * @param  array  $options
     * @param $isArrayResponse
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function request($method, $uri, array $options = [], $isArrayResponse = true)
    {
        $options['headers'] = array_merge(
            Arr::get($options, 'headers', []),
            array_filter([
                'Content-Type'            => 'application/json',
                'User-Agent'              => $this->latestUserAgent(),
                'X-Riot-ClientVersion'    => $this->latestRiotClientVersion(),
                'X-Riot-ClientPlatform'   => $this->latesRiotClientPlatform(),
                'Authorization'           => $this->authorization,
                'X-Riot-Entitlements-JWT' => $this->entitlements,
            ])
        );

        $response = $this->client->request($method, $uri, $options);

        if ($isArrayResponse) {
            return json_decode($response->getBody()->getContents(), true);
        }

        return $response;
    }

    /**
     * Get cookies after the request
     *
     * @return mixed Cookies
     */
    public function cookies()
    {
        return $this->client->getConfig('cookies')->toArray();
    }

    /**
     * set credentials
     *
     * @param  array  $config
     *
     * @return void
     */
    public function setCredentials(array $config = [])
    {
        $this->authorization = Arr::get($config, 'authorization', $this->authorization);

        $this->entitlements = Arr::get($config, 'entitlements', $this->entitlements);
    }

    /**
     * Build a http client
     *
     * @return void
     */
    protected function buildClient(array $cookies = [])
    {
        $this->client = new Client([
            'cookies' => $cookies ? new CookieJar(true, $cookies) : true,
            'curl'    => [
                CURLOPT_SSLVERSION      => config('ssl', CURL_SSLVERSION_TLSv1_3),
                CURLOPT_SSL_CIPHER_LIST => $this->ciphers(),
                CURLOPT_TLS13_CIPHERS   => $this->ciphers13(),
            ],
        ]);
    }

    /**
     * Bypass encryption required by cloudflare
     *
     * @return string
     */
    protected function ciphers()
    {
        $ciphers = config('valorant.ciphers') ?: [
            'ECDHE-ECDSA-CHACHA20-POLY1305',
            'ECDHE-RSA-CHACHA20-POLY1305',
            'ECDHE-ECDSA-AES128-GCM-SHA256',
            'ECDHE-RSA-AES128-GCM-SHA256',
            'ECDHE-ECDSA-AES256-GCM-SHA384',
            'ECDHE-RSA-AES256-GCM-SHA384',
            'ECDHE-ECDSA-AES128-SHA',
            'ECDHE-RSA-AES128-SHA',
            'ECDHE-ECDSA-AES256-SHA',
            'ECDHE-RSA-AES256-SHA',
            'AES128-GCM-SHA256',
            'AES256-GCM-SHA384',
            'AES128-SHA',
            'AES256-SHA',
            'DES-CBC3-SHA',  # most likely not available
        ];

        return implode(':', $ciphers);
    }

    /**
     * Bypass encryption required by cloudflare
     *
     * @return string
     */
    protected function ciphers13()
    {
        $ciphers13 = config('valorant.ciphers13') ?: [
            'TLS_CHACHA20_POLY1305_SHA256',
            'TLS_AES_128_GCM_SHA256',
            'TLS_AES_256_GCM_SHA384',
        ];

        return implode(':', $ciphers13);
    }

    /**
     * Get the latest version of the client
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function getLatesVersion()
    {
        $key = 'VALORANT_VERSION';

        if (!Cache::has($key)) {
            Cache::put($key, ValorantAsset::version(), now()->addMinutes(60));
        }

        $this->version = Cache::get($key);
    }

    /**
     * Generate the latest User-Agent
     *
     * @return string
     */
    protected function latestUserAgent()
    {
        return implode('', [
            'RiotClient/',
            Arr::get($this->version, 'riotClientBuild'),
            ' rso-auth (Windows; 10;;Professional, x64)',
        ]);
    }

    /**
     * Generate platform identifiers
     *
     * @return string
     */
    protected function latesRiotClientPlatform()
    {
        $platform = config('valorant.platform') ?: [
            'platformType'      => 'PC',
            'platformOS'        => 'Windows',
            'platformOSVersion' => '10.0.19042.1.256.64bit',
            'platformChipset'   => 'Unknown',
        ];

        return base64_encode(json_encode($platform));
    }

    /**
     * Get the latest Riot client version
     *
     * @return array|\ArrayAccess|mixed
     */
    protected function latestRiotClientVersion()
    {
        return Arr::get($this->version, 'riotClientVersion');
    }
}