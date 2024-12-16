<?php 

declare(strict_types=1);

use Framework\{TemplateEngine, Database, Container};
use App\Config\Paths;
use App\Services\{ ValidatorService, UserService, ExpensiveService, IncomeService,SettingService};

return [
    
    TemplateEngine::class => fn() => new TemplateEngine(Paths::VIEW),

    ValidatorService::class => fn() => new ValidatorService(),

  
    Database::class => fn() => new Database($_ENV['DB_DRIVER'], [
        'host' => $_ENV['DB_HOST'],
        'post' => $_ENV['DB_PORT'],
        'dbname' => $_ENV['DB_NAME']
    ], $_ENV['DB_USER'], $_ENV['DB_PASS']),

    
    UserService::class => function (Container $container) {
        $db = $container->get(Database::class);

        return new UserService($db);
    },

    SettingService::class => function (Container $container) {
        $db = $container->get(Database::class);


        return new SettingService($db);
    },

  
    ExpensiveService::class => function (Container $container) {
        $db = $container->get(Database::class);

        return new ExpensiveService($db);
    },

  
    IncomeService::class => function (Container $container) {
        $db = $container->get(Database::class);

        return new IncomeService($db);
    },



 

];
