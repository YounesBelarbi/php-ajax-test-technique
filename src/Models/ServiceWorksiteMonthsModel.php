<?php

namespace App\Models;


class ServiceWorksiteMonthsModel extends DbModel
{
    protected $service_id;
    protected $worksite_id;
    protected $months_id;

    public function __construct()
    {
        $this->table = 'service_worksite_months';
    }



    /**
     * Get the value of service_id
     */
    public function getService_id()
    {
        return $this->service_id;
    }

    /**
     * Set the value of service_id
     *
     * @return  self
     */
    public function setService_id($service_id)
    {
        $this->service_id = $service_id;

        return $this;
    }

    /**
     * Get the value of worksite_id
     */
    public function getWorksite_id()
    {
        return $this->worksite_id;
    }

    /**
     * Set the value of worksite_id
     *
     * @return  self
     */
    public function setWorksite_id($worksite_id)
    {
        $this->worksite_id = $worksite_id;

        return $this;
    }

    /**
     * Get the value of months_id
     */
    public function getMonths_id()
    {
        return $this->months_id;
    }

    /**
     * Set the value of months_id
     *
     * @return  self
     */
    public function setMonths_id($months_id)
    {
        $this->months_id = $months_id;

        return $this;
    }
}
