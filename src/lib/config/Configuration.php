<?php

namespace wor\lib\config;

class Configuration
{
    private $loggerInfo;
    private $cacheInfo;
    private $controllerInfo;
    private $serviceInfo;
    private $dbInfo;

    /**
     * Configuration constructor.
     *
     * @param string $config
     */
    #public function __construct(string $config = __ROOT__ . "/config/config.json")
    public function __construct(string $config = "/game/wor/config/config.json")
    {
        $this->loadConfigFile($config);
    }

    /**
     * @param string $dir
     */
    public function loadConfigFile(string $dir)
    {
        $configFile = json_decode(file_get_contents($dir), true);

        $this->loggerInfo       = $configFile["logger"];
        $this->cacheInfo        = $configFile["cache"];
        $this->controllerInfo   = $configFile["controller"];
        $this->dbInfo           = $configFile["database"];

        #not use now...
        $this->serviceInfo      = $configFile["service"];
    }

    /**
     * @return mixed
     */
    public function getLoggerInfo()
    {
        return $this->loggerInfo;
    }

    /**
     * @return mixed
     */
    public function getCacheInfo()
    {
        return $this->cacheInfo;
    }

    /**
     * @return mixed
     */
    public function getControllerInfo()
    {
        return $this->controllerInfo;
    }

    /**
     * @return mixed
     */
    public function getServiceInfo()
    {
        return $this->serviceInfo;
    }

    /**
     * @return mixed
     */
    public function getDbInfo()
    {
        return $this->dbInfo;
    }
}
