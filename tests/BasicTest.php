<?php
namespace FuriosoJack\LinkedCallbacks\Tests;
use FuriosoJack\LinkedCallbacks\ListDoubleCallbacks;

/**
 * Class BasciTest
 * @package FuriosoJack\LinkedCallbacks\Tests
 * @author Juan Diaz - FuriosoJack <iam@furiosojack.com>
 */
class BasicTest extends TestCase
{

    public function testCreate()
    {
        $listCallbacks = new ListDoubleCallbacks();

        $listCallbacks->insertFirst(function($node){
            echo "hola primer mundo";
        },10);

        $listCallbacks->insertFirst(function($node){
            echo "hola nuevo primer mundo";
        },20);

        $this->assertTrue(10 == $listCallbacks->getLastNode()->getKey());


        $message = "mensaje a cifrar";
        $listCallbacks->insertFirst(function($node) use($message){
            return base64_encode($message . $node->getKey());
        },50);

        $this->assertTrue(base64_encode($message."50") == $listCallbacks->getFirstNode()->run());

        //Eliminacion de nodo
        $listCallbacks->deleteFirst();
        $this->assertTrue(20 == $listCallbacks->getFirstNode()->getKey());





    }

}