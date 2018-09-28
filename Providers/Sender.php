<?php
/**
 * @datetime  2018/9/28 15:32
 * @author    fangjianwei
 * @copyright www.zuzuche.com
 */

declare(strict_types = 1);//默认严格模式

namespace TantuApiGateway\Monitor\Providers;
use TantuApiGateway\Monitor\Exception\NetworkException;
use TantuApiGateway\Monitor\Network\NetworkInterface;
use TantuApiGateway\Monitor\Io\Buffer;
use TantuApiGateway\Monitor\Monitor;

trait Sender {

    /**
     * 发送日志
     * @author  fangjianwei
     * @param Monitor $monitor
     * @param NetworkInterface $network
     * @param bool $isBackEnd是否后台执行，只支持fastcgi模式,如果后台执行，请务必设置进程超时断开，不然会造成php worker阻塞
     * @throws NetworkException
     */
    public static function send(Monitor $monitor, NetworkInterface $network, $isBackEnd = false): void {
        if(true !== $monitor::isOpen()) return;
        if(true === $isBackEnd){
            //后台执行
            if(!is_callable('fastcgi_finish_request')){
                throw new NetworkException('只支持fastcgi模式下使用');
            }
            register_shutdown_function(function()use($network){
                fastcgi_finish_request();
                Buffer::flush($network);
            });
            return;
        }
        Buffer::flush($network);
    }
}