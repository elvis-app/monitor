<?php
/**
 * 派遣接口类
 * @datetime  2018/9/27 13:16
 * @author    fangjianwei
 * @copyright www.zuzuche.com
 */

declare(strict_types = 1);//默认严格模式

namespace TantuApiGateway\Monitor\Dispatch;

/**
 * Interface DispatchInterface
 * @package TantuApiGateway\Monitor\Dispatch
 */
interface DispatchInterface {
    /**
     * 发送信息
     * @author  fangjianwei
     * @param array $message
     */
    public function send(array $message): void;
}