<?php

/*
 * This file is part of the overtrue/wechat.
 *
 * (c) overtrue <i@overtrue.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyWeChat\Work\Live;

use EasyWeChat\Kernel\BaseClient;

/**
 * Class Client.
 *
 * @author arthasking <arthasking@126.com>
 */
class Client extends BaseClient
{

    /**
     * 创建预约直播
     *
     * @see https://work.weixin.qq.com/api/doc/90000/90135/93637
     *
     * @param array $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function create(array $params)
    {
        return $this->httpPostJson('cgi-bin/living/create', $params);
    }

    /**
     * 修改预约直播
     *
     * @see https://work.weixin.qq.com/api/doc/90000/90135/93640
     * @param array $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function modify(array $params)
    {
        return $this->httpPostJson('cgi-bin/living/modify', $params);
    }

    /**
     * 取消预约直播
     *
     * @see https://work.weixin.qq.com/api/doc/90000/90135/93638
     *
     * @param string $livingId
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function cancel(string $livingId)
    {
        $params = [
            'livingid' => $livingId
        ];
        return $this->httpPostJson('cgi-bin/living/cancel', $params);
    }

    /**
     * 删除直播回放
     *
     * @see https://work.weixin.qq.com/api/doc/90000/90135/93874
     *
     * @param string $livingId
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function deleteReplayData(string $livingId)
    {
        $params = [
            'livingid' => $livingId
        ];
        return $this->httpPostJson('cgi-bin/living/delete_replay_data', $params);
    }

    /**
     * 获取直播详情
     *
     * @see https://work.weixin.qq.com/api/doc/90000/90135/93635
     *
     * @param string $livingId
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getLivingInfo(string $livingId)
    {
        $params = [
            'livingid' => $livingId
        ];
        return $this->httpGet('cgi-bin/living/get_living_info', $params);
    }

    /**
     * 获取成员直播ID列表
     *
     * @see https://work.weixin.qq.com/api/doc/90000/90135/93634
     *
     * @param string $userId
     * @param string|null $cursor
     * @param int $limit
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getUserAllLivingId(string $userId, string $cursor = null, int $limit = 100)
    {
        $params = [
            'userid' => $userId,
            'cursor' => $cursor,
            'limit'  => $limit
        ];

        return $this->httpPostJson('cgi-bin/living/get_user_all_livingid', $params);
    }

    /**
     * 获取直播观看明细
     *
     * @see https://work.weixin.qq.com/api/doc/90000/90135/93636
     *
     * @param string $livingId
     * @param int $nextKey
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getWatchStat(string $livingId, int $nextKey = 0)
    {
        $params = [
            'livingid' => $livingId,
            'next_key' => $nextKey,
        ];

        return $this->httpPostJson('cgi-bin/living/get_watch_stat', $params);
    }

    /**
     * 获取微信观看直播凭证
     *
     * @see https://work.weixin.qq.com/api/doc/90000/90135/93641
     *
     * @param string $livingId
     * @param string $openid
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getLivingCode(string $livingId, string $openid)
    {
        $params = [
            'livingid' => $livingId,
            'openid'   => $openid,
        ];
        return $this->httpGet('cgi-bin/living/get_living_code', $params);
    }

}
