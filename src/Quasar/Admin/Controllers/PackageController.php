<?php namespace Quasar\Admin\Controllers;

use Quasar\Core\Controllers\CoreController;
use Quasar\Admin\Services\PackageService;
use Quasar\Admin\Models\Package;

class PackageController extends CoreController
{
    public function __construct(Package $model, PackageService $service)
    {
        $this->model = $model;
        $this->service = $service;
    }
}
