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
	public function getMomentSendResult()
	{
		return $this->httpGet('cgi-bin/externalcontact/customer_acquisition_quota');
	}

}
