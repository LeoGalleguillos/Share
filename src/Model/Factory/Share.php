<?php
namespace LeoGalleguillos\Share\Model\Factory;

use LeoGalleguillos\Share\Model\Entity as ShareEntity;
use LeoGalleguillos\Share\Model\Table as ShareTable;
use TypeError;

class Share
{
    public function __construct(ShareTable\Share $shareTable)
    {
        $this->shareTable = $shareTable;
    }

    public function buildFromEntityTypeIdAndTypeId(
        int $entityTypeId,
        int $typeId
    ) {
        try {
            $array = $this->shareTable->selectWhereEntityTypeIdAndTypeId(
                $entityTypeId,
                $typeId
            );
        } catch (TypeError $typeError) {
            return $this->buildDefault();
        }

        return $this->buildFromArray($array);
    }

    public function buildFromArray(array $array): ShareEntity\Share
    {
        $shareEntity = new ShareEntity\Share();

        return $shareEntity->setFacebook($array['facebook'])
                           ->setTwitter($array['twitter']);
    }

    public function buildDefault(): ShareEntity\Share
    {
        $shareEntity = new ShareEntity\Share();
        return $shareEntity->setFacebook(0)
                           ->setTwitter(0);
    }
}
