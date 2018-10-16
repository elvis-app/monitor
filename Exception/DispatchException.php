<?php
/**
 * 派遣异常类
 * @datetime  2018/9/27 13:18
 * @author    fangjianwei
 * @copyright www.zuzuche.com
 */

declare(strict_types = 1);//默认严格模式

namespace TantuApiGateway\Monitor\Exception;

/**
 * Class DispatchException
 * @package TantuApiGateway\Monitor\Exception
 * @author  fangjianwei
 */
class DispatchException extends \Exception {
    public function __construct(string $message) {
        parent::__construct($message);
    }
}