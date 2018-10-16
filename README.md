# monitor监控服务
sample

 Monitor::start();
$behavior = new Behavior();
Monitor::record($behavior, [
    'content' => 'test1',
    'title'   => 'test1',
]);
Monitor::record($behavior, [
    'content' => 'test2',
    'title'   => 'test2',
]);
$kafkaHttp = new KafkaHttp();
$kafkaHttp->url = '127.0.0.1:8001/kafka/message/send';
$kafkaHttp->topic = 'test';

Monitor::send($kafkaHttp, true);
