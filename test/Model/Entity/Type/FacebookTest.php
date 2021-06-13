<?php
namespace LeoGalleguillos\ShareTest\Model\Entity\Type;

use DateTime;
use LeoGalleguillos\Share\Model\Entity as ShareEntity;
use PHPUnit\Framework\TestCase;

class FacebookTest extends TestCase
{
    protected function setUp(): void
    {
        $this->facebookEntity = new ShareEntity\Type\Facebook();
    }

    public function testInstantiation()
    {
        $this->assertInstanceOf(
            ShareEntity\Type\Facebook::class,
            $this->facebookEntity
        );
    }
}
