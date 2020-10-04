<?php

declare(strict_types=1);

namespace App\Counter;

interface ViewCounterHandler
{
    public function isCountable(ViewCountable $entity): bool;
}