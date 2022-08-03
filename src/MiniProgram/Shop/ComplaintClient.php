<?php

namespace EasyWeChat\MiniProgram\Shop;

use EasyWeChat\Kernel\BaseClient;

/**
 * Class ComplaintClient
 * @author Duan
 * @package EasyWeChat\MiniProgram\Shop
 */
class ComplaintClient extends BaseClient
{
    /**
     * 获取纠纷单列表
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getList($params)
    {
        return $this->httpPostJson('shop/complaint/get_list',$params);
    }

    /**
     * 获取纠纷单详情
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get($params)
    {
        return $this->httpPostJson('shop/complaint/get',$params);
    }

    /**
     * 上传纠纷凭证
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function uploadMaterial($params)
    {
        return $this->httpPostJson('shop/complaint/upload_material',$params);
    }

}
