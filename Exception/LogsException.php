<?php
/**
 * 日志异常类
 * @datetime  2018/9/27 13:08
 * @author    fangjianwei
 * @copyright www.zuzuche.com
 */

declare(strict_types = 1);//默认严格模式

namespace TantuApiGateway\Monitor\Exception;

/**
 * Class LogsException
 * @package TantuApiGateway\Monitor\Exception
 * @author  fangjianwei
 */
class LogsException extends \Exception {
    public function __construct(string $message) {
        parent::__construct($message);
    }
}