<?php
namespace LeoGalleguillos\ShareTest\Model\Table;

use LeoGalleguillos\Share\Model\Table as ShareTable;
use LeoGalleguillos\ShareTest\TableTestCase;
use Zend\Db\Adapter\Adapter;
use PHPUnit\Framework\TestCase;

class ShareTest extends TableTestCase
{
    /**
     * @var string
     */
    protected $sqlPath = __DIR__ . '/../../..' . '/sql/leogalle_test/share/';

    protected function setUp()
    {
        $configArray     = require(__DIR__ . '/../../../config/autoload/local.php');
        $configArray     = $configArray['db']['adapters']['leogalle_test'];
        $this->adapter   = new Adapter($configArray);

        $this->shareTable      = new ShareTable\Share($this->adapter);

        $this->setForeignKeyChecks0();
        $this->dropTable();
        $this->createTable();
        $this->setForeignKeyChecks1();
    }

    protected function dropTable()
    {
        $sql = file_get_contents($this->sqlPath . 'drop.sql');
        $result = $this->adapter->query($sql)->execute();
    }

    protected function createTable()
    {
        $sql = file_get_contents($this->sqlPath . 'create.sql');
        $result = $this->adapter->query($sql)->execute();
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            ShareTable\Share::class,
            $this->shareTable
        );
    }

    public function testInsertFaceboookOnDuplicateKeyUpdate()
    {
        $shareId = $this->shareTable->insertFaceboookOnDuplicateKeyUpdate(
            null,
            1,
            1
        );
        $this->assertSame(
            1,
            $shareId
        );

        $shareId = $this->shareTable->insertFaceboookOnDuplicateKeyUpdate(
            null,
            1,
            1
        );
        $this->assertSame(
            1,
            $shareId
        );
    }
}
