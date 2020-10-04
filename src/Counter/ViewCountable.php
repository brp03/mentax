<?php

declare(strict_types=1);

namespace App\Counter;

interface ViewCountable
{
    public function getId();

    public function incrementViews();
}