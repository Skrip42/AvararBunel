<?php
namespace Skrip42\Bundle\AvatarBundle;

use Skrip42\Bundle\AvatarBundle\UserInterface;

class LabelGenerator implements LabelGeneratorInterface
{
    public function getLabelFromUser(UserInterface $user) : string
    {
        $string = '';
        $string = mb_substr($user->getLastName(), 0, 1) . '.'
            . mb_substr($user->getFirstName(), 0, 1) . '.';
        return mb_strtoupper($string);
    }
}
