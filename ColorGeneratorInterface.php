<?php
namespace Skrip42\Bundle\AvatarBundle;

use Skrip42\Bundle\AvatarBundle\UserInterface;

interface ColorGeneratorInterface
{
    /**
     * @param UserInterface $user
     *
     * @return string of rgb-hex color like #A5B7C9
     */
    public function getColorFromUser(UserInterface $user) : string;
}
