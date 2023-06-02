<?php

/*
 * This file is part of the overtrue/wechat.
 *
 * (c) overtrue <i@overtrue.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyWeChat\Work\CorpGroup;

use EasyWeChat\Kernel\BaseClient;

/**
 * Class Client
 * @author Duan
 * @package EasyWeChat\Work\CorpGroup
 */
class Client extends BaseClient
{
	/**
	 * 获取应用共享信息
	 * @param array $data
	 * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
	 * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public function listAppShareInfo(array $data)
	{
		return $this->httpPostJson('cgi-bin/corpgroup/corp/list_app_share_info', $data);
	}

	/**
	 * unionid 查询 ExternalUserid
	 * 上下游关联客户信息-已添加客户
	 * @param int $id
	 * @param array $data
	 * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
	 * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public function unionidToExternalUserid(array $data)
	{
		return $this->httpPostJson('cgi-bin/corpgroup/unionid_to_external_userid', $data);
	}

	/**
	 * unionid查询pending_id
	 * @param array $data
	 * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
	 * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public function unionidToPendingId(array $data)
	{
		return $this->httpPostJson('cgi-bin/corpgroup/unionid_to_pending_id', $data);
	}

	/**
	 * external_userid查询pending_id
	 * @param array $data
	 * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
	 * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public function externalUseridToPendingId(array $data)
	{
		return $this->httpPostJson('cgi-bin/corpgroup/batch/external_userid_to_pending_id', $data);
	}
}
