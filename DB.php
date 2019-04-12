<?php

require '../../inc/dbinfo.inc';

class DB
{
    public static function connect()
    {
        return mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);

    }
}