<?php
/**
 * 日志缓冲
 * @datetime  2018/9/27 12:11
 * @author    fangjianwei
 * @copyright www.zuzuche.com
 */

declare(strict_types = 1);//默认严格模式

namespace TantuApiGateway\Monitor\Io;

use TantuApiGateway\Monitor\Dispatch\DispatchInterface;

/**
 * Class Buffer
 * @package TantuApiGateway\Monitor\Io
 * @author  fangjianwei
 */
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
     * 读取缓冲数据
     * @author  fangjianwei
     * @param int $offset
     * @param int $length
     * @return array
     */
    public static function read(int $offset = 0, int $length = 0): array {
        if ($offset > 0 && $length > 0) {
            return array_slice(self::$buffer, $offset, $length);
        } elseif ($offset > 0) {
            return array_slice(self::$buffer, $offset);
        } elseif ($length > 0) {
            return array_slice(self::$buffer, 0, $length);
        }
        return self::$buffer;
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
     * @param DispatchInterface $dispatch
     */
    public static function flush(DispatchInterface $dispatch): void {
        if (empty(self::$buffer)) return;
        $dispatch->send(self::$buffer);
        //重置缓冲区
        self::reset();
    }
}