<?php
/**
 * 日志接口类
 * @datetime  2018/9/27 13:03
 * @author    fangjianwei
 * @copyright www.zuzuche.com
 */

declare(strict_types = 1);//默认严格模式

namespace TantuApiGateway\Monitor\Logs;

/**
 * Interface LogInterface
 * @package TantuApiGateway\Monitor\Logs
 */
interface LogInterface {

    /**
     * 记录日志
     * @author  fangjianwei
     * @param array $message
     */
    public function record($recorder, array $message):void;


}