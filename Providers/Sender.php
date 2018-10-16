<?php
/**
 * 发送类
 * @datetime  2018/9/28 15:32
 * @author    fangjianwei
 * @copyright www.zuzuche.com
 */

declare(strict_types = 1);//默认严格模式

namespace TantuApiGateway\Monitor\Providers;
use TantuApiGateway\Monitor\Dispatch\DispatchInterface;
use TantuApiGateway\Monitor\Exception\DispatchException;
use TantuApiGateway\Monitor\Io\Buffer;
use TantuApiGateway\Monitor\Monitor;

/**
 * Trait Sender
 * @package TantuApiGateway\Monitor\Providers
 */
trait Sender {

    /**
     * 发送日志
     * @author  fangjianwei
     * @param Monitor $monitor
     * @param DispatchInterface $dispatch
     * @param bool $isBackEnd
     * @throws DispatchException
     */
    public static function send(Monitor $monitor, DispatchInterface $dispatch, $isBackEnd = false): void {
        if(true !== $monitor::isOpen()) return;
        if(true === $isBackEnd){
            //后台执行
            if(!is_callable('fastcgi_finish_request')){
                throw new DispatchException('只支持fastcgi模式下使用');
            }
            register_shutdown_function(function()use($dispatch){
                fastcgi_finish_request();
                Buffer::flush($dispatch);
            });
            return;
        }
        Buffer::flush($dispatch);
    }
}