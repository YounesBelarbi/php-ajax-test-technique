<?php

namespace App\Models;

use PDO;

use Exception;
use App\Models\Db;


class DbModel extends Db
{
    protected $table;

    private $db;

    public function sqlRequest(string $sql, array $attributs = null)
    {
        $this->db = Db::getInstance();

        $query = $this->db->prepare($sql);
        $query->execute($attributs);
        return $query;
    }

    public function findAll()
    {
        $query = $this->sqlRequest(
            'SELECT service.name as serviceName, service.id as serviceId, worksite.name as worksiteName, worksite.id as worksiteId, month_values.months_list,  month_values.id as monthListId
            FROM `service` INNER JOIN `service_worksite_months` ON `service`.id=service_id
            INNER JOIN `worksite` ON worksite_id=`worksite`.id 
            INNER JOIN `month_values` ON months_id=`month_values`.id'
        );
        return $query->fetchAll();
    }

    public function find()
    {
        $query = $this->sqlRequest("SELECT * FROM " . $this->table);
        return $query->fetchAll(PDO::FETCH_KEY_PAIR);
    }
}
