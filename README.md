# cachelayer-bundle
avatar generator for symfony

## install:
- run `composer require skrip42/avatar-bundle`

## base usage:
implement Skrip42\Bundle\AvatarBundle\UserInterface in you User Class:
```php
....
use Symfony\Component\Security\Core\User\UserInterface;
use Skrip42\Bundle\AvatarBundle\UserInterface as AvataredUserInterface;

class User implements UserInterface, AvataredUserInterface
{
    public function getUsername() : string
    {
        ...
    }
    public function getLastName() : ?string
    {
        ...
    }
    public function getFirstName() : ?string
    {
        ...
    }
    public function getPatronymicName() : ?string
    {
        ...
    }
    public function getAvatar() : ?string
    {
        ...
    }
    .....
}
```

call skrip42_avatar(user) function in twig template:
```twig
    ....
    {{ skrip42_avatar(app.user) }}
    ....
```

## configuration:
create config/packages/avatar.yaml file
```yaml
avatar:
  color_generator:
    saturation: 0.9 #saturation of generated avatar
    lightness: 0.7  #lightness of generated avatar
    algo: 'fnv132'  #hash alogorithm for avatar generation
```


## customizing:
### customize base templates
```twig
    {# create new file: templates/bundles/AvatarBundle/avatar.html.twig#}
    {% block avatar %}
        ...
        <img src = "{% block avatar_src %}{% endblock %}" ... ">
        ...
    {% endblock %}
```
### customize generated avatar templates
```twig
    {# create new file: templates/bundles/AvatarBundle/generatedAvatar.svg.twig#}
    ......
    {# use 'color' and 'label' variable to generate avatar image #}
```

### custom avatar generation
create custom avatar generator
```php
namespace App\Utils;

use Skrip42\Bundle\AvatarBundle\AvatarGeneratorInterface;
use Skrip42\Bundle\AvatarBundle\UserInterface;

class AvatarGenerator implements AvatarGeneratorInterface
{
    public function getAvatar(UserInterface $user) : string
    {
        ....
    }
}
```
and redeclare AvatarGenerator class
```yaml
    Skrip42\Bundle\AvatarBundle\AvatarGeneratorInterface: 'App\Utils\AvatarGenerator'
```
