<?php

/*
 * This file is part of the overtrue/wechat.
 *
 * (c) overtrue <i@overtrue.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyWeChat\OpenWork\Provider;

use EasyWeChat\Kernel\BaseClient;
use EasyWeChat\Kernel\ServiceContainer;

/**
 * Client.
 *
 * @author xiaomin <keacefull@gmail.com>
 */
class Client extends BaseClient
{
    /**
     * Client constructor.
     */
    public function __construct(ServiceContainer $app)
    {
        parent::__construct($app, $app['provider_access_token']);
    }

    /**
     * 单点登录 - 获取登录的地址.
     *
     * @return string
     */
    public function getLoginUrl(string $redirectUri = '', string $userType = 'admin', string $state = '')
    {
        $redirectUri || $redirectUri = $this->app->config['redirect_uri_single'];
        $state || $state = rand();
        $params = [
            'appid' => $this->app['config']['corp_id'],
            'redirect_uri' => $redirectUri,
            'usertype' => $userType,
            'state' => $state,
        ];

        return 'https://open.work.weixin.qq.com/wwopen/sso/3rd_qrConnect?'.http_build_query($params);
    }

    /**
     * 单点登录 - 获取登录用户信息.
     *
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getLoginInfo(string $authCode)
    {
        $params = [
            'auth_code' => $authCode,
        ];

        return $this->httpPostJson('cgi-bin/service/get_login_info', $params);
    }

    /**
     * 获取注册定制化URL.
     *
     * @return string
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidArgumentException
     */
    public function getRegisterUri(string $registerCode = '')
    {
        if (!$registerCode) {
            /** @var array $response */
            $response = $this->detectAndCastResponseToType($this->getRegisterCode(), 'array');

            $registerCode = $response['register_code'];
        }

        $params = ['register_code' => $registerCode];

        return 'https://open.work.weixin.qq.com/3rdservice/wework/register?'.http_build_query($params);
    }

    /**
     * 获取注册码.
     *
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getRegisterCode(
        string $corpName = '',
        string $adminName = '',
        string $adminMobile = '',
        string $state = ''
    ) {
        $params = [];
        $params['template_id'] = $this->app['config']['reg_template_id'];
        !empty($corpName) && $params['corp_name'] = $corpName;
        !empty($adminName) && $params['admin_name'] = $adminName;
        !empty($adminMobile) && $params['admin_mobile'] = $adminMobile;
        !empty($state) && $params['state'] = $state;

        return $this->httpPostJson('cgi-bin/service/get_register_code', $params);
    }

    /**
     * 查询注册状态.
     *
     * Desc:该API用于查询企业注册状态，企业注册成功返回注册信息.
     *
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getRegisterInfo(string $registerCode)
    {
        $params = [
            'register_code' => $registerCode,
        ];

        return $this->httpPostJson('cgi-bin/service/get_register_info', $params);
    }

    /**
     * 设置授权应用可见范围.
     *
     * Desc:调用该接口前提是开启通讯录迁移，收到授权成功通知后可调用。
     *      企业注册初始化安装应用后，应用默认可见范围为根部门。
     *      如需修改应用可见范围，服务商可以调用该接口设置授权应用的可见范围。
     *      该接口只能使用注册完成回调事件或者查询注册状态返回的access_token。
     *      调用设置通讯录同步完成后或者access_token超过30分钟失效（即解除通讯录锁定状态）则不能继续调用该接口。
     *
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     */
    public function setAgentScope(
        string $accessToken,
        string $agentId,
        array $allowUser = [],
        array $allowParty = [],
        array $allowTag = []
    ) {
        $params = [
            'agentid' => $agentId,
            'allow_user' => $allowUser,
            'allow_party' => $allowParty,
            'allow_tag' => $allowTag,
            'access_token' => $accessToken,
        ];

        return $this->httpGet('cgi-bin/agent/set_scope', $params);
    }

    /**
     * 设置通讯录同步完成.
     *
     * Desc:该API用于设置通讯录同步完成，解除通讯录锁定状态，同时使通讯录迁移access_token失效。
     *
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     */
    public function contactSyncSuccess(string $accessToken)
    {
        $params = ['access_token' => $accessToken];

        return $this->httpGet('cgi-bin/sync/contact_sync_success', $params);
    }

    /**
     * 通讯录单个搜索
     *
     * @param string $queryWord
     * @param        $agentId
     * @param int    $offset
     * @param int    $limit
     * @param int    $queryType
     * @param null   $fullMatchField
     *
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function searchContact(
        string $authCorpId,
        string $queryWord,
        int $agentId = 0,
        int $offset = 0,
        int $limit = 50,
        int $queryType = 0,
        $fullMatchField = null
    ) {
        $params = [];
        $params['auth_corpid'] = $authCorpId;
        $params['query_word'] = $queryWord;
        $params['query_type'] = $queryType;
        $params['agentid'] = $agentId;
        $params['offset'] = $offset;
        $params['limit'] = $limit;
        !empty($fullMatchField) && $params['full_match_field'] = $fullMatchField;

        return $this->httpPostJson('cgi-bin/service/contact/search', $params);
    }

    /**
     * 通讯录批量搜索
     *
     * @param string $authCorpId
     * @param array $queryRequestList
     * @param int $agentId
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     */
    public function batchSearchContact(
        string $authCorpId,
        array $queryRequestList,
        int $agentId = 0
    ) {
        $params = [];
        $params['auth_corpid'] = $authCorpId;
        $prams['agentid'] = $agentId;
        $params['query_request_list'] = $queryRequestList;
        return $this->httpPostJson('cgi-bin/service/contact/batchsearch', $params);
    }

    /**
     * 获取成员敏感信息
     * @param string $userTicket
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getUserDetail(string $userTicket)
    {
        $params = [
            'user_ticket' => $userTicket,
        ];

        return $this->httpPostJson('cgi-bin/user/getuserdetail3rd', $params);
    }


    /**
     * 将明文corpId转换为第三方应用获取的corpId
     * 仅限第三方服务商，转换已获授权企业的corpid
     * @param string $corpId
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function corpIdToOpenCorpId(string $corpId)
    {
        $params = [
            'corpid' => $corpId,
        ];
        return $this->httpPostJson('cgi-bin/service/corpid_to_opencorpid', $params);
    }

    /**
     * 获取代开发自建应用授权链接，用于生成带参临时二维码
     * @param string $state
     * @param array $list
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getCustomizedAuthUrl(string $state, array $list)
    {
        $params = [
            'state'           => $state ?? time(),
            'templateid_list' => $list
        ];
        return $this->httpPostJson('cgi-bin/service/get_customized_auth_url', $params);
    }

    /**
     * 获取订单列表 [接口调用许可]
     * @param string $corpId
     * @param int $startTime
     * @param int $endTime
     * @param string $cursor
     * @param int $limit
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getLicenseOrderList(string $corpId, int $startTime = 0, int $endTime = 0, string $cursor = '', int $limit = 10)
    {
        $params = [
            'corpid'     => $corpId,
            'start_time' => $startTime,
            'end_time'   => $endTime,
            'cursor'     => $cursor,
            'limit'      => $limit,
        ];
        return $this->httpPostJson('cgi-bin/license/list_order', $params);
    }

    /**
     * 获取订单详情 [接口调用许可]
     * @param string $orderId
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getLicenseOrderInfo(string $orderId)
    {
        $params = [
            'order_id' => $orderId
        ];
        return $this->httpPostJson('cgi-bin/license/get_order', $params);
    }

    /**
     * 获取订单中的帐号列表 [接口调用许可]
     * @param string $orderId
     * @param string $cursor
     * @param int $limit
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getLicenseOrderAccount(string $orderId, string $cursor = '', int $limit = 1000)
    {
        $params = [
            'order_id' => $orderId,
            'cursor'   => $cursor,
            'limit'    => $limit,
        ];
        return $this->httpPostJson('cgi-bin/license/list_order_account', $params);
    }

    /**
     * 激活帐号 [接口调用许可]
     * @param string $activeCode
     * @param string $corpId
     * @param string $userId
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function activeAccount(string $activeCode, string $corpId, string $userId)
    {
        $params = [
            'active_code' => $activeCode,
            'corpid'      => $corpId,
            'userid'      => $userId,
        ];
        return $this->httpPostJson('cgi-bin/license/active_account', $params);
    }

    /**
     * 批量激活帐号 [接口调用许可]
     * @param array $activeList
     * @param string $corpId
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function batchActiveAccount(array $activeList, string $corpId)
    {
        $params = [
            'corpid'      => $corpId,
            'active_list' => $activeList,
        ];
        return $this->httpPostJson('cgi-bin/license/batch_active_account', $params);
    }

    /**
     * 获取激活码详情 [接口调用许可]
     * @param string $activeCode
     * @param string $corpId
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getActiveInfoByCode(string $activeCode, string $corpId)
    {
        $params = [
            'active_code' => $activeCode,
            'corpid'      => $corpId,
        ];
        return $this->httpPostJson('cgi-bin/license/get_active_info_by_code', $params);
    }

    /**
     * 批量获取激活码详情 [接口调用许可]
     * @param array $activeCodeList
     * @param string $corpId
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function batchGetActiveInfoByCode(array $activeCodeList, string $corpId)
    {
        $params = [
            'active_code_list' => $activeCodeList,
            'corpid'           => $corpId,
        ];
        return $this->httpPostJson('cgi-bin/license/batch_get_active_info_by_code', $params);
    }

    /**
     * 获取企业的帐号列表
     * @param string $corpId
     * @param int $limit
     * @param string $cursor
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getListActivedAccount(string $corpId, int $limit = 500, string $cursor = '')
    {
        $params = [
            "corpid" => $corpId,
            "limit"  => $limit,
            "cursor" => $cursor
        ];
        return $this->httpPostJson('cgi-bin/license/list_actived_account', $params);
    }

    /**
     * 获取成员的激活详情
     * @param string $corpId
     * @param string $userId
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getActiveInfoByUser(string $corpId, string $userId)
    {
        $params = [
            "corpid" => $corpId,
            "userid" => $userId,
        ];
        return $this->httpPostJson('cgi-bin/license/get_active_info_by_user', $params);
    }

    /**
     * 帐号继承
     *  转移成员和接收成员属于同一个企业
    转移成员的帐号已激活，且在有效期
    转移许可的成员为离职成员时，不限制下次转接的时间间隔
    转移许可的成员为在职成员时，转接后30天后才可进行下次转接
    接收成员许可不能与转移成员的许可重叠（同时拥有基础帐号或者互通帐号）
    单次转移的帐号数限制在1000以内
     * @param string $corpId
     * @param array $list
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function batchTransferLicense(string $corpId, array $list)
    {
        $params = [
            "corpid"        => $corpId,
            "transfer_list" => $list
        ];
        return $this->httpPostJson('cgi-bin/license/batch_transfer_license', $params);
    }

}
