<?php

namespace Seaony\PhpValorantAPI;

use GuzzleHttp\Client;
use Seaony\PhpValorantAPI\Endpoints\AssetEndpoint;

class Valorant
{
    /**
     * Guzzle 实例中发送请求会使用到的 Headers 头。
     *
     * @var string[] 请求头
     */
    protected array $headers = [
        'Content-Type'          => 'application/json',
        'User-Agent'            => 'RiotClient/63.0.5.4887690.4789131 rso-auth (Windows; 10;;Professional, x64)',
        'X-Riot-ClientPlatform' => 'ew0KCSJwbGF0Zm9ybVR5cGUiOiAiUEMiLA0KCSJwbGF0Zm9ybU9TIjogIldpbmRvd3MiLA0KCSJwbGF0Zm9ybU9TVmVyc2lvbiI6ICIxMC4wLjE5MDQyLjEuMjU2LjY0Yml0IiwNCgkicGxhdGZvcm1DaGlwc2V0IjogIlVua25vd24iDQp9',
    ];

    /**
     * 貌似是请求中绕过 Cloudflare 所需要的 SSL 证书加密方式
     *
     * @var string[] 用于请求的参数
     */

    /**
     * @var \GuzzleHttp\Client Guzzle 实例
     */
    protected Client $client;

    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client([
            'cookies' => true,
            'curl'    => [
                CURLOPT_SSLVERSION      => CURL_SSLVERSION_TLSv1_3,
                CURLOPT_SSL_CIPHER_LIST => implode(':', $this->ciphers),
                CURLOPT_TLS13_CIPHERS   => implode(':', $this->ciphers13),
            ],
        ]);

    }
}