<?php
/**
 * 日志缓冲
 * @datetime  2018/9/27 12:11
 * @author    fangjianwei
 * @copyright www.weicut.com
 */

declare(strict_types = 1);//默认严格模式

namespace TantuApiGateway\Monitor\Io;

use TantuApiGateway\Monitor\Network\NetworkInterface;

class Buffer {

    /**
     * 缓存区数据
     * @var array
     */
    private static $buffer = [];

    /**
     * @author  fangjianwei
     * @param array $data
     */
    public static function write(array $data): void {
        if (empty($data)) return;
        array_push(self::$buffer, $data);
    }

    /**
     * 返回缓冲区数量
     * @author  fangjianwei
     * @return int
     */
    public static function buffered(): int {
        return count(self::$buffer);
    }

    /**
     * 重置缓冲区数据
     * @author  fangjianwei
     */
    public static function reset(): void {
        self::$buffer = [];
    }

    /**
     * 将缓冲区数据写入下层的io
     * @author  fangjianwei
     */
    public static function flush(NetworkInterface $network): void {
        if (empty(self::$buffer)) return;
        $network->send(self::$buffer);
        //重置缓冲区
        self::reset();
    }
}