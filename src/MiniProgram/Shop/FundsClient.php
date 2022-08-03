<?php

namespace EasyWeChat\MiniProgram\Shop;

use EasyWeChat\Kernel\BaseClient;

/**
 * Class FundsClient
 * @author Duan
 * @package EasyWeChat\MiniProgram\Shop
 */
class FundsClient extends BaseClient
{
    /**
     * 获取资金流水列表

     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function scanorderflow()
    {
        return $this->httpPostJson('shop/funds/scanorderflow');
    }

    /**
     * 获取资金流水详情
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getorderflow($params)
    {
        return $this->httpPostJson('shop/funds/getorderflow', $params);
    }

    /**
     * 查询商户余额
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getbalance($params)
    {
        return $this->httpPostJson('shop/funds/getbalance', $params);
    }

    /**
     * 发起提现
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function submitwithdraw($params)
    {
        return $this->httpPostJson('shop/funds/submitwithdraw', $params);
    }

    /**
     * 获取提现记录详情
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getwithdrawdetail($params)
    {
        return $this->httpPostJson('shop/funds/getwithdrawdetail', $params);
    }

    /**
     * 修改结算账户
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function setbankaccount($params)
    {
        return $this->httpPostJson('shop/funds/setbankaccount', $params);
    }

    /**
     * 查询结算账户
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getbankaccount()
    {
        return $this->httpPostJson('shop/funds/getbankaccount');
    }

    /**
     * 获取提现记录列表
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function scanwithdraw($params)
    {
        return $this->httpPostJson('shop/funds/scanwithdraw', $params);
    }

    /**
     * 生成二维码
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function qrcodeGen($params)
    {
        return $this->httpPostJson('shop/funds/qrcode/gen', $params);
    }

    /**
     * 获取二维码
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function qrcodeGet($params)
    {
        return $this->httpPostJson('shop/funds/qrcode/get', $params);
    }

    /**
     * 查询扫码状态
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function qrcodeCheck($params)
    {
        return $this->httpPostJson('shop/funds/qrcode/check', $params);
    }

    /**
     * 搜索银行列表
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getBankList($params)
    {
        return $this->httpPostJson('shop/funds/getbanklist', $params);
    }

    /**
     * 根据卡号获取银行信息
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getBankBynum($params)
    {
        return $this->httpPostJson('shop/funds/getbankbynum', $params);
    }

    /**
     * 查询大陆银行省份列表
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getProvince()
    {
        return $this->httpPostJson('shop/funds/getprovince');
    }

    /**
     * 查询城市列表
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getCity($params)
    {
        return $this->httpPostJson('shop/funds/getcity', $params);
    }

    /**
     * 查询支行列表
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getSubBranch($params)
    {
        return $this->httpPostJson('shop/funds/getsubbranch', $params);
    }

}
