<?php
namespace Skrip42\Bundle\AvatarBundle;

use Skrip42\Bundle\AvatarBundle\UserInterface;

interface AvatarGeneratorInterface
{
    /**
     * @param UserInterface $user
     *
     * @return string html of avatar
     */
    public function getAvatar(UserInterface $user) : string;
}
