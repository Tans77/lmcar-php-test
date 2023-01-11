<?php

namespace App\Service;
use think\facade\Log;
class AppLogger
{
    const TYPE_LOG4PHP = 'log4php';
    const TYPE_THINKLOG = 'think-log';

    private $logger;
    private static $instance = null;
    //单例模式
    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new AppLogger();
        }
        return self::$instance;
    }
    
    
    public function __construct($type = self::TYPE_LOG4PHP)
    {
        if ($type == self::TYPE_LOG4PHP) {
            $this->logger = \Logger::getLogger("Log");
        }else if ($type == self::TYPE_THINKLOG){
            $this->logger = self::TYPE_THINKLOG;
        }
    }

    public function info($message = '')
    {
        
        if($this->logger == self::TYPE_THINKLOG) {
            $message = strtoupper($message);
            Log::info($message);
        }else {
            $this->logger->info($message);
        }
    }

    public function debug($message = '')
    {
        if($this->logger == self::TYPE_THINKLOG) {
            $message = strtoupper($message);
            Log::debug($message);
        }else {
            $this->logger->debug($message);
        }
    }

    public function error($message = '')
    {
        if($this->logger == self::TYPE_THINKLOG) {
            $message = strtoupper($message);
            Log::error($message);
        }else {
            $this->logger->error($message);
        }
    }
}