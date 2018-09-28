<?php
/**
 * @datetime  2018/9/28 15:41
 * @author    fangjianwei
 * @copyright www.zuzuche.com
 */

declare(strict_types = 1);//默认严格模式

namespace TantuApiGateway\Monitor\Bootstrap;

use TantuApiGateway\Monitor\Providers\Recorder;
use TantuApiGateway\Monitor\Providers\Sender;

class Boot {
    use Recorder;
    use Sender;
}