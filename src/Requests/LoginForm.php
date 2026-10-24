<?php

namespace Bakery\Requests;

use Io\Attributes\{Email, NotBlank};
use Io\FromArray;

final class LoginForm
{
    use FromArray;

    #[NotBlank]
    #[Email]
    public string $email = '';

    #[NotBlank]
    public string $password = '';
}
