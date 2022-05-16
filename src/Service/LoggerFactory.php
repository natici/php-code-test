<?php

namespace App\Service;

use \think\LogManager;

class LoggerFactory
{

    private $logger;

    /**
     * @throws \Exception
     */
    public function __construct($type)
    {
        if($type == 'log4php') {
            $this->logger = \Logger::getLogger("Log");
            return $this->logger;
        } else if ($type == 'think-log') {
            $this->logger = new LogManager();
            return $this->logger;
        } else {
            throw new \Exception("no Logger found");
        }
    }

    public function info($message='')
    {
        if($this->logger instanceof LogManager) {
            $message = strtoupper($message);
        }
        $this->logger->info($message);
    }

    public function debug($message = '')
    {
        if($this->logger instanceof LogManager) {
            $message = strtoupper($message);
        }
        $this->logger->debug($message);
    }

    public function error($message = '')
    {
        if($this->logger instanceof LogManager) {
            $message = strtoupper($message);
        }
        $this->logger->error($message);
    }

}