<?php

namespace App\Enums;

enum PostQueueStatus: int
{
    case New = 0;
    case Pending = 1;
}
