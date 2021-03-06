<?php
/**
 * 行为日志
 * @datetime  2018/9/27 12:16
 * @author    fangjianwei
 * @copyright www.zuzuche.com
 */

declare(strict_types = 1);//默认严格模式

namespace TantuApiGateway\Monitor\Logs;

use TantuApiGateway\Monitor\MonitorStatus;

/**
 * Class Behavior
 * @package TantuApiGateway\Monitor\Logs
 * @author  fangjianwei
 */
class Behavior extends LogAbstract {

    /**
     * 记录日志
     * @author  fangjianwei
     * @param array $message
     */
    public function record($recorder, array $message): void {
        $message = array_merge($message, [
            'record_type' => MonitorStatus::RECORD_BEHAVIOR,
            'record_time' => date('Y-m-d H:i:s'),
        ]);
        $recorder::write($message);
    }
}