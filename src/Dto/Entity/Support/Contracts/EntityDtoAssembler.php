<?php

namespace App\Dto\Entity\Support\Contracts;

/**
 * An assembler is responsible for transforming input from various data sources into data transfer objects.
 *
 * @package App\Dto\Entity\Interface
 *
 * @author  Peter Cortez <innov.petercortez@gmail.com>
 */
interface EntityDtoAssembler
{
    /**
     * Creates an {@see EntityDto} object out of the data supplied to the assembler. If one cannot be made, due to,
     * let's say data constraint errors, `null` will be returned.
     *
     * @return EntityDto|null
     */
    public function assemble(): ?EntityDto;
}