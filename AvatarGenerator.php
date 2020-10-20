<?php
namespace Skrip42\Bundle\AvatarBundle;

use Skrip42\Bundle\AvatarBundle\AvatarGeneratorInterface;
use Skrip42\Bundle\AvatarBundle\LabelGeneratorInterface;
use Skrip42\Bundle\AvatarBundle\ColorGeneratorInterface;
use Skrip42\Bundle\AvatarBundle\UserInterface;
use Twig\Environment;

class AvatarGenerator implements AvatarGeneratorInterface
{
    private $saturation = 1;
    private $lightness = 0.65;
    private $algo = 'adler32';

    public function __construct(
        Environment $twig,
        ColorGeneratorInterface $colorGenerator,
        LabelGeneratorInterface $labelGenerator
    ) {
        $this->twig = $twig;
        $this->colorGenerator = $colorGenerator;
        $this->labelGenerator = $labelGenerator;
    }

    public function getAvatar(UserInterface $user) : string
    {
        $color = $this->colorGenerator->getColorFromUser($user);
        $label = $this->labelGenerator->getLabelFromUser($user);
        $html  = $this->twig->render('@Avatar/generatedAvatar.svg.twig', [
            'color' => $color,
            'label' => $label
        ]);
        return $html;
    }
}
