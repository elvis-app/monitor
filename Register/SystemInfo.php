<?php
/**
 * 系统信息
 * @datetime  2018/10/16 14:38
 * @author    fangjianwei
 * @copyright www.zuzuche.com
 */

declare(strict_types = 1);//默认严格模式

namespace TantuApiGateway\Monitor\Register;

/**
 * Class SystemInfo
 * @package TantuApiGateway\Monitor\Register
 * @author  fangjianwei
 */
class SystemInfo {

    /**
     * 系统启动时间
     * @var int
     */
    public static $startUpTime = 0;

    /**
     * 系统启动内容
     * @var int
     */
    public static $startUpMemory = 0;


    /**
     * 获取运行内容,单位b
     * @author  fangjianwei
     * @return float
     */
    public static function ram():float{
        return memory_get_usage() - self::$startUpMemory;
    }

    /**
     * 获取运行时间
     * @author  fangjianwei
     * @return int
     */
    public static function runtime():float{
        return microtime(true) - self::$startUpTime;
    }
}