<?php
namespace LeoGalleguillos\Share\Model\Table;

use Exception;
use Generator;
use Zend\Db\Adapter\Adapter;

class Share
{
    /**
     * @var Adapter
     */
    protected $adapter;

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * @return int
     */
    public function insertFaceboookOnDuplicateKeyUpdate(
        int $entityId = null,
        int $entityTypeId,
        int $typeId
    ): int {
        $sql = '
            INSERT
              INTO `share` (
                       `entity_id`
                     , `entity_type_id`
                     , `type_id`
                     , `facebook`
                   )
            VALUES (?, ?, ?, 1)
                ON
         DUPLICATE
               KEY
            UPDATE `facebook` =  `facebook` + 1
                 ;
        ';
        $parameters = [
            $entityId,
            $entityTypeId,
            $typeId,
        ];
        return (int) $this->adapter
                          ->query($sql)
                          ->execute($parameters)
                          ->getGeneratedValue();
    }
}
