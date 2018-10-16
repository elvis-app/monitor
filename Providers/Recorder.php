<?php
/**
 * 记录类
 * @datetime  2018/9/28 15:30
 * @author    fangjianwei
 * @copyright www.zuzuche.com
 */

declare(strict_types = 1);//默认严格模式

namespace TantuApiGateway\Monitor\Providers;

use TantuApiGateway\Monitor\Logs\LogInterface;
use TantuApiGateway\Monitor\Exception\LogsException;
use TantuApiGateway\Monitor\Io\Buffer;
use TantuApiGateway\Monitor\Monitor;

/**
 * Trait Recorder
 * @package TantuApiGateway\Monitor\Providers
 */
trait Recorder {

    /**
     * 记录日志
     * @author  fangjianwei
     * @param Monitor $monitor
     * @param LogInterface $logger
     * @param array $message
     * @throws LogsException
     */
    public static function record(Monitor $monitor, LogInterface $logger, array $message): void {
        if (true !== $monitor::isOpen()) return;

        if (empty($message)) {
            throw new LogsException('消息结构体不能为空');
        }
        $fields = [
            'content',
        ];
        if (count(array_intersect($fields, array_keys($message))) < count($fields)) {
            throw new LogsException('消息结构体不完整');
        }
        $logger->record(new self(), $message);
    }

    /**
     * 写入缓冲区
     * @author  fangjianwei
     * @param array $message
     */
    public static function write(array $message) {
        Buffer::write($message);
    }
}