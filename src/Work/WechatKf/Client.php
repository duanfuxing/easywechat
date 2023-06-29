<?php

namespace EasyWeChat\Work\WechatKf;

use EasyWeChat\Kernel\BaseClient;

/**
 * Class Client.
 *
 * @author arthasking <arthasking@126.com>
 */
class Client extends BaseClient
{

	/**
	 * 添加客服帐号
	 * @param array $params
	 * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
	 * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public function accountAdd(array $params)
	{
		return $this->httpPostJson('cgi-bin/kf/account/add', $params);
	}

	/**
	 * 修改客服帐号
	 * @param array $params
	 * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
	 * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public function accountUpdate(array $params)
	{
		return $this->httpPostJson('cgi-bin/kf/account/update', $params);
	}

	/**
	 * 删除客服帐号
	 * @param string $openKfid
	 * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
	 * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public function accountDel(string $openKfid)
	{
		$params = [
			'open_kfid' => $openKfid
		];
		return $this->httpPostJson('cgi-bin/kf/account/del', $params);
	}

	/**
	 * 获取客服帐号列表
	 * @param int $offset
	 * @param int $limit
	 * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
	 * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public function accountList(int $offset, int $limit)
	{
		$params = [
			'offset' => $offset,
			'limit'  => $limit,
		];
		return $this->httpPostJson('cgi-bin/kf/account/list', $params);
	}

	/**
	 * 获取客服帐号链接
	 * @param string $open_kfid
	 * @param string $scene
	 * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
	 * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public function getKfLink(string $open_kfid, string $scene)
	{
		$params = [
			'open_kfid' => $open_kfid,
			'scene'     => $scene,
		];
		return $this->httpPostJson('cgi-bin/kf/add_contact_way', $params);
	}

	/**
	 * 添加接待人员
	 * @param array $params
	 * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
	 * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public function serviceAdd(array $params)
	{
		return $this->httpPostJson('cgi-bin/kf/servicer/add', $params);
	}

	/**
	 * 删除接待人员
	 * @param array $params
	 * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
	 * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public function serviceDel(array $params)
	{
		return $this->httpPostJson('cgi-bin/kf/servicer/del', $params);
	}

	/**
	 * 获取接待人员列表
	 * @param string $open_kfid
	 * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
	 * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public function serviceList(string $open_kfid)
	{
		$params = [
			'open_kfid' => $open_kfid,
		];
		return $this->httpGet('cgi-bin/kf/servicer/list', $params);
	}

	/**
	 * 获取会话状态
	 * @param string $open_kfid
	 * @param string $userId
	 * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
	 * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public function getServiceState(string $open_kfid, string $userId)
	{
		$params = [
			'open_kfid'       => $open_kfid,
			'external_userid' => $userId,
		];
		return $this->httpPostJson('cgi-bin/kf/service_state/get', $params);
	}

	/**
	 * 变更会话状态
	 * @param array $params
	 * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
	 * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public function transServiceState(array $params)
	{
		return $this->httpPostJson('cgi-bin/kf/service_state/trans', $params);
	}

	/**
	 * 发送消息
	 * @param array $params
	 * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
	 * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public function sendMsg(array $params)
	{
		return $this->httpPostJson('cgi-bin/kf/send_msg', $params);
	}

	/**
	 * 发送欢迎语等事件响应消息
	 * @param array $params
	 * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
	 * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public function sendMsgOnEvent(array $params)
	{
		return $this->httpPostJson('cgi-bin/kf/send_msg_on_event', $params);
	}

	/**
	 * 获取配置的专员与客户群
	 * @param string $open_kfid
	 * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
	 * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public function getUpgradeServiceConfig()
	{
		return $this->httpGet('cgi-bin/kf/customer/get_upgrade_service_config');
	}

	/**
	 * 为客户升级为专员或客户群服务
	 * @param array $params
	 * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
	 * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public function upgradeService(array $params)
	{
		return $this->httpPostJson('cgi-bin/kf/customer/upgrade_service', $params);
	}

	/**
	 * 为客户取消推荐
	 * @param string $open_kfid
	 * @param string $userId
	 * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
	 * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public function cancelUpgradeService(string $open_kfid, string $userId)
	{
		$params = [
			'open_kfid'       => $open_kfid,
			'external_userid' => $userId,
		];
		return $this->httpPostJson('cgi-bin/kf/customer/cancel_upgrade_service', $params);
	}

	/**
	 * 获取客户基础信息
	 * @param array $params
	 * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
	 * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public function batchGet(array $params)
	{
		return $this->httpPostJson('cgi-bin/kf/customer/batchget', $params);
	}

	/**
	 * 获取「客户数据统计」企业汇总数据
	 * @param array $params
	 * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
	 * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public function getCorpStatistic(array $params)
	{
		return $this->httpPostJson('cgi-bin/kf/get_corp_statistic', $params);
	}

	/**
	 * 获取「客户数据统计」接待人员明细数据
	 * @param array $params
	 * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
	 * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public function getServiceStatistic(array $params)
	{
		return $this->httpPostJson('cgi-bin/kf/get_servicer_statistic', $params);
	}

	/**
	 * 读取消息
	 * @param array $params
	 * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
	 * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public function syncMsg(array $params)
	{
		return $this->httpPostJson('cgi-bin/kf/sync_msg', $params);
	}

}
