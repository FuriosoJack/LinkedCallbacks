<?php


namespace FuriosoJack\LinkedCallbacks;

/**
 * Class ListDoubleCallbacks
 * @package FuriosoJack\LinkedCallbacks
 * @author Juan Diaz - FuriosoJack <iam@furiosojack.com>
 */
class ListDoubleCallbacks
{

    /**
     * @var
     */
    private $firstNode;

    /**
     * @var
     */
    private $lastNode;

    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getFirstNode(): NodeDoubleCallback
    {
        return $this->firstNode;
    }

    /**
     * @return mixed
     */
    public function getLastNode(): NodeDoubleCallback
    {
        return $this->lastNode;
    }

    /**
     * Revisa si esta vacia la lista
     * @return bool
     */
    private function isEmpty(){
        return $this->firstNode == null && $this->lastNode==null;
    }

    /**
     * Inserta un nuevo al inicio de la lista
     * @param $callBackJob
     */
    public function insertFirst($callBackJob, $key)
    {
        $newNode = new NodeDoubleCallback($callBackJob,$key);

        if($this->isEmpty()){
            $this->firstNode = $newNode;
            $this->lastNode = $newNode;
        }else{
            //Se le asinga el nuevo nodo como siguiente el primer nodo
            $newNode->setNodeNext($this->firstNode);
            //Se asigna el actual primer nodo como anterior el nodo nuevo
            $this->firstNode->setNodePrevius($newNode);
        }

        $this->firstNode = $newNode;
    }

    /**
     * Añade un nuevo nodo al final
     * @param $callBackJob
     */
    public function insertLast($callBackJob,$key)
    {
        $newNode = new NodeDoubleCallback($callBackJob,$key);

        if($this->isEmpty()){
            $this->lastNode = $newNode;
            $this->firstNode = $newNode;
        }else{
            //Se le asigna el nuevo nodo como previo el nodo final
            $newNode->setNodePrevius($this->lastNode);
            $this->lastNode->setNodeNext($newNode);
        }

        $this->lastNode = $newNode;

    }


    /**
     * Elimina el primer nodo de la lista y devuelve el key del nodo eliminado
     * @return mixed|null
     */
    public function deleteFirst()
    {
        $keyDeleted = null;
        if(!$this->isEmpty() || $this->firstNode != null){
            $keyDeleted = $this->getFirstNode()->getKey();
            if($this->firstNode == $this->lastNode){
                $this->firstNode = $this->lastNode = null;
            }else{
                $this->firstNode = $this->firstNode->getNodeNext();
                $this->firstNode->setNodePrevius(null);
            }
        }
        return $keyDeleted;
    }


    /**
     * Elimina el ultimo nodo de la lista y devuelve el key
     * @return mixed|null
     */
    public function deleteLast()
    {
        $keyDeleted = null;
        if(!$this->isEmpty() || $this->lastNode != null){
            $keyDeleted = $this->getFirstNode()->getKey();
            if($this->firstNode == $this->lastNode){
                $this->lastNode = $this->firstNode = null;
            }else{
                $this->lastNode = $this->lastNode->getNodePrevius();
                $this->lastNode->setNodeNext(null);
            }
        }
        return $keyDeleted;
    }

    /**
     * Devuelve el tamaño de la lista
     * @return int
     */
    public function size()
    {
        $count = 0;
        for($x = $this->firstNode; $x != null; $x = $x->getNodeNext()){
            $count++;
        }
        return $count;
    }

    /**
     * Busca por el key si lo encuentra devuelve el nodo en caso contrario devuelve null
     * @param $key
     * @return null
     */
    public function find($key)
    {
        for($x = $this->firstNode; $x != null; $x = $x->getNodeNext()){
            if($x->getKey() == $key){
                return $x;
            }
        }

        return null;
    }


}