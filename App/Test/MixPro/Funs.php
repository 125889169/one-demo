<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/11/12
 * Time: 10:55
 */

namespace App\Test\MixPro;


trait Funs
{
    protected function sendTo($n, $d)
    {
        if ($n == 'all') {
            $arr = $this->get('http');
            if ($arr) {
                foreach ($arr as $name => $v) {
                    $this->set("data.{$name}.", $d, time() + 60);
                }
            }
            $arr = $this->get('fd-name');
            if (!$arr) {
                return false;
            }
            foreach ($arr as $fd => $v) {
                $info = $this->getClientInfo($fd);
                if (isset($info['websocket_status'])) {
                    $this->push($fd, $d);
                } else if ($info) {
                    $this->send($fd, $d);
                }else{
                    $this->unBindFd($fd);
                }
            }
        } else if ($this->get("http.{$n}")) { // http 用户
            $this->set("data.{$n}.", $d, time() + 60);
        } else {
            $this->sendOrPushByName($n, $d);
        }
    }

    protected function getAllName()
    {
        $arr = $this->get('http');
        $r   = [];
        if ($arr) {
            foreach ($arr as $name => $v) {
                $r[$name] = 1;
            }
        }
        $arr = $this->get('name-fd');
        if ($arr) {
            foreach ($arr as $name => $v) {
                $r[$name] = 2;
            }
        }
        return $r;
    }
}