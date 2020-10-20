<?php
namespace Skrip42\Bundle\AvatarBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\PassConfig;
use Skrip42\Bundle\AvatarBundle\DependencyInjection\AvatarExtension;

class AvatarBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
    }

    public function getContainerExtension()
    {
        return new AvatarExtension();
    }
}
