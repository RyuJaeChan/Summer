<?php

namespace wor\entity;

use wor\lib\mvc\Entity;

/**
 * Class User
 * @package wor\entity
 *
 * @table("user")
 */
class User extends Entity
{
    /**
     * @id
     */
    private $id;
    private $hiveId;
    private $name;
    private $userDataId;
    private $lastLoginTime;

    /**
     * @ref("user_data")
     */
    #private $userData;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getHiveId()
    {
        return $this->hiveId;
    }

    public function setHiveId($hiveId)
    {
        $this->hiveId = $hiveId;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getLastLoginTime()
    {
        return $this->lastLoginTime;
    }

    public function setLastLoginTime($lastLoginTime)
    {
        $this->lastLoginTime = $lastLoginTime;
    }

    public function getUserDataId()
    {
        return $this->userDataId;
    }

    public function setUserDataId($userDataId)
    {
        $this->userDataId = $userDataId;
    }


    /**
     * @return mixed
    public function getUserData()
    {
        return $this->userData;
    }

    /**
     * @param mixed $userData
    public function setUserData($userData)
    {
        $this->userData = $userData;
    }
    */
}
