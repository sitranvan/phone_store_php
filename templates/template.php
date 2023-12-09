<?php

function templateController($controllerClass)
{
    return  '<?php

use App\Core\Controller;
                            
class ' . $controllerClass . ' extends Controller
{
    private $data = [];
    public function __construct()
    {
    }
    public function index()
    {
        $this->data["title"] = "title_name";
        $this->data["view"] = $this->view("_ADMIN|_CLIENTS", "path_view");
        return $this->layout("layout_name", $this->data);
    }
}';
}

function templateModel($modelClass)
{
    return '<?php

namespace App\Model;
    
use App\Core\Model;
    
class ' . $modelClass . ' extends Model
{
    private $table = "table_name";
}';
}

function templateMiddleware($middlewareClass)
{
    return '<?php

namespace App\Middlewares;
    
use App\Core\Middlewares;
    
class ' . $middlewareClass . ' extends Middlewares
{
    public function handle()
    {
    }
}';
}

function templateProvider($providerClass)
{
    return '<?php

namespace App\Providers;
    
use App\Core\ServiceProvider;
    
class ' . $providerClass . ' extends ServiceProvider
{
    public function boot()
    {
    }
}';
}
