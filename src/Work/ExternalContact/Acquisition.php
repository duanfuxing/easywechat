<?php

namespace EasyWeChat\Work\ExternalContact;

use EasyWeChat\Kernel\BaseClient;

/**
 * 获客链接管理
 * Class Acquisition
 * @author Duan
 * @package EasyWeChat\Work\ExternalContact
 */
class Acquisition extends BaseClient
{

    /**
     * 获取获客链接列表
     * @param int $limit
     * @param string $cursor
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function listLink(int $limit = 100, string $cursor = '')
    {
        $params = [
            'limit'  => $limit,
            'cursor' => $cursor,
        ];
        return $this->httpPostJson('cgi-bin/externalcontact/customer_acquisition/list_link', $params);
    }

    /**
     * 获取获客链接详情
     * @param string $linkId
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get(string $linkId)
    {
        return $this->httpPostJson('cgi-bin/externalcontact/customer_acquisition/get', [
            'link_id' => $linkId,
        ]);
    }

    /**
     * 创建获客链接
     * @param array $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createLink(array $params)
    {
        return $this->httpPostJson('cgi-bin/externalcontact/customer_acquisition/create_link', $params);
    }

    /**
     * 编辑获客链接
     * @param array $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function updateLink(array $params)
    {
        return $this->httpPostJson('cgi-bin/externalcontact/customer_acquisition/update_link', $params);
    }

    /**
     * 删除获客链接
     * @param string $linkId
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function deleteLink(string $linkId)
    {
        return $this->httpPostJson('cgi-bin/externalcontact/customer_acquisition/delete_link', ['link_id' => $linkId]);
    }

    /**
     * 获取获客客户列表
     * @param string $linkId
     * @param int $limit
     * @param string $cursor
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function customers(string $linkId, int $limit = 100, string $cursor = '')
    {
        $params = [
            'link_id' => $linkId,
            'limit'   => $limit,
            'cursor'  => $cursor,
        ];
        return $this->httpPostJson('cgi-bin/externalcontact/customer_acquisition/customer', $params);
    }

    /**
     * 查询剩余使用量
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function acquisitionQuota()
    {
        return $this->httpGet('cgi-bin/externalcontact/customer_acquisition_quota');
    }

    /**
     * 获取组件授权信息
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get_comp_auth_info()
    {
        return $this->httpPostJson('cgi-bin/externalcontact/customer_acquisition/get_comp_auth_info');
    }

    /**
     * 查询链接使用详情
     * @param array $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function statistic(array $params)
    {
        return $this->httpPostJson('cgi-bin/externalcontact/customer_acquisition/statistic', $params);

    }

    /**
     * 生成代支付key
     * @param array $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function create_once_key(array $params)
    {
        return $this->httpPostJson('cgi-bin/externalcontact/customer_acquisition/create_once_key', $params);

    }

    /**
     * 获取代支付流水
     * @param array $params
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get_bill_list(array $params)
    {
        return $this->httpPostJson('cgi-bin/externalcontact/customer_acquisition/get_bill_list', $params);

    }

    /**
     * 获取获客链接使用成员接受消息数据
     * @param string $chatKey
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     */
    public function get_chat_info(string $chatKey)
    {
        $params = [
            'chat_key' => $chatKey
        ];
        return $this->httpPostJson('cgi-bin/externalcontact/customer_acquisition/get_chat_info', $params);

    }

}
