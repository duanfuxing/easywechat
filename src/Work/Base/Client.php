<?php

/*
 * This file is part of the overtrue/wechat.
 *
 * (c) overtrue <i@overtrue.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyWeChat\Work\Base;

use EasyWeChat\Kernel\BaseClient;

/**
 * Class Client.
 *
 * @author mingyoung <mingyoungcheung@gmail.com>
 */
class Client extends BaseClient
{
    /**
     * Get callback ip.
     *
     * @return \Psr\Http\Message\ResponseInterface|\EasyWeChat\Kernel\Support\Collection|array|object|string
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     */
    public function getCallbackIp()
    {
        return $this->httpGet('cgi-bin/getcallbackip');
    }

    /**
     * 将自建应用获取的userid转换为第三方应用获取的userid
     * 仅代开发自建应用或第三方应用可调用
     * @param array $userId
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function userIdToOpenUserId(array $userId)
    {
        return $this->httpPostJson('cgi-bin/batch/userid_to_openuserid', ['userid_list' => $userId]);
    }

    /**
     * 第三方根据code获取企业成员信息.
     * @param string $code
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getUserByCode(string $code)
    {
        $params = [
            'code' => $code,
        ];

        return $this->httpGet('cgi-bin/user/getuserinfo', $params);
    }

    /**
     * 获取成员敏感信息
     * @param string $userTicket
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getUserDetail(string $userTicket)
    {
        $params = [
            'user_ticket' => $userTicket,
        ];

        return $this->httpPostJson('cgi-bin/user/getuserdetail', $params);
    }

}
