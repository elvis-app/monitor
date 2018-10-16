<?php
/**
 * es存储
 * @datetime  2018/9/29 9:53
 * @author    fangjianwei
 * @copyright www.zuzuche.com
 */

declare(strict_types = 1);//默认严格模式

namespace TantuApiGateway\Monitor\Dispatch;
use TantuApiGateway\Monitor\Exception\NetworkException;
use TantuApiGateway\Monitor\Register\SystemInfo;

/**
 * Class EsService
 * @package TantuApiGateway\Monitor\Dispatch
 * @author  fangjianwei
 */
class EsService extends DispatchAbstract {

    /**
     * @author  fangjianwei
     * @param array $message
     * @throws NetworkException
     */
    public function send(array $message): void {
        if(empty($message)) return;
        p($message);
        p(SystemInfo::ram());
//        p($message);
    }
}