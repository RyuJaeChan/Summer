<?php

namespace wor\service;

use wor\dao\UserDao;
use wor\dao\MapDao;
use wor\lib\exception\ServerException;

class UserService
{
    private $userDao;
    private $mapDao;

    public function __construct(
        UserDao $userDao,
        MapDao $mapDao
    ) {
        $this->userDao  = $userDao;
        $this->mapDao   = $mapDao;
    }


    /**
     * @param int $territoryId
     *
     * @return array|mixed
     * @throws \wor\lib\exception\ServerException
     */
    public function getTiles(int $territoryId)
    {
        return $this->mapDao->selectMap($territoryId);
    }

    public function login(string $hiveId, string $name)
    {
        $ret = $this->userDao->insertDuplUser("dupl_test_id117", "dupl_test_name");

        if ($ret["result"] == 1) {
            # 최초 로그인
            # 필요한 테이블 생성
            $this->userDao->insertUserData($ret["id"], 0, 0, 0);
        }





        return null;
    }

    private function assignTerritory()
    {

    }
}
