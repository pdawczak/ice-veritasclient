<?php

namespace Ice\VeritasClientBundle\Service;

use Guzzle\Service\Client;
use Doctrine\Common\Collections\ArrayCollection;

class VeritasClient
{
    /**
     * @var VeritasRestClient
     */
    private $restClient;

    /**
     * @param \Ice\VeritasClientBundle\Service\VeritasRestClient $restClient
     * @return VeritasClient
     */
    public function setRestClient($restClient)
    {
        $this->restClient = $restClient;
        return $this;
    }

    /**
     * @return \Ice\VeritasClientBundle\Service\VeritasRestClient
     */
    public function getRestClient()
    {
        return $this->restClient;
    }

    /**
     * @param int $id
     * @return \Ice\VeritasClientBundle\Entity\Order
     */
    public function findOrderById($id){
        return $this->getRestClient()->getCommand('GetOrder', array('id'=>$id))->execute();
    }

    /**
     * @param int $id
     * @return \Ice\VeritasClientBundle\Entity\Order[]|ArrayCollection
     */
    public function findAllOrders(){
        return $this->getRestClient()->getCommand('GetOrders')->execute();
    }


    /**
     * @param int $id
     * @return \Ice\VeritasClientBundle\Entity\SuborderGroup
     */
    public function findSuborderGroupById($id){
        return $this->getRestClient()->getCommand('GetSuborderGroup', array('id'=>$id))->execute();
    }

    /**
     * @param string $id
     * @return \Ice\CtmsClientBundle\Response\Course
     */
    public function getCourse($id)
    {
        $course = $this->getRestClient()->getCommand('GetCourse', array(
            'id' => $id,
        ))->execute();

        return $course;
    }
}