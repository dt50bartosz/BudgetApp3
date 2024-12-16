<?php

declare(strict_types=1);

namespace App\Middleware;

use Framework\Contracts\MiddlewareInterface;

class CsrfGuardMiddleware implements MiddlewareInterface
{
  public function process(callable $next)
  {
      $requestMethod = strtoupper($_SERVER['REQUEST_METHOD']);
      $validMethods = ['POST', 'PATCH', 'DELETE'];
  
      if (!in_array($requestMethod, $validMethods)) {
          $next();
          return;
      }
  
      if (empty($_SESSION['token']) || empty($_POST['token']) || $_SESSION['token'] !== $_POST['token']) {
          http_response_code(403); 
          echo json_encode(['status' => 'error', 'message' => 'CSRF token validation failed.']);
          exit;
      }
  
      unset($_SESSION['token']); 
      $next();
  }
  
}