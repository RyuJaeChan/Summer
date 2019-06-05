<?php

namespace wor\lib\app;

use wor\lib\cache\Cache;
use wor\lib\cache\MemcachedCache;
use wor\lib\config\Configuration;
use wor\lib\container\Container;
use wor\lib\exception\ServerException;
use wor\lib\mvc\ControllerManager;
use wor\lib\router\RequestContext;
use wor\lib\router\ResponseContext;
use wor\lib\router\Router;
use wor\util\JsonBuilder;

/**
 * Class SummerFramework
 *
 * @package wor\lib\app
 */
class SummerFramework
{
    private $controllerManager;
    private $config;

    /**
     * SummerFramework constructor.
     *
     * @param ControllerManager $controllerManager
     * @param Configuration $config
     */
    public function __construct(
        ControllerManager $controllerManager,
        Configuration $config
    ) {
        $this->config               = $config;
        $this->controllerManager    = $controllerManager;

        $this->initialize();
    }

    /**
     *
     * @param string $url
     * @param string $method
     * @param string $configFile
     */
    public function run(string $url, string $method, string $configFile)
    {
        # 여기다가 성능측정이랑 그런걸 넣어줘야하지안흥ㄹ까???????
        # 성능측정
        # 암호화
        # 또?


        $req = new RequestContext($url, $method);
        $res = new ResponseContext();

        try {
            $this->controllerManager->loadControllers(__ROOT__ . "/src/config/controller.php");
            Router::route($req, $res, $this->controllerManager->getMapper());
        } catch (ServerException $e) {
            $resBody = JsonBuilder::builder()
                ->setResult(0)
                ->setBody($e->getMessageBody())
                ->build();
            $res->setBody($resBody);
        } catch (\Exception $e) {
            http_response_code(500);
            # trigger_error("my trigger error", E_USER_ERROR);
            var_dump($e);
            exit(1);
        }
        finally {

        }
        $res->send();
    }


    /**
     * 초기화 실행
     * - 모듈 bind 수행
     */
    private function initialize()
    {
        #bind
        Container::getInstance()->bind(Cache::class, MemcachedCache::class);
    }
}
