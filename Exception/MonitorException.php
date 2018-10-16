<?php
/**
 * 监控器异常类
 * @datetime  2018/9/27 18:00
 * @author    fangjianwei
 * @copyright www.zuzuche.com
 */

declare(strict_types = 1);//默认严格模式

namespace TantuApiGateway\Monitor\Exception;

/**
 * Class MonitorException
 * @package TantuApiGateway\Monitor\Exception
 * @author  fangjianwei
 */
class MonitorException extends \Exception{
    public function __construct(string $message) {
        parent::__construct($message);
    }
}