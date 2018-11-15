<?php
/**
 * Created by PhpStorm.
 * User: tanszhe
 * Date: 2018/10/12
 * Time: 下午9:37
 */

namespace App\GlobalData;

use One\Swoole\Server\TcpServer;

class Server extends TcpServer
{
    /**
     * @var Data
     */
    private $global = null;

    public function __construct(\swoole_server $server, array $conf)
    {
        parent::__construct($server, $conf);
        $this->global = new Data();
    }

    public function onReceive(\swoole_server $server, $fd, $reactor_id, $data)
    {
        $ar = unserialize($data);
        if (method_exists($this->global, $ar['m'])) {
            $ret = $this->global->{$ar['m']}(...$ar['args']);
            if (strpos($ar['m'], 'get') !== false) {
                $this->send($fd, serialize($ret));
            }
        } else {
            echo "warn method {$ar['m']} not exist\n";
        }
    }

    public function onWorkerStart(\swoole_server $server, $worker_id)
    {

    }

}