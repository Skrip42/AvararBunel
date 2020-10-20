<?php

namespace Skrip42\Bundle\AvatarBundle\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;
use Skrip42\Bundle\AvatarBundle\UserInterface;
use Skrip42\Bundle\AvatarBundle\AvatarGeneratorInterface;
use Twig\Environment;

class AvatarExtension extends AbstractExtension
{
    private $twig;
    private $avatarGenerator;

    private $baseTemplate = '@Avatar/baseAvatar.html.twig';
    private $base64Template = '@Avatar/base64Avatar.html.twig';
    private $imageTemplate = '@Avatar/imageAvatar.html.twig';

    public function __construct(
        Environment $twig,
        AvatarGeneratorInterface $avatarGenerator
    ) {
        $this->twig = $twig;
        $this->avatarGenerator = $avatarGenerator;
    }

    public function getFunctions()
    {
        return [
            new TwigFunction(
                'skrip42_avatar',
                [$this, 'getAvatar'],
                ['is_safe' => ['all']]
            )
        ];
    }

    public function getAvatar(UserInterface $user)
    {
        $avatar = $user->getAvatar();
        if (empty($avatar)) {
            return $this->avatarGenerator->getAvatar($user);
        }
        if (preg_match('~\.(jpg|jpeg|png)$~', $avatar)) {
            $template = $this->imageTemplate;
        } else {
            $template = $this->base64Template;
        }
        return $this->twig->render(
            $template,
            [
                'avatar' => $avatar,
                'base'   => $this->baseTemplate
            ]
        );
    }
}
