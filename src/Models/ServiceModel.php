<?php

namespace App\Models;

use App\Models\DbModel;

/**
 * Modèle pour la table "annonces"
 */
class ServiceModel extends DbModel
{
    protected $name;
    protected $id;

    public function __construct()
    {
        $this->table = 'service';
    }
    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}
