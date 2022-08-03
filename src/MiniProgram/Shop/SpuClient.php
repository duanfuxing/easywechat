<?php

namespace EasyWeChat\MiniProgram\Shop;

use EasyWeChat\Kernel\BaseClient;

/**
 * Class SpuClient
 * @author Duan
 * @package EasyWeChat\MiniProgram\Shop
 */
class SpuClient extends BaseClient
{
    /**
     * 添加商品
     * @see https://developers.weixin.qq.com/miniprogram/dev/platform-capabilities/business-capabilities/ministore/minishopopencomponent2/API/SPU/add_spu.html
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function addSpu($params)
    {
        return $this->httpPostJson('shop/spu/add', $params);
    }

    /**
     * 获取商品详情
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getSpu($params)
    {
        return $this->httpPostJson('shop/spu/get', $params);
    }

    /**
     * 获取商品列表
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getSpuList($params)
    {
        return $this->httpPostJson('shop/spu/get_list', $params);
    }

    /**
     * 更新商品
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function updateSpu($params)
    {
        return $this->httpPostJson('shop/spu/update', $params);
    }

    /**
     * 删除商品
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function deleteSpu($params)
    {
        return $this->httpPostJson('shop/spu/del', $params);
    }

    /**
     * 上架商品
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function listingSpu($params)
    {
        return $this->httpPostJson('shop/spu/listing', $params);
    }

    /**
     * 下架商品
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delistingSpu($params)
    {
        return $this->httpPostJson('shop/spu/delisting', $params);
    }

    /**
     * 撤回商品审核
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delAuditSpu($params)
    {
        return $this->httpPostJson('shop/spu/del_audit', $params);
    }

    /**
     * 免审核更新部分字段
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function updateWithoutAuditSpu($params)
    {
        return $this->httpPostJson('shop/spu/update_without_audit', $params);
    }
}
