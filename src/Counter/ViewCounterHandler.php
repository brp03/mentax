<?php

declare(strict_types=1);

namespace App\Counter;

interface ViewCounterHandler
{
    /**
     * Checks that the entry has already been viewed
     * @param ViewCountable $entity
     * @return bool
     */
    public function isViewed(ViewCountable $entity): bool;

    /**
     * Sets a view for an entity
     * @param ViewCountable $entity
     */
    public function setViewed(ViewCountable $entity): void;
}