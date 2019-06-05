<?php
/**
 * Created by PhpStorm.
 * User: jcY
 * Date: 2019-06-04
 * Time: 오후 12:28
 */

namespace wor\entity;


use wor\lib\mvc\Entity;

/**
 * Class UserData
 * @package wor\entity
 *
 * @table("user_data")
 */
class UserData extends Entity
{
    private $userId;
    private $territoryId;
    private $territoryX;
    private $territoryY;
    private $currPopulation;
    private $maxPopulation;
    private $loyalty;
    private $allianceArmy;
    private $populationAmount;
    private $userBattleId;
    private $userRaidId;
    private $allianceRequestCount;

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getTerritoryId()
    {
        return $this->territoryId;
    }

    /**
     * @param mixed $territoryId
     */
    public function setTerritoryId($territoryId)
    {
        $this->territoryId = $territoryId;
    }

    /**
     * @return mixed
     */
    public function getTerritoryX()
    {
        return $this->territoryX;
    }

    /**
     * @param mixed $territoryX
     */
    public function setTerritoryX($territoryX)
    {
        $this->territoryX = $territoryX;
    }

    /**
     * @return mixed
     */
    public function getTerritoryY()
    {
        return $this->territoryY;
    }

    /**
     * @param mixed $territoryY
     */
    public function setTerritoryY($territoryY)
    {
        $this->territoryY = $territoryY;
    }

    /**
     * @return mixed
     */
    public function getCurrPopulation()
    {
        return $this->currPopulation;
    }

    /**
     * @param mixed $currPopulation
     */
    public function setCurrPopulation($currPopulation)
    {
        $this->currPopulation = $currPopulation;
    }

    /**
     * @return mixed
     */
    public function getMaxPopulation()
    {
        return $this->maxPopulation;
    }

    /**
     * @param mixed $maxPopulation
     */
    public function setMaxPopulation($maxPopulation)
    {
        $this->maxPopulation = $maxPopulation;
    }

    /**
     * @return mixed
     */
    public function getLoyalty()
    {
        return $this->loyalty;
    }

    /**
     * @param mixed $loyalty
     */
    public function setLoyalty($loyalty)
    {
        $this->loyalty = $loyalty;
    }

    /**
     * @return mixed
     */
    public function getAllianceArmy()
    {
        return $this->allianceArmy;
    }

    /**
     * @param mixed $allianceArmy
     */
    public function setAllianceArmy($allianceArmy)
    {
        $this->allianceArmy = $allianceArmy;
    }

    /**
     * @return mixed
     */
    public function getPopulationAmount()
    {
        return $this->populationAmount;
    }

    /**
     * @param mixed $populationAmount
     */
    public function setPopulationAmount($populationAmount)
    {
        $this->populationAmount = $populationAmount;
    }

    /**
     * @return mixed
     */
    public function getUserBattleId()
    {
        return $this->userBattleId;
    }

    /**
     * @param mixed $userBattleId
     */
    public function setUserBattleId($userBattleId)
    {
        $this->userBattleId = $userBattleId;
    }

    /**
     * @return mixed
     */
    public function getUserRaidId()
    {
        return $this->userRaidId;
    }

    /**
     * @param mixed $userRaidId
     */
    public function setUserRaidId($userRaidId)
    {
        $this->userRaidId = $userRaidId;
    }

    /**
     * @return mixed
     */
    public function getAllianceRequestCount()
    {
        return $this->allianceRequestCount;
    }

    /**
     * @param mixed $allianceRequestCount
     */
    public function setAllianceRequestCount($allianceRequestCount)
    {
        $this->allianceRequestCount = $allianceRequestCount;
    }
}
