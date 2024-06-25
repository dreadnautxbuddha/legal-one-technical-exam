<?php

namespace Dreadnaut\LogAnalyticsBundle\Service\LogFileImporter;

use Doctrine\ORM\EntityManagerInterface;
use Dreadnaut\LogAnalyticsBundle\Entity;
use Dreadnaut\LogAnalyticsBundle\EntityDto;

use function is_null;

/**
 * Responsible for importing {@see EntityDto\LogEntry\LogEntry} objects as
 * {@see \Dreadnaut\LogAnalyticsBundle\Entity\LogEntry\LogEntry} objects
 *
 * @package Dreadnaut\LogAnalyticsBundle\Service\LogFileImporter
 *
 * @author  Peter Cortez <innov.petercortez@gmail.com>
 */
class LogEntryDtoImporter
{
    public function __construct(
        protected EntityManagerInterface $entityManager,
        protected Entity\Support\Contracts\EntityAssemblerInterface $assembler
    )
    {
    }

    /**
     * Receives an array of {@see LogEntryDto} data transfer objects and saves them as
     * {@see \Dreadnaut\LogAnalyticsBundle\Entity\LogEntry\LogEntry}
     * objects
     *
     * @param array<EntityDto\LogEntry\LogEntry> $log_entry_dtos
     *
     * @return void
     */
    public function import(array $log_entry_dtos): void
    {
        foreach ($log_entry_dtos as $log_entry_dto) {
            $log_entry = $this->assembler->assemble($log_entry_dto);

            if (is_null($log_entry)) {
                continue;
            }

            $this->entityManager->persist($log_entry);
        }

        $this->entityManager->flush();
        $this->entityManager->clear();
    }
}
