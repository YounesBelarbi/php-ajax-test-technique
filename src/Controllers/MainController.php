<?php

namespace App\Controllers;

use App\Models\ServiceModel;
use App\Models\WorksiteModel;

class MainController
{

    public function index()
    {
        $serviceModel = new ServiceModel();
        $worksiteModel = new WorksiteModel();


        $worksiteAndServiceValues = [];
        foreach ($serviceModel->findAll() as $item) {
            $item['months_list'] = unserialize($item['months_list']);
            $item['idList']['service_id'] = $item['serviceId'];
            $item['idList']['worksite_id'] = $item['worksiteId'];
            $item['idList']['months_id'] = $item['monthListId'];

            unset($item['serviceId']);
            unset($item['worksiteId']);
            unset($item['monthListId']);

            $worksiteAndServiceValues[] = $item;
        }

        $allServiceExist = $serviceModel->find();
        $allWorksiteExist = $worksiteModel->find();

        $this->render('home', [
            'worksiteAndServiceValues' => $worksiteAndServiceValues,
            'allServiceExist' => $allServiceExist,
            'allWorksiteExist' => $allWorksiteExist
        ]);
    }

    public function render($viewName, $parameters = [])
    {
        require('src/Views/' . $viewName . '.tpl.php');
    }
}
