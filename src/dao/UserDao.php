<?php

namespace wor\dao;

use wor\entity\UserData;
use wor\lib\database\SQLExecutor;
use wor\dao\sql\UserSQL;

class UserDao
{
    /**
     * @param $hiveId
     * @param $name
     *
     * @throws \wor\lib\exception\ServerException
     */
    public function insertDuplUser($hiveId, $name)
    {
        $ret = SQLExecutor::executeUpdate(
            UserSQL::INSERT_DUPL_USER,
            [ $hiveId, $name ]
        );

        var_dump(SQLExecutor::getLastInsertId());

        return [
            "result"   => $ret,
            "id"        => SQLExecutor::getLastInsertId()
        ];
    }

    public function insertUserData($userId, $territoryId, $territoryX, $territoryY)
    {
        return SQLExecutor::executeUpdate(
            UserSQL::INSERT_USER_DATA,
            [ $userId, $territoryId, $territoryX, $territoryY ]
        );
    }

    public function insertUserDataByObj($userData)
    {
        return SQLExecutor::executeInsert($userData);
    }

    public function updateUserDataId($userId, $userDataId)
    {
        return SQLExecutor::executeUpdate(
            UserSQL::UPDATE_USER,
            [ $userId, $userDataId ]
        );
    }

    public function selectUserData($userId)
    {
        return SQLExecutor::executeQuery(
            UserSQL::SELECT_USER_DATA,
            UserData::class,
            [ $userId ]
        );
    }

    public function getLastId()
    {
        return SQLExecutor::getLastInsertId();
    }
}
