<?php

namespace App\Controllers;

use App\Models\ServiceModel;

class MainController
{

    public function index()
    {
        $serviceModel = new ServiceModel();

        $dataFromDb = [];
        foreach ($serviceModel->findAll() as $item) {
            $item['months_list'] = unserialize($item['months_list']);
            $item['idList']['service_id'] = $item['serviceId'];
            $item['idList']['worksite_id'] = $item['worksiteId'];
            $item['idList']['months_id'] = $item['monthListId'];

            unset($item['serviceId']);
            unset($item['worksiteId']);
            unset($item['monthListId']);

            $dataFromDb[] = $item;
        }
        $this->render('home', ['dataFromDb' => $dataFromDb]);
    }

    public function render($viewName, $parameters = [])
    {
        require('src/Views/' . $viewName . '.tpl.php');
    }
}
