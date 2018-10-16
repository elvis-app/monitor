<?php
/**
 * 启动引导类
 * @datetime  2018/9/28 15:41
 * @author    fangjianwei
 * @copyright www.zuzuche.com
 */

declare(strict_types = 1);//默认严格模式

namespace TantuApiGateway\Monitor\Bootstrap;

use TantuApiGateway\Monitor\Providers\Recorder;
use TantuApiGateway\Monitor\Providers\Sender;
use TantuApiGateway\Monitor\Providers\System;
use TantuApiGateway\Monitor\Providers\LogManage;

/**
 * Class Boot
 * @package TantuApiGateway\Monitor\Bootstrap
 * @author  fangjianwei
 */
class Boot {
    use Recorder, Sender, System, LogManage;
}