<?php
namespace Skrip42\Bundle\AvatarBundle;

use Skrip42\Bundle\AvatarBundle\ColorGeneratorInterface;
use Skrip42\Bundle\AvatarBundle\UserInterface;
use Skrip42\Color\HSLColor;

class ColorGenerator implements ColorGeneratorInterface
{
    private $saturation = 1;
    private $lightness = 0.65;
    private $algo = 'adler32';

    public function __construct(float $saturation, float $lightness, string $algo)
    {
        $this->saturation = $saturation;
        $this->lightness = $lightness;
        $this->algo = $algo;
    }

    public function getColorFromUser(UserInterface $user) : string
    {
        $hue = hexdec(hash($this->algo, $user->getUsername())) % 360;
        $color = new HSLColor($hue, $this->saturation, $this->lightness);
        return (string) $color->toHex();
    }
}
