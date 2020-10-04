<?php

declare(strict_types=1);

namespace App\Counter;

use Symfony\Component\HttpFoundation\Session\SessionInterface;

class SessionViewCounterHandler implements ViewCounterHandler
{
    /**
     * Session name
     */
    const COUNTER_KEY = 'counters';

    private $session;
    /**
     * @var array
     */
    private $counters;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
        $this->counters = $this->session->get(self::COUNTER_KEY, []);
    }

    public function isViewed(ViewCountable $entity): bool
    {
        $class = get_class($entity);

        if(!empty($this->counters[$class]) && in_array($entity->getId(), $this->counters[$class])) {
            return false;
        }

        return true;
    }

    public function setViewed(ViewCountable $entity): void
    {
        $class = get_class($entity);

        $this->counters[$class][] = $entity->getId();

        $this->session->set(self::COUNTER_KEY, $this->counters);
    }
}