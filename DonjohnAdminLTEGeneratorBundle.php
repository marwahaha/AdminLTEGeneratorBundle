<?php

/* 
 *
 * (c) Alejandro Steinmetz <asteinmetz78@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Donjohn\AdminLTEGeneratorBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class DonjohnAdminLTEGeneratorBundle extends Bundle
{
    public function getParent()
    {
        return 'SensioGeneratorBundle';
    }
}
