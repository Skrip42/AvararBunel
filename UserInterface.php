<?php
namespace Skrip42\Bundle\AvatarBundle;

interface UserInterface
{
    public function getUsername() : string;
    public function getLastName() : ?string;
    public function getFirstName() : ?string;
    public function getPatronymicName() : ?string;
    public function getAvatar() : ?string;
}
