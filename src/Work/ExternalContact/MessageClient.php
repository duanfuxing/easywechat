<?php

/*
 * This file is part of the overtrue/wechat.
 *
 * (c) overtrue <i@overtrue.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyWeChat\Work\ExternalContact;

use EasyWeChat\Kernel\BaseClient;
use EasyWeChat\Kernel\Exceptions\InvalidArgumentException;

/**
 * Class MessageClient.
 *
 * @author milkmeowo <milkmeowo@gmail.com>
 */
class MessageClient extends BaseClient
{
    /**
     * Required attributes.
     *
     * @var array
     */
    protected $required = ['content', 'media_id', 'title', 'url', 'pic_media_id', 'appid', 'page'];

    protected $textMessage = [
        'content' => '',
    ];

    protected $imageMessage = [
        'media_id' => '',
    ];

    protected $linkMessage = [
        'title'  => '',
        'picurl' => '',
        'desc'   => '',
        'url'    => '',
    ];

    protected $miniprogramMessage = [
        'title'        => '',
        'pic_media_id' => '',
        'appid'        => '',
        'page'         => '',
    ];

    /**
     * 添加企业群发消息模板
     *
     * @see https://work.weixin.qq.com/api/doc#90000/90135/91560
     *
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidArgumentException
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function submit(array $msg)
    {
        $params = $this->formatMessage($msg);

        return $this->httpPostJson('cgi-bin/externalcontact/add_msg_template', $params);
    }

    /**
     * 获取企业群发消息发送结果.
     *
     * @see https://work.weixin.qq.com/api/doc#90000/90135/91561
     *
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get(string $msgId)
    {
        return $this->httpPostJson('cgi-bin/externalcontact/get_group_msg_result', [
            'msgid' => $msgId,
        ]);
    }

    /**
     * 获取群发记录列表
     * @param string $chatType
     * @param string $startTime
     * @param string $endTime
     * @param string $creator
     * @param int $filterType
     * @param int $limit
     * @param string $cursor
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getGroupMsgList(string $chatType, string $startTime, string $endTime, string $creator, int $filterType = 2, int $limit = 50, string $cursor = '')
    {
        $params = [
            'chat_type'   => $chatType,
            'start_time'  => $startTime,
            'end_time'    => $endTime,
            'filter_type' => $filterType,
            'limit'       => $limit,
            'cursor'      => $cursor,
        ];
        if (!empty($creator)) {
            $params['creator'] = $creator;
        }
        return $this->httpPostJson('cgi-bin/externalcontact/get_groupmsg_list_v2', $params);
    }

    /**
     * 获取群发成员发送任务列表
     * @param string $msgId
     * @param int $limit
     * @param string $cursor
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getGroupMsgTask(string $msgId, int $limit = 50, string $cursor = '')
    {
        $params = [
            'msgid'  => $msgId,
            'limit'  => $limit,
            'cursor' => $cursor,
        ];
        return $this->httpPostJson('cgi-bin/externalcontact/get_groupmsg_task', $params);
    }

    /**
     * 获取企业群发成员执行结果
     * @param string $msgId
     * @param string $userId
     * @param int $limit
     * @param string $cursor
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getGroupMsgSendResult(string $msgId, string $userId, int $limit = 50, string $cursor = '')
    {
        $params = [
            'msgid'  => $msgId,
            'userid' => $userId,
            'limit'  => $limit,
            'cursor' => $cursor,
        ];
        return $this->httpPostJson('cgi-bin/externalcontact/get_groupmsg_send_result', $params);
    }

    /**
     * 提醒成员群发
     * @param string $msgId
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function remindGroupMsgSend(string $msgId)
    {
        $params = [
            'msgid' => $msgId,
        ];
        return $this->httpPostJson('cgi-bin/externalcontact/remind_groupmsg_send', $params);
    }

    /**
     * 停止企业群发
     * @param string $msgId
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function cancelGroupMsgSend(string $msgId)
    {
        $params = [
            'msgid' => $msgId,
        ];
        return $this->httpPostJson('cgi-bin/externalcontact/cancel_groupmsg_send', $params);
    }

    /**
     * 发送新客户欢迎语.
     *
     * @see https://work.weixin.qq.com/api/doc#90000/90135/91688
     *
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidArgumentException
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function sendWelcome(string $welcomeCode, array $msg)
    {
        // 暂时不做参数验证，等二期优化在考虑 todo...
//        $formattedMsg = $this->formatMessage($msg);

        $params = array_merge($msg, [
            'welcome_code' => $welcomeCode,
        ]);

        return $this->httpPostJson('cgi-bin/externalcontact/send_welcome_msg', $params);
    }

    /**
     * @return array
     *
     * @throws InvalidArgumentException
     */
    protected function formatMessage(array $data = [])
    {
        $params = $data;

        if (!empty($params['text'])) {
            $params['text'] = $this->formatFields($params['text'], $this->textMessage);
        }

        if (!empty($params['image'])) {
            $params['image'] = $this->formatFields($params['image'], $this->imageMessage);
        }

        if (!empty($params['link'])) {
            $params['link'] = $this->formatFields($params['link'], $this->linkMessage);
        }

        if (!empty($params['miniprogram'])) {
            $params['miniprogram'] = $this->formatFields($params['miniprogram'], $this->miniprogramMessage);
        }

        return $params;
    }

    /**
     * @return array
     *
     * @throws InvalidArgumentException
     */
    protected function formatFields(array $data = [], array $default = [])
    {
        $params = array_merge($default, $data);
        foreach ($params as $key => $value) {
            if (in_array($key, $this->required, true) && empty($value) && empty($default[$key])) {
                throw new InvalidArgumentException(sprintf('Attribute "%s" can not be empty!', $key));
            }

            $params[$key] = empty($value) ? $default[$key] : $value;
        }

        return $params;
    }
}
