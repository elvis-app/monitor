<?php
/**
 * kafka输出
 * @datetime  2018/9/27 12:20
 * @author    fangjianwei
 * @copyright www.zuzuche.com
 */

declare(strict_types = 1);//默认严格模式

namespace TantuApiGateway\Monitor\Dispatch;

use TantuApiGateway\Monitor\Exception\DispatchException;

/**
 * Class KafkaHttp
 * @package TantuApiGateway\Monitor\Dispatch
 * @author  fangjianwei
 */
class KafkaHttp extends DispatchAbstract {


    /**
     * kafka服务地址
     * @var null
     */
    public  $url = '';

    /**
     * kafka服务topic
     * @var null
     */
    public  $topic = '';

    /**
     * @author  fangjianwei
     * @param array $message
     * @throws DispatchException
     */
    public function send(array $message): void {
        if (empty($this->url)) {
            throw new DispatchException('缺少kafka服务url');
        }
        if (empty($this->topic)) {
            throw new DispatchException('缺少kafka服务topic');
        }
        $data = [
            'queue'     => [
                [
                    'topic'     => $this->topic,
                    'partition' => '',
                    'msgFlags'  => '',
                    'payload'   => json_encode($message),
                    'key'       => '',
                ],
            ],
            'time'      => time(),
            'secretKey' => 'ysygrQqdJ18KshtacpODreDWBobxDtnd',
        ];
        $data = json_encode($data);
        $ch = curl_init();//初始化curl
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json; charset=utf-8',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, 2 );
        curl_setopt( $ch, CURLOPT_TIMEOUT, 2 );
        curl_exec($ch);//运行curl
        $errMsg = curl_error($ch);;
        curl_close($ch);
        if(!empty($errMsg)){
            throw new DispatchException($errMsg);
        }

    }
}