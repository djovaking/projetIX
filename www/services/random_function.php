<?php

namespace App\services;

function generateRandomString($nbByte)
{
    return bin2hex(random_bytes($nbByte));
}
