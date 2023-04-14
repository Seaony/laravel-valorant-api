<?php

return [

    'ciphers'   => [
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
    ],

    /*
     * Use uuid as primary key.
     */
    'ciphers13' => [
        'TLS_CHACHA20_POLY1305_SHA256',
        'TLS_AES_128_GCM_SHA256',
        'TLS_AES_256_GCM_SHA384',
    ],

    'ssl' => CURL_SSLVERSION_TLSv1_3,

    'asset_uri' => 'https://valorant-api.com/v1/',
];