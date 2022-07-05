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
 * Class ContactWayClient.
 *
 * @author milkmeowo <milkmeowo@gmail.com>
 */
class ContactWayClient extends BaseClient
{
    /**
     * 配置客户联系「联系我」方式.
     *
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function create(int $type, int $scene, array $config = [])
    {
        $params = array_merge([
            'type'  => $type,
            'scene' => $scene,
        ], $config);

        return $this->httpPostJson('cgi-bin/externalcontact/add_contact_way', $params);
    }

    /**
     * 获取企业已配置的「联系我」方式.列表
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function list()
    {
        return $this->httpPostJson('cgi-bin/externalcontact/list_contact_way');
    }

    /**
     * 获取企业已配置的「联系我」方式.
     *
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get(string $configId)
    {
        return $this->httpPostJson('cgi-bin/externalcontact/get_contact_way', [
            'config_id' => $configId,
        ]);
    }

    /**
     * 更新企业已配置的「联系我」方式.
     *
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function update(string $configId, array $config = [])
    {
        $params = array_merge([
            'config_id' => $configId,
        ], $config);

        return $this->httpPostJson('cgi-bin/externalcontact/update_contact_way', $params);
    }

    /**
     * 删除企业已配置的「联系我」方式.
     *
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete(string $configId)
    {
        return $this->httpPostJson('cgi-bin/externalcontact/del_contact_way', [
            'config_id' => $configId,
        ]);
    }

    /**
     * 配置客户群进群方式 [加入群聊]
     * @param int $scene
     * @param array $chatIdList
     * @param array $config
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createChat(int $scene, array $chatIdList, array $config = [])
    {
        $params = array_merge([
            'chat_id_list' => $chatIdList,
            'scene'        => $scene,
        ], $config);

        return $this->httpPostJson('cgi-bin/externalcontact/groupchat/add_join_way', $params);
    }

    /**
     * 更新客户群进群方式 [加入群聊]
     * @param string $configId
     * @param array $config
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function updateChat(string $configId, array $config = [])
    {
        $params = array_merge([
            'config_id' => $configId,
        ], $config);

        return $this->httpPostJson('cgi-bin/externalcontact/groupchat/update_join_way', $params);
    }

    /**
     * 获取客户群进群方式 [加入群聊]
     * @param string $configId
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getChat(string $configId)
    {
        $params = ['config_id' => $configId];
        return $this->httpPostJson('cgi-bin/externalcontact/groupchat/get_join_way', $params);
    }

    /**
     * 删除客户群进群方式 [加入群聊]
     * @param string $configId
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function deleteChat(string $configId)
    {
        $params = ['config_id' => $configId];
        return $this->httpPostJson('cgi-bin/externalcontact/groupchat/del_join_way', $params);
    }
}
