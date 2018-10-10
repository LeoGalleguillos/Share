<?php
namespace LeoGalleguillos\Share\Model\Service;

use LeoGalleguillos\Entity\Model\Entity as EntityEntity;
use LeoGalleguillos\Share\Model\Entity as ShareEntity;
use LeoGalleguillos\Share\Model\Table as ShareTable;

class Increment
{
    public function __construct(
        ShareTable\Share $shareTable
    ) {
        $this->shareTable = $shareTable;
    }

    public function increment(
        EntityEntity\EntityType $entityTypeEntity,
        int $typeId,
        ShareEntity\Type $shareTypeEntity
    ) {
        if ($shareTypeEntitya instanceof ShareEntity\Type\Facebook) {
            return $this->shareTable->insertFaceboookOnDuplicateKeyUpdate(
                null,
                $entityTypeEntity->getEntityTypeId(),
                $typeId
            );
        } elseif ($shareTypeEntitya instanceof ShareEntity\Type\Twitter) {
            return $this->shareTable->insertTwitterOnDuplicateKeyUpdate(
                null,
                $entityTypeEntity->getEntityTypeId(),
                $typeId
            );
        }

        throw new Exeception('Invalid share entity type.');
    }
}
