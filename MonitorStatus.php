<?php
/**
 * @datetime  2018/9/27 17:41
 * @author    fangjianwei
 * @copyright www.zuzuche.com
 */

declare(strict_types = 1);//默认严格模式

namespace TantuApiGateway\Monitor;

/**
 * Class MonitorStatus
 * @package TantuApiGateway\Monitor
 * @author  fangjianwei
 */
class MonitorStatus {

    /**
     * 开启服务
     */
    const OPEN_ON = 1;
    /**
     * 关闭服务
     */
    const OPEN_OFF = 0;


    /**
     * 行为日志类型
     */
    const RECORD_BEHAVIOR = 'behavior';
    /**
     * 奔溃日志类型
     */
    const RECORD_CRASH = 'crash';
    /**
     * 调用日志类型
     */
    const RECORD_INVOKE = 'invoke';
}