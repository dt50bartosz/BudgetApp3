<?php

namespace App\Middleware;

use Framework\Contracts\MiddlewareInterface;

class GuestOnlyMiddleware implements  MiddlewareInterface {

    public function process(callable $next)
    {
      if (!empty($_SESSION['user'])) {
       redirectTo('/index');        
    }
      $next();

    }
  }

