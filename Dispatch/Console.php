<?php
/**
 * 控制台输出
 * @datetime  2018/9/27 12:20
 * @author    fangjianwei
 * @copyright www.zuzuche.com
 */

declare(strict_types = 1);//默认严格模式

namespace TantuApiGateway\Monitor\Dispatch;

/**
 * Class Console
 * @package TantuApiGateway\Monitor\Dispatch
 * @author  fangjianwei
 */
class Console extends DispatchAbstract {

    /**
     * @author  fangjianwei
     * @param array $message
     */
    public function send(array $message): void {
        echo json_encode($message, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
        exit(0);
    }
}