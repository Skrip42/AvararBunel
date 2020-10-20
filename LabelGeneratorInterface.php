<?php
namespace Skrip42\Bundle\AvatarBundle;

use Skrip42\Bundle\AvatarBundle\UserInterface;

interface LabelGeneratorInterface
{
    public function getLabelFromUser(UserInterface $user) : string;
}
