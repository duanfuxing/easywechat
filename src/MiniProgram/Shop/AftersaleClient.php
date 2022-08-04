<?php

namespace EasyWeChat\MiniProgram\Shop;

use EasyWeChat\Kernel\BaseClient;

/**
 * Class AftersaleClient
 * @author Duan
 * @package EasyWeChat\MiniProgram\Shop
 */
class AftersaleClient extends BaseClient
{
    /**
     * 提交售后申请
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function add($params)
    {
        return $this->httpPostJson('shop/aftersale/add', $params);
    }

    /**
     * 更新售后申请
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function update($params)
    {
        return $this->httpPostJson('shop/aftersale/update', $params);
    }

    /**
     * 获取售后单详情
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get($params)
    {
        return $this->httpPostJson('shop/aftersale/get', $params);
    }
}
