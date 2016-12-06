<?php

/**
 * Essa classe representa a tabela do banco de dados;
 * 
 * $tableGateway => conversa com a tabela em formato de objeto;
 * 
 */

namespace Blog\Model;

use Zend\Db\TableGateway\Exception\RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class PostTable
{

    private $tableGateway;

    /**
     * TableGatewayInterface => Ajuda na conexão com banco de dados
     * e retorna o resultado;
     * @param TableGatewayInterface $tableGateway
     */
    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        return $this->tableGateway->select();
    }

}
