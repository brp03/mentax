<?php

declare(strict_types=1);

namespace App\Counter;

use Symfony\Component\HttpFoundation\Session\SessionInterface;

class SessionViewCounterHandler implements ViewCounterHandler
{
    private $session;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    public function isCountable(ViewCountable $entity): bool
    {
        $counters = $this->session->get('counters', []);
        $class = get_class($entity);

        if(!empty($counters[$class]) && in_array($entity->getId(), $counters[$class])) {
            return false;
        }

        $counters[$class][] = $entity->getId();
        $this->session->set('counters', $counters);

        return true;

    }
}