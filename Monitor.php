<?php
/**
 * 监控入口
 * @datetime  2018/9/27 12:12
 * @author    fangjianwei
 * @copyright www.zuzuche.com
 */

declare(strict_types = 1);//默认严格模式

namespace TantuApiGateway\Monitor;

use TantuApiGateway\Monitor\Exception\MonitorException;
use TantuApiGateway\Monitor\Io\Buffer;

/**
 * @method static record(\TantuApiGateway\Monitor\Logs\LogInterface $logger, array $message): void
 * @method static send(\TantuApiGateway\Monitor\Dispatch\DispatchInterface $dispatch, $isBackEnd = false): void
 * @method static runtime(): float
 * @method static ram(): float
 * @method static read(int $offset = 0, int $length = 0): array
 * @method static reset(): void
 * @see \TantuApiGateway\Monitor\Bootstrap\Boot
 */
class Monitor {
    /**
     * 是否开启服务
     * @var int
     */
    protected static $open = MonitorStatus::OPEN_OFF;

    /**
     * @var \TantuApiGateway\Monitor\Bootstrap\Boot $boot
     */
    private static $boot;

    /**
     * 启动服务
     * @author  fangjianwei
     * @return bool
     */
    public static function start(): bool {
        if (self::$boot instanceof \TantuApiGateway\Monitor\Bootstrap\Boot) return true;
        self::$open = MonitorStatus::OPEN_ON;
        self::$boot = new \TantuApiGateway\Monitor\Bootstrap\Boot();
        self::$boot::startUp();
        return true;
    }

    /**
     * 打开服务
     * @author  fangjianwei
     */
    public static function open(): void {
        self::$open = MonitorStatus::OPEN_ON;
    }

    /**
     * 关闭服务
     * @author  fangjianwei
     */
    public static function close(): void {
        Buffer::reset();
        self::$open = MonitorStatus::OPEN_OFF;
    }

    /**
     * 判断是否开启服务
     * @author  fangjianwei
     * @return int
     */
    public static function isOpen(): bool {
        return self::$open === MonitorStatus::OPEN_ON;
    }

    /**
     * @author  fangjianwei
     * @param $name
     * @param $arguments
     * @throws MonitorException
     */
    public static function __callStatic($name, $arguments) {
        if (!self::$boot instanceof \TantuApiGateway\Monitor\Bootstrap\Boot) {
            throw new MonitorException('请先start监控服务');
        }
        if (!in_array($name, [
            'record',
            'send',
            'runtime',
            'ram',
            'read',
            'reset',
        ])) {
            throw new MonitorException(sprintf('没有%s方法', $name));
        }
        return call_user_func_array([self::$boot, $name], array_merge(
            [new self()],
            $arguments
        ));
    }
}