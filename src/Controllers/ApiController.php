<?php

namespace App\Controllers;

use App\Models\ServiceModel;


class ApiController
{
    public function filter()
    {
        $serviceModel = new ServiceModel();
        $dataForRequest = [];
        foreach ($_GET as $key => $value) {
            if ($value != 'Tous' && $value != 'Toutes') {
                $dataForRequest[$key] = $value;
            }
        }

        if (count($dataForRequest) === 0) {
            $requestResult = $serviceModel->findAll();
        } else {
            $requestResult = $serviceModel->findBy($dataForRequest);
        }

        $worksiteAndServiceValues = [];

        foreach ($requestResult as $item) {
            $item['months_list'] = unserialize($item['months_list']);
            $worksiteAndServiceValues[] = $item;
        }
        echo json_encode($worksiteAndServiceValues);
    }
}
