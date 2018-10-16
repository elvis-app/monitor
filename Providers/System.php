<?php
/**
 * 系统类
 * @datetime  2018/10/16 12:21
 * @author    fangjianwei
 * @copyright www.zuzuche.com
 */

declare(strict_types = 1);//默认严格模式

namespace TantuApiGateway\Monitor\Providers;
use TantuApiGateway\Monitor\Register\SystemInfo;

/**
 * Trait System
 * @package TantuApiGateway\Monitor\Providers
 */
trait System {

    /**
     * 启动系统
     * @author  fangjianwei
     */
    public static function startUp():void{
        SystemInfo::$startUpTime = microtime(true);
        SystemInfo::$startUpMemory =  memory_get_usage();
    }

    /**
     * 获取运行内容
     * @author  fangjianwei
     * @return float
     */
    public static function ram():float{
        return SystemInfo::ram();
    }

    /**
     * 获取运行时间
     * @author  fangjianwei
     * @return int
     */
    public static function runtime():float{
        return SystemInfo::runtime();
    }


}