<?php

namespace EasyWeChat\MiniProgram\Shop;

use EasyWeChat\Kernel\BaseClient;

/**
 * Class EcaftersaleClient
 * @author Duan
 * @package EasyWeChat\MiniProgram\Shop
 */
class EcaftersaleClient extends BaseClient
{
    /**
     * 用户提交售后申请
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function add($params)
    {
        return $this->httpPostJson('shop/ecaftersale/add', $params);
    }

    /**
     * 用户更新售后申请
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function update($params)
    {
        return $this->httpPostJson('shop/ecaftersale/update', $params);
    }

    /**
     * 商家更新售后单(仅退货地址)
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function merchantUpdate($params)
    {
        return $this->httpPostJson('shop/ecaftersale/merchantupdate', $params);
    }

    /**
     * 用户取消售后申请
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function cancel($params)
    {
        return $this->httpPostJson('shop/ecaftersale/cancel', $params);
    }


    /**
     * 用户上传退货物流
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function uploadReturnInfo($params)
    {
        return $this->httpPostJson('shop/ecaftersale/uploadreturninfo', $params);
    }


    /**
     * 商家同意退款
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function acceptrefund($params)
    {
        return $this->httpPostJson('shop/ecaftersale/acceptrefund', $params);
    }


    /**
     * 商家同意退货
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function acceptreturn($params)
    {
        return $this->httpPostJson('shop/ecaftersale/acceptreturn', $params);
    }

    /**
     * 商家拒绝售后
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function reject($params)
    {
        return $this->httpPostJson('shop/ecaftersale/reject', $params);
    }

    /**
     * 商家上传退款凭证
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function uploadCertificates($params)
    {
        return $this->httpPostJson('shop/ecaftersale/upload_certificates', $params);
    }

    /**
     * 商家更新订单售后期
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function updateDeadline($params)
    {
        return $this->httpPostJson('shop/ecaftersale/update_deadline', $params);
    }

    /**
     * 获取售后单列表
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getList($params)
    {
        return $this->httpPostJson('shop/ecaftersale/get_list', $params);
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
        return $this->httpPostJson('shop/ecaftersale/get', $params);
    }
}
