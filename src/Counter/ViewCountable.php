<?php

declare(strict_types=1);

namespace App\Counter;

interface ViewCountable
{
    /**
     * Get entity identifier
     * @return mixed
     */
    public function getId();

    /**
     * Increases the number of views
     * @return mixed
     */
    public function incrementViews(): void;
}