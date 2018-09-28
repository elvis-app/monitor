<?php
/**
 * kafka输出
 * @datetime  2018/9/27 12:20
 * @author    fangjianwei
 * @copyright www.weicut.com
 */

declare(strict_types = 1);//默认严格模式

namespace TantuApiGateway\Monitor\Network;

use TantuApiGateway\Monitor\Exception\NetworkException;

class KafkaHttp extends NetworkAbstract {


    /**
     * kafka服务地址
     * @var null
     */
    public  $url = null;

    /**
     * kafka服务topic
     * @var null
     */
    public  $topic = null;

    /**
     * @author  fangjianwei
     * @param array $message
     * @throws NetworkException
     */
    public function send(array $message): void {
        if (empty($this->url)) {
            throw new NetworkException('缺少kafka服务url');
        }
        if (empty($this->topic)) {
            throw new NetworkException('缺少kafka服务topic');
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
        curl_setopt($ch, CURLOPT_URL, $this->url);//抓取指定网页
        curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
        curl_setopt($ch, CURLOPT_POST, 1);//post提交方式

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json; charset=utf-8',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, 2 );
        curl_setopt( $ch, CURLOPT_TIMEOUT, 2 );
        $result = curl_exec($ch);//运行curl
        if(!empty(curl_error($ch))){
            echo curl_error($ch);
        }
        curl_close($ch);
        die($result);

    }
}