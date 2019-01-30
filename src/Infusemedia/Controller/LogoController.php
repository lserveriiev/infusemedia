<?php

namespace Infusemedia\Controller;

class LogoController
{
    public function showLogo(): void
    {
        header('Content-type: image/png');
        readfile(ROOT_DIR . 'web/assets/img/infusemedia.png');
    }
}
