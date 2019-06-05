<?php

namespace wor\dao\sql;

class UserSQL
{
    const INSERT_DUPL_USER =
        "INSERT iNTO user (
            hive_id
            , name
            , last_login_time
        )
        VALUE (
            ?
            , ?
            , NOW()
        )
        ON DUPLICATE KEY UPDATE last_login_time = NOW();";

    const INSERT_USER_DATA =
        "INSERT INTO user_data (
            user_id
            , territory_id
            , territory_x
            , territory_y
        )
        VALUE (
            ?, ?, ?, ?
        );
        ";

    const UPDATE_USER =
        "UPDATE user
            SET user_data_id = ?
        WHERE id = ?;
        ";

    const SELECT_USER_DATA =
        "SELECT 
            user_id
            , territory_id
            , territory_x
            , territory_y
            , curr_population
            , max_population
            , loyalty
            , alliance_army
            , user_battle_id
            , user_raid_id
            , alliance_request_count
        FROM user_data
        WHERE user_id = ?;
        ";

    const SELECT_USER_RESOURCE =
        "";
    const SELECT_USER_BUFF =
        "";
    const SELECT_USER_BUILDING =
        "";
    const SELECT_USER_VIEW =
        "";
    const SELECT_USER_BUILDING_UPGRADE =
        "";
    const SELECT_USER_WEAPON =
        "";
    const SELECT_USER_WEAPON_UPGRADE =
        "";


}
