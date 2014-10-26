<?php namespace Anomaly\Streams\Addon\Module\Users\Login\Command;

use Anomaly\Streams\Platform\Traits\EventableTrait;
use Anomaly\Streams\Platform\Traits\DispatchableTrait;
use Anomaly\Streams\Addon\Module\Users\User\UserSession;
use Anomaly\Streams\Addon\Module\Users\User\Event\UserWasLoggedInEvent;

class LoginUserCommandHandler
{
    use EventableTrait;
    use DispatchableTrait;

    protected $session;

    function __construct(UserSession $session)
    {
        $this->session = $session;
    }

    public function handle(LoginUserCommand $command)
    {
        $userId = $command->getUserId();

        $this->session->login($userId);

        $this->raise(new UserWasLoggedInEvent($userId));

        $this->dispatchEventsFor($this);
    }
}
 