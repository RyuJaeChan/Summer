<?php

namespace wor\dao\sql;

class MapSql
{
    const SELECT_MAP_BY_ID =
        "SELECT
            territory_id 
              ,type
              , x
              , y
              , building_id
              , resource_id
        FROM 
        WHERE territory_id = ?;";

    const INSERT_USER_VIEW_INIT =
        "INSERT INTO user_view (
            user_id, territory_id, check_time
        )
        VALUE(?, ?, NOW()); ";

    const INSERT_USER_VIEW =
        "INSERT INTO user_view(
            user_id
            , territory_id
            , check_time)
        VALUES (
            ?
            . (SELECT territory_id
            FROM map
            WHERE x = ? AND y = ?)
            , NOW() + ?
        );";
}
