<?php
/**
 * 服务异常类
 * @datetime  2018/9/27 13:08
 * @author    fangjianwei
 * @copyright www.zuzuche.com
 */

declare(strict_types = 1);//默认严格模式

namespace TantuApiGateway\Monitor\Exception;

/**
 * Class ServiceException
 * @package TantuApiGateway\Monitor\Exception
 * @author  fangjianwei
 */
class ServiceException extends \Exception {
    public function __construct(string $message) {
        parent::__construct($message);
    }
}