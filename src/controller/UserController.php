<?php

namespace wor\controller;

use wor\util\ResponseJson;
use wor\lib\mvc\Controller;
use wor\service\UserService;

/**
 * Class UserController
 */
class UserController extends Controller
{
    private $userService;

    public function __construct(
        UserService $userService
    ) {
        $this->userService = $userService;
    }

    /**
     * @GetMapping(url="/index")
     */
    public function index()
    {
        return "index.html";
    }

    /**
     * @PostMapping(url="/login")
     */
    public function login()
    {
        # DB 로그인 요청
        $reqJson = $this->getRequestContext()->getBody();

        $ret = $this->userService->login(
            $reqJson->hiveId,
            $reqJson->name
        );

        $response = null;
        if ($ret == 1) {
            # 최초 로그인
            # 영토 새로 발급
            # resource 테이블에 새로 저장

            $response = "최초 로그인";
        } elseif ($ret == 2) {
            $response = "최초 아님";
        } else {
            //throw error
            $response = "최초 아님";
        }

        return ResponseJson::builder()
            ->setResult(ResponseJson::SUCCESS)
            ->setBody($response)
            ->build();
    }

    /**
     * @GetMapping(url="/tile/<id:int>")
     */
    public function getTileInfo($territoryId)
    {
        return ResponseJson::builder()
            ->setResult(ResponseJson::SUCCESS)
            ->setBody($this->userService->getTiles($territoryId))
            ->build();
    }
}
