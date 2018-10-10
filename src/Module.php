<?php
namespace LeoGalleguillos\Share;

use LeoGalleguillos\Share\Model\Factory as ShareFactory;
use LeoGalleguillos\Share\Model\Service as ShareService;
use LeoGalleguillos\Share\Model\Table as ShareTable;

class Module
{
    public function getConfig()
    {
        return [
            'view_helpers' => [
                'aliases' => [
                ],
                'factories' => [
                ],
            ],
        ];
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                ShareService\Increment::class => function ($serviceManager) {
                    return new ShareService\Increment(
                        $serviceManager->get(ShareTable\Share::class)
                    );
                },
                ShareTable\Share::class => function ($serviceManager) {
                    return new ShareTable\Share(
                        $serviceManager->get('share')
                    );
                },
            ],
        ];
    }
}
