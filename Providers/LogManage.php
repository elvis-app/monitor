<?php
/**
 * 日志管理
 * @datetime  2018/10/16 17:04
 * @author    fangjianwei
 * @copyright www.zuzuche.com
 */

declare(strict_types = 1);//默认严格模式

namespace TantuApiGateway\Monitor\Providers;
use TantuApiGateway\Monitor\Io\Buffer;
use TantuApiGateway\Monitor\Monitor;

trait LogManage {

    /**
     * 重置缓冲数据
     * @author  fangjianwei
     * @param int $offset
     * @param int $length
     * @return array
     */
    public function read(Monitor $monitor, int $offset = 0, int $length = 0):array{
        if(true !== $monitor::isOpen()) return [];
        return Buffer::read($offset, $length);
    }

    /**
     * 重置缓冲数据
     * @author  fangjianwei
     */
    public function reset():void{
        Buffer::reset();
    }
}