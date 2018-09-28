<?php
/**
 * @datetime  2018/9/27 13:18
 * @author    fangjianwei
 * @copyright www.zuzuche.com
 */

declare(strict_types = 1);//默认严格模式

namespace TantuApiGateway\Monitor\Exception;


class NetworkException extends \Exception {
    public function __construct(string $message) {
        parent::__construct($message);
    }
}