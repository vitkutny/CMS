<?php

namespace CMS\Model;

use LeanMapper\Repository;

abstract class BaseRepositoryLM extends Repository {

    public function __construct(\DibiConnection $connection) {
        parent::__construct($connection);
        $this->defaultEntityNamespace = "CMS\Model\Entity";
    }

    public function find($id) {
        $row = $this->connection->select('*')
                ->from($this->getTable())
                ->where('id = %i', $id)
                ->fetch();

        if ($row === false) {
            throw new \Exception('Entity was not found.');
        }
        return $this->createEntity($row);
    }

    public function findAll() {
        return $this->createEntities(
                        $this->connection->select('*')
                                ->from($this->getTable())
                                ->fetchAll()
        );
    }

}