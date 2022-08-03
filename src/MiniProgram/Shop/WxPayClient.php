<?php

namespace EasyWeChat\MiniProgram\Shop;

use EasyWeChat\Kernel\BaseClient;

/**
 * Class WxPayClient
 * @author Duan
 * @package EasyWeChat\MiniProgram\Shop
 */
class WxPayClient extends BaseClient
{
    /**
     * 提交支付资质
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function apply($params)
    {
        return $this->httpPostJson('shop/wxpay/apply',$params);
    }

    /**
     * 拉取小程序信息接口
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getInfo()
    {
        return $this->httpPostJson('shop/wxpay/get_info');
    }

    /**
     * 查询进件
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get()
    {
        return $this->httpPostJson('shop/wxpay/get');
    }

}
