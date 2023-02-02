<?php

namespace tinymeng\chatGpt;

use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;

class Http
{
    public function request($method, $url, $data = null, $options = [])
    {
        /**
         * @var Client $client
         */
        $client = Client::get(Client::class, [
            [
                'cookies' => Client::get(CookieJar::class),
            ],
        ]);

        $data && $options['json'] = $data;

        // 设置代理
        if (Client::has('proxy')) {
            $options['proxy'] = Client::get('proxy');
            $options['verify'] = false;
        }

        return $client->request($method, $url, $options);
    }

}