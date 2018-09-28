<?php
/**
 * 控制台输出
 * @datetime  2018/9/27 12:20
 * @author    fangjianwei
 * @copyright www.weicut.com
 */

declare(strict_types = 1);//默认严格模式

namespace TantuApiGateway\Monitor\Network;


class Console extends NetworkAbstract {

    /**
     * @author  fangjianwei
     * @param array $message
     */
    public function send(array $message): void {
        echo json_encode($message, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
        exit(0);
    }
}