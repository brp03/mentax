<?php

declare(strict_types=1);

namespace App\Counter;

use Doctrine\ORM\EntityManagerInterface;

class ViewCounter
{
    private $handler;
    private $em;

    public function __construct(ViewCounterHandler $handler, EntityManagerInterface $em)
    {
        $this->handler = $handler;
        $this->em = $em;
    }

    public function count(ViewCountable $entity)
    {
        if ($this->handler->isCountable($entity)) {
            $entity->incrementViews();
            $this->em->persist($entity);
            $this->em->flush();
        }
    }
}