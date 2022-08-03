<?php

namespace EasyWeChat\MiniProgram\Shop;

use EasyWeChat\Kernel\BaseClient;

/**
 * Class PromoterClient
 * @author Duan
 * @package EasyWeChat\MiniProgram\Shop
 */
class PromoterClient extends BaseClient
{
    /**
     * 获取推广员列表
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function list($params)
    {
        return $this->httpPostJson('shop/promoter/list',$params);
    }

    /**
     * 查看分享员
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function searchSharer($params)
    {
        return $this->httpPostJson('shop/sharer/search_sharer',$params);
    }

    /**
     * 绑定分享员
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function bindSharer($params)
    {
        return $this->httpPostJson('shop/sharer/bind',$params);
    }

    /**
     * 获取分享员的总带货数据
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getSharerDataSummary($params)
    {
        return $this->httpPostJson('shop/sharer/get_sharer_data_summary',$params);
    }

    /**
     * 获取已经绑定的分享员列表
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getSharerList($params)
    {
        return $this->httpPostJson('shop/sharer/get_sharer_list',$params);
    }

    /**
     * 获取分享员的直播间订单汇总
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getSharerLiveOrderList($params)
    {
        return $this->httpPostJson('shop/sharer/get_sharer_live_order_list',$params);
    }

    /**
     * 获取分享员的直播间带货数据汇总
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getSharerLiveSummaryList($params)
    {
        return $this->httpPostJson('shop/sharer/get_sharer_live_summary_list',$params);
    }

    /**
     * 解绑分享员
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function unbindSharer($params)
    {
        return $this->httpPostJson('shop/sharer/unbind',$params);
    }


}
