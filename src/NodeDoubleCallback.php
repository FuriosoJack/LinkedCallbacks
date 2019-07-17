<?php


namespace FuriosoJack\LinkedCallbacks;

/**
 * Class NodeDoubleCallback
 * @package FuriosoJack\LinkedCallbacks
 * @author Juan Diaz - FuriosoJack <iam@furiosojack.com>
 */
class NodeDoubleCallback
{

    /**
     * @var callable
     */
    private $callbackJob;

    /**
     * @var
     */
    private $nodeNext;

    /**
     * @var
     */
    private $nodePrevius;

    /**
     * Cualquie valor que se le quiera asignar al nodo por el cual se va a buscar
     * @var
     */
    private $key;


    /**
     * NodeSubJobBase constructor.
     * @param $callbackJob
     * @param $nodeNext
     * @param $nodePrevius
     */
    public function __construct($callbackJob,$key)
    {
        if(!is_callable($callbackJob)){
            throw new \Exception("El callbackJob especificado no valida");
        }
        $this->callbackJob = $callbackJob;

        $this->key = $key;
    }

    /**
     * Se encarga de correr la tarea
     */
    public function run()
    {
        return call_user_func($this->callbackJob,$this);
    }

    /**
     * @param mixed $nodeNext
     */
    public function setNodeNext($nodeNext)
    {
        $this->nodeNext = $nodeNext;
    }

    /**
     * @param mixed $nodePrevius
     */
    public function setNodePrevius($nodePrevius)
    {
        $this->nodePrevius = $nodePrevius;
    }

    /**
     * @return mixed
     */
    public function getNodeNext()
    {
        return $this->nodeNext;
    }

    /**
     * @return mixed
     */
    public function getNodePrevius()
    {
        return $this->nodePrevius;
    }

    /**
     * @return callable
     */
    public function getCallbackJob(): callable
    {
        return $this->callbackJob;
    }

    /**
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }



}