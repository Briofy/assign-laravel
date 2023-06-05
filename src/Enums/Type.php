<?php

namespace Briofy\Assign\Enums;

use Briofy\RepositoryLaravel\Traits\EnumTrait;

enum Type: int
{
    use EnumTrait;

    case FullOwner = 31001;
    case Owner = 31002;
    case Read = 31003;
    case Write = 31004;
    case Create = 31005;
    case Destroy = 31006;
}
