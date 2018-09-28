<?php
/**
 * @datetime  2018/9/27 13:03
 * @author    fangjianwei
 * @copyright www.weicut.com
 */

declare(strict_types = 1);//默认严格模式

namespace TantuApiGateway\Monitor\Logs;
use TantuApiGateway\Monitor\Bootstrap\Boot;

interface LogInterface {

    /**
     * 记录日志
     * @author  fangjianwei
     * @param array $message
     */
    public function record(Boot $recorder, array $message):void;

}