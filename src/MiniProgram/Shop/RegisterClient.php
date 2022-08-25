<?php

namespace EasyWeChat\MiniProgram\Shop;

use EasyWeChat\Kernel\BaseClient;

/**
 * Class RegisterClient
 * @author Duan
 * @package EasyWeChat\MiniProgram\Shop
 */
class RegisterClient extends BaseClient
{
    /**
     * 接入申请
     * @see https://developers.weixin.qq.com/miniprogram/dev/platform-capabilities/business-capabilities/ministore/minishopopencomponent2/API/enter/enter_apply.html
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getRegisterApply()
    {
        return $this->httpPostJson('shop/register/apply');
    }

    /**
     * 获取接入状态
     * @see https://developers.weixin.qq.com/miniprogram/dev/platform-capabilities/business-capabilities/ministore/minishopopencomponent2/API/enter/enter_check.html
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getRegisterCheck()
    {
        return $this->httpPostJson('shop/register/check');
    }

    /**
     * 完成接入任务
     * @see https://developers.weixin.qq.com/miniprogram/dev/platform-capabilities/business-capabilities/ministore/minishopopencomponent2/API/enter/finish_access_info.html
     * @param $accessInfoItem
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function finishAccessInfo($accessInfoItem)
    {
        $params = [
            'access_info_item' => $accessInfoItem
        ];
        return $this->httpPostJson('shop/register/finish_access_info', $params);
    }

    /**
     * 场景接入申请
     * @see https://developers.weixin.qq.com/miniprogram/dev/platform-capabilities/business-capabilities/ministore/minishopopencomponent2/API/enter/scene_apply.html
     * @param $sceneGroupId
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function applyScene($sceneGroupId)
    {
        $params = [
            'scene_group_id' => $sceneGroupId
        ];
        return $this->httpPostJson('shop/register/apply_scene', $params);
    }

    /**
     * 获取商品类目
     * @see https://developers.weixin.qq.com/miniprogram/dev/platform-capabilities/business-capabilities/ministore/minishopopencomponent2/API/cat/get_children_cateogry.html
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getCat()
    {
        return $this->httpPostJson('shop/cat/get');
    }

    /**
     * 上传图片
     * @see https://developers.weixin.qq.com/miniprogram/dev/platform-capabilities/business-capabilities/ministore/minishopopencomponent2/API/public/upload_img.html
     * @param $respType
     * @param $uploadType
     * @param null $imgUrl
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function uploadImg($respType, $uploadType,$imgUrl = null)
    {
        $params = [
            'resp_type'   => $respType,
            'upload_type' => $uploadType,
            'img_url'     => $imgUrl,
        ];
        return $this->httpUpload('shop/img/upload',[], $params);
    }

    /**
     * 上传品牌信息
     * @see https://developers.weixin.qq.com/miniprogram/dev/platform-capabilities/business-capabilities/ministore/minishopopencomponent2/API/audit/audit_brand.html
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function auditBrand($params)
    {
        return $this->httpPostJson('shop/audit/audit_brand', $params);
    }

    /**
     * 上传类目资质
     * @see https://developers.weixin.qq.com/miniprogram/dev/platform-capabilities/business-capabilities/ministore/minishopopencomponent2/API/audit/audit_category.html
     * @param $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function auditCategory($params)
    {
        return $this->httpPostJson('shop/audit/audit_category', $params);
    }

    /**
     * 获取审核结果
     * @see https://developers.weixin.qq.com/miniprogram/dev/platform-capabilities/business-capabilities/ministore/minishopopencomponent2/API/audit/audit_result.html
     * @param $auditId
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function auditResult($auditId)
    {
        $params = [
            'audit_id' => $auditId
        ];
        return $this->httpPostJson('shop/audit/result', $params);
    }

    /**
     * 获取小程序资质
     * @see https://developers.weixin.qq.com/miniprogram/dev/platform-capabilities/business-capabilities/ministore/minishopopencomponent2/API/audit/get_miniapp_certificate.html
     * @param $reqType
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getMiniappCertificate($reqType){
        $params = [
            'req_type' => $reqType
        ];
        return $this->httpPostJson('shop/audit/get_miniapp_certificate', $params);
    }

}
