<?php

namespace Ice\VeritasClientBundle\EventListener;

use Doctrine\Bundle\DoctrineBundle\Registry;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\OnFlushEventArgs;
use Doctrine\ORM\UnitOfWork;
use Ice\MinervaBundle\Entity\AcademicInformation;
use Ice\MinervaClientBundle\Entity\BookingItemSummary;
use Ice\VeritasClientBundle\Service\VeritasClient;
use Doctrine\ORM\Events;

class AcademicInformationSubscriber implements EventSubscriber
{
    /**
     * @var \Ice\VeritasClientBundle\Service\VeritasClient
     */
    private $veritas;

    /**
     * @var Registry
     */
    private $doctrine;

    public function getSubscribedEvents()
    {
        return array(
            Events::onFlush,
        );
    }

    public function __construct(VeritasClient $veritas, Registry $doctrine)
    {
        $this->veritas = $veritas;
        $this->doctrine = $doctrine;
    }

    public function onFlush(OnFlushEventArgs $args)
    {
        $em = $args->getEntityManager();
        $uow = $em->getUnitOfWork();

        foreach ($uow->getScheduledEntityInsertions() as $entity) {
            if ($entity instanceof AcademicInformation) {
                $this->updateCourseStatusInVeritas($entity);
            }
        }

        foreach ($uow->getScheduledEntityUpdates() as $entity) {
            if ($entity instanceof AcademicInformation) {
                $this->updateCourseStatusInVeritas($entity);
            }
        }
    }

    /**
     * Sets the status of a Veritas course to full or current based on capacity and allocations
     *
     * @param \Ice\MinervaBundle\Entity\AcademicInformation $info
     */
    private function updateCourseStatusInVeritas(AcademicInformation $info)
    {
        $em = $this->doctrine->getManager();
        $courseId = $info->getCourseId();
        $course = $this->veritas->getCourse($courseId);
        $capacity = $course->getCapacity();
        $tuitionCode = sprintf("TUITION-%d", $courseId);
        /** @var BookingItemSummary $summary */
        $summary = $em->getRepository('IceMinervaBundle:BookingItem')->getSummary($tuitionCode);

        if ($capacity >= $summary['allocated']) {
            $this->veritas->setCourseCurrent($courseId);
        } else {
            $this->veritas->setCourseFull($courseId);
        }
    }
}
