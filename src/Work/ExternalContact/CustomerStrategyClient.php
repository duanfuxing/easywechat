<?php

/*
 * This file is part of the overtrue/wechat.
 *
 * (c) overtrue <i@overtrue.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyWeChat\Work\ExternalContact;

use EasyWeChat\Kernel\BaseClient;

/**
 * 客户联系规则组管理
 * Class CustomerStrategyClient
 * @package EasyWeChat\Work\ExternalContact
 */
class CustomerStrategyClient extends BaseClient
{
    /**
     * 客户规则组ID列表
     * @param string $cursor
     * @param int $limit
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function list(string $cursor = null, int $limit = 1000)
    {
        return $this->httpPostJson('cgi-bin/externalcontact/customer_strategy/list', [
            'cursor' => $cursor,
            'limit'  => $limit,
        ]);
    }

    /**
     * 获取规则组详情
     * @param int $strategy_id
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get(int $strategy_id)
    {
        return $this->httpPostJson('cgi-bin/externalcontact/customer_strategy/get', [
            'strategy_id' => $strategy_id,
        ]);
    }

    /**
     * 删除规则组
     * @param int $strategy_id
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete(int $strategy_id)
    {
        return $this->httpPostJson('cgi-bin/externalcontact/customer_strategy/del', [
            'strategy_id' => $strategy_id,
        ]);
    }

    /**
     * 创建规则组
     * @param array $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function create(array $params)
    {
        return $this->httpPostJson('cgi-bin/externalcontact/customer_strategy/create', $params);
    }

    /**
     * 更新规则组
     * @param array $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function update(array $params)
    {
        return $this->httpPostJson('cgi-bin/externalcontact/customer_strategy/edit', $params);
    }

    /**
     * 获取指定规则组下的企业客户标签
     * @param int $strategy_id
     * @param array $tag_id
     * @param array $group_id
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getStrategyTagList(int $strategy_id = 0, array $tag_id = [], array $group_id = [])
    {
        return $this->httpPostJson('cgi-bin/externalcontact/get_strategy_tag_list', [
            'strategy_id' => $strategy_id,
            'tag_id'      => $tag_id,
            'group_id'    => $group_id,
        ]);
    }

    /**
     * 为指定规则组创建企业客户标签
     * @param array $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function addStrategyTag(array $params)
    {
        return $this->httpPostJson('cgi-bin/externalcontact/add_strategy_tag', $params);
    }

    /**
     * 编辑指定规则组下的企业客户标签
     * @param array $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function updateStrategyTag(array $params)
    {
        return $this->httpPostJson('cgi-bin/externalcontact/edit_strategy_tag', $params);
    }

    /**
     * 删除指定规则组下的企业客户标签
     * @param array $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function deleteStrategyTag(array $params)
    {
        return $this->httpPostJson('cgi-bin/externalcontact/del_strategy_tag', $params);
    }

}
