<?php

namespace EasyWeChat\MiniProgram\Shop;

use EasyWeChat\Kernel\BaseClient;

/**
 * Class CouponClient
 * @author Duan
 * @package EasyWeChat\MiniProgram\Shop
 */
class CouponClient extends BaseClient
{
    /**
     * 商家确认回调领券事件
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function confirm()
    {
        return $this->httpPostJson('shop/coupon/confirm');
    }

    /**
     * 添加优惠券
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function add($params)
    {
        return $this->httpPostJson('shop/coupon/add', $params);
    }

    /**
     * 获取优惠券列表
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getList($params)
    {
        return $this->httpPostJson('shop/coupon/get_list', $params);
    }

    /**
     * 获取优惠券信息
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get($params)
    {
        return $this->httpPostJson('shop/coupon/get', $params);
    }

    /**
     * 更新优惠券信息
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function update($params)
    {
        return $this->httpPostJson('shop/coupon/update', $params);
    }

    /**
     * 更新优惠券状态
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function updateStatus($params)
    {
        return $this->httpPostJson('shop/coupon/update_status', $params);
    }

    /**
     * 更新优惠券库存
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function updateCouponStock($params)
    {
        return $this->httpPostJson('shop/coupon/update_coupon_stock', $params);
    }

    /**
     * 添加用户优惠券
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function addUserCoupon($params)
    {
        return $this->httpPostJson('shop/coupon/add_user_coupon', $params);
    }

    /**
     * 获取用户优惠券列表
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getUserCouponList($params)
    {
        return $this->httpPostJson('shop/coupon/get_usercoupon_list', $params);
    }

    /**
     * 更新用户优惠券
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function updateUserCoupon($params)
    {
        return $this->httpPostJson('shop/coupon/update_user_coupon', $params);
    }

    /**
     * 更新用户优惠券状态
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function updateUserCouponStatus($params)
    {
        return $this->httpPostJson('shop/coupon/update_usercoupon_status', $params);
    }

}
