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

    public function save(Post $post)
    {
        $data = [
            'title' => $post->title,
            'content' => $post->content
        ];
        $id = (int) $post->id;
        if ($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }
        if (!$this->find($id)) {
            throw new RuntimeException(sprintf(
                    'Não foi possível recuperar a linha %d', $id
            ));
        }
        $this->tableGateway->update($data, ['id' => $id]);
    }

    public function find($id)
    {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(['id' => $id]);
        $row = $rowset->current();
        if (!$row) {
            throw new RuntimeException(sprintf(
                    'Could not retrieve the row %d', $id
            ));
        }
        return $row;
    }

    public function delete($id)
    {
        $this->tableGateway->delete(['id' => (int) $id]);
    }

}
