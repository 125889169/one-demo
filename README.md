
one框架的一些例子   
https://github.com/lizhichao/one


* [one框架Demo](https://github.com/lizhichao/one-demo/blob/master/README.md#one框架demo)
    * [安装](https://github.com/lizhichao/one-demo/blob/master/README.md#安装)
    * [使用例子](https://github.com/lizhichao/one-demo/blob/master/README.md#使用例子)
        * [websocket使用例子](https://github.com/lizhichao/one-demo/blob/master/README.md#websocket使用例子)
            * [带路由例子](https://github.com/lizhichao/one-demo/blob/master/README.md#带路由例子)
            * [不带路由例子](https://github.com/lizhichao/one-demo/blob/master/README.md#不带路由例子)
        * [orm模型使用例子](https://github.com/lizhichao/one-demo/blob/master/README.md#orm模型使用例子)
        * [tcp使用例子](https://github.com/lizhichao/one-demo/blob/master/README.md#tcp使用例子)
            * [带路由例子](https://github.com/lizhichao/one-demo/blob/master/README.md#带路由例子-1)
            * [不带路由例子](https://github.com/lizhichao/one-demo/blob/master/README.md#不带路由例子-1)
        * [各种混合协议之间相互通讯例子](https://github.com/lizhichao/one-demo/blob/master/README.md#各种混合协议之间相互通讯例子)
        * [task任务使用例子](https://github.com/lizhichao/one-demo/blob/master/README.md#task任务使用例子)
        * [rpc调用例子](https://github.com/lizhichao/one-demo/blob/master/README.md#rpc调用例子)
        * [globalData进程之间内存共享使用例子](https://github.com/lizhichao/one-demo/blob/master/README.md#globaldata进程之间内存共享使用例子)
        * [路由中间件使用例子](https://github.com/lizhichao/one-demo/blob/master/README.md#路由中间件使用例子)
    * [小提示](https://github.com/lizhichao/one-demo/blob/master/README.md#小提示)
    * [rpc使用例子](https://github.com/lizhichao/one-app/tree/test_rpc)
    * [分布式长连接（tcp）例子](https://github.com/lizhichao/one-app/tree/cloud_demo)
    * [Actor例子](https://github.com/lizhichao/one-app/tree/actor_demo)

# one框架Demo

[框架文档地址](https://www.kancloud.cn/vic-one/php-one/826876)

## 安装

```shell
composer create-project lizhichao/one-demo
```

## 使用例子

### websocket使用例子

[代码地址](https://github.com/lizhichao/one-demo/tree/master/App/Test/WebSocket)

#### 带路由例子

```
#启动
php App/swoole.php test_ws_router

#测试地址
http://127.0.0.1:8081/ws/router

#打开浏览器控制台 send(url,content)
send('a','xxxx')
```
#### 不带路由例子
  
```
#启动
php App/swoole.php test_ws

#测试地址
http://127.0.0.1:8081/ws

#打开浏览器控制台 send(content)
send('xxxx')
```

   
### orm模型使用例子

[代码地址](https://github.com/lizhichao/one-demo/tree/master/App/Test/Orm)

### tcp使用例子

#### 带路由例子

```
#启动
php App/swoole.php test_tcp_router

```
#### 不带路由例子
  
```
#启动
php App/swoole.php test_tcp

```

### 各种混合协议之间相互通讯例子

http webSocket Tcp 相互通讯

[代码地址](https://github.com/lizhichao/one-demo/tree/master/App/Test/MixPro)

> 只要swoole支持的协议都可以，这里就不一一举例了

```
#启动globalData
php App/swoole.php global_data

#启动服务
php App/swoole.php test_all

#打开地址
http://127.0.0.1:8081/mix

```

### task任务使用例子

### rpc调用例子

### globalData进程之间内存共享使用例子

### 路由中间件使用例子


## 小提示

`php App/swoole.php xxx`  其实就是启动Config下`xxx.php`配置的swoole服务器 
