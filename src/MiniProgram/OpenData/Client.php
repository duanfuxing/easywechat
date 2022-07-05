<?php

/*
 * This file is part of the overtrue/wechat.
 *
 * (c) overtrue <i@overtrue.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyWeChat\MiniProgram\OpenData;

use EasyWeChat\Kernel\BaseClient;

/**
 * Class Client.
 *
 * @author tianyong90 <412039588@qq.com>
 */
class Client extends BaseClient
{
    /**
     * @var string
     */
    protected $baseUri = 'https://api.weixin.qq.com/wxa/';

    /**
     * removeUserStorage.
     *
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function removeUserStorage(string $openid, string $sessionKey, array $key)
    {
        $data = ['key' => $key];
        $query = [
            'openid'     => $openid,
            'sig_method' => 'hmac_sha256',
            'signature'  => hash_hmac('sha256', json_encode($data), $sessionKey),
        ];

        return $this->httpPostJson('remove_user_storage', $data, $query);
    }

    /**
     * setUserStorage.
     *
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function setUserStorage(string $openid, string $sessionKey, array $kvList)
    {
        $kvList = $this->formatKVLists($kvList);

        $data = ['kv_list' => $kvList];
        $query = [
            'openid'     => $openid,
            'sig_method' => 'hmac_sha256',
            'signature'  => hash_hmac('sha256', json_encode($data), $sessionKey),
        ];

        return $this->httpPostJson('set_user_storage', $data, $query);
    }

    /**
     * @return array
     */
    protected function formatKVLists(array $params)
    {
        $formatted = [];

        foreach ($params as $name => $value) {
            $formatted[] = [
                'key'   => $name,
                'value' => strval($value),
            ];
        }

        return $formatted;
    }

    /**
     * 小程序 URL Link
     * @param array $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function generateUrlLink(array $params)
    {
        $data = [
            'path'            => $params['path'] ?? '',
            'query'           => $params['query'] ?? '',
            'is_expire'       => $params['is_expire'] ?? true,
            'expire_type'     => $params['expire_type'] ?? 0,
            'expire_time'     => $params['expire_time'] ?? 0,
            'expire_interval' => $params['expire_interval'] ?? 30,
        ];

        return $this->httpPostJson('generate_urllink', $data);
    }
}
