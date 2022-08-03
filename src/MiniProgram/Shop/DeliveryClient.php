<?php

namespace EasyWeChat\MiniProgram\Shop;

use EasyWeChat\Kernel\BaseClient;

/**
 * Class DeliveryClient
 * @author Duan
 * @package EasyWeChat\MiniProgram\Shop
 */
class DeliveryClient extends BaseClient
{
    /**
     * 获取快递公司列表
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getCompanyList($params)
    {
        return $this->httpPostJson('shop/delivery/get_company_list', $params);
    }

    /**
     * 订单发货
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function send($params)
    {
        return $this->httpPostJson('shop/delivery/send', $params);
    }

    /**
     * 订单确认收货
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function recieve($params)
    {
        return $this->httpPostJson('shop/delivery/recieve', $params);
    }

}
