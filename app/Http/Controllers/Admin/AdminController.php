<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\File;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AdminController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        \View::share('modulos', $this->getModules());

        if (app('request')->route()) {
			$routeArray = app('request')->route()->getAction();
			$controllerAction = class_basename($routeArray['controller']);
			list($current_controller, $action) = explode('@', $controllerAction);
			
			\View::share('current_controller', $current_controller);
		}
    }

    public function getModules()
    {
        $modules_names = [];
        $modules = File::files(app_path('/Http/Controllers/Admin'));

        $modules_names[] = array('DashboardController' => 'Dashboard');

        foreach ($modules as $module) {
            if (str_replace('Controller', '', pathinfo($module)['filename']) !== 'Admin' && str_replace('Controller', '', pathinfo($module)['filename']) !== 'Dashboard') {
                $modules_names[] = array(pathinfo($module)['filename'] => str_plural(str_replace('Controller', '', pathinfo($module)['filename'])));
            }
        }

        return $modules_names ? $modules_names : null;
    }

    public function make_wyswyg($field)
    {
        $dom = new \DomDocument();
        $dom->loadHTML(mb_convert_encoding($field, 'HTML-ENTITIES', 'UTF-8'));

        $images = $dom->getElementsByTagName('img');
        
        if (count($images) > 0) {
            foreach ($images as $k => $img) {
                $data = $img->getAttribute('src');
                if (isset(explode(';', $data)[0]) && isset(explode(';', $data)[1])) {
                    list($type, $data) = explode(';', $data);
                    list(, $data) = explode(',', $data);
                    $data = base64_decode($data);
                    $image_name= "/upload/" . time().$k.'.png';
                    $path = public_path() . $image_name;
                    file_put_contents($path, $data);
                    $img->removeAttribute('src');
                    $img->setAttribute('src', $image_name);
                }
            }
        }

        $field = $dom->saveHTML($dom->documentElement);
        $field = str_replace(['<html><body>', '</body></html>'], '', $field);

        return $field;
    }
}
