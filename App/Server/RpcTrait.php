<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/12/6
 * Time: 17:32
 */

namespace App\Server;


use App\Exceptions\Handler;
use One\Facades\Log;
use One\Swoole\RpcServer;

trait RpcTrait
{
    private function callRpc($data, $ide = 0, $host = '', $px = '')
    {
        try {
            $arr = msgpack_unpack($data);
            if (isset($arr['c'])) {
                Log::setTraceId($arr['i'] . '.' . uuid());
                $str = RpcServer::call($arr);
                Log::flushTraceId();
            } else if (isset($arr['i'])) {
                $str = RpcServer::close($arr['i']);
            } else if ($ide === 1) {
                $str = RpcServer::ideHelper($host, $px);
            } else {
                $str = msgpack_pack('params error');
            }
            return $str;
        } catch (\Throwable $e) {
            Handler::report($e);
            return msgpack_pack($e->getMessage());
        }

    }
}