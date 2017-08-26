<?php

namespace Skel\Service;

use Symfony\Component\HttpFoundation\Session\Session;

class FlashService
{
    const TYPE_SUCCESS = 'success';
    const TYPE_INFO = 'info';
    const TYPE_WARNING = 'warning';
    const TYPE_DANGER = 'danger';

    /**
     * @var Session
     */
    private $session;

    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    public function add(string $type, string $message)
    {
        $this->session->getFlashBag()->add($type, $message);
    }
}
