<?php

namespace EasyWeChat\MiniProgram\Shop;

use EasyWeChat\Kernel\BaseClient;

/**
 * Class CommissionClient
 * @author Duan
 * @package EasyWeChat\MiniProgram\Shop
 */
class CommissionClient extends BaseClient
{
    /**
     * 设置订单分账信息
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function setordercommission($params)
    {
        return $this->httpPostJson('shop/commission/setordercommission',$params);
    }

    /**
     * 增加分账方
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function addreceiver($params)
    {
        return $this->httpPostJson('shop/commission/addreceiver',$params);
    }

    /**
     * 删除分账方
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function removereceiver($params)
    {
        return $this->httpPostJson('shop/commission/removereceiver',$params);
    }

    /**
     * 获取分账方列表
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getordercommission()
    {
        return $this->httpPostJson('shop/commission/getordercommission');
    }

}
