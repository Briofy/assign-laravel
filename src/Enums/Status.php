<?php

namespace Briofy\Assign\Enums;

use Briofy\RepositoryLaravel\Traits\EnumTrait;

enum Status: int
{
    use EnumTrait;

    case Assigned = 31101;
    case Revoked = 31102;
}
