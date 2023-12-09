<?php

namespace App\Classes;

use DateTime;

class Helpers
{
    public static function checkTimeVerified($verifiedExpires)
    {

        $expires = new DateTime($verifiedExpires);

        $now = new DateTime();

        $interval = $expires->diff($now);

        $diffInMinutes = $interval->i;

        return $diffInMinutes;
    }
}
