<?php
namespace LeoGalleguillos\Share\Model\Entity;

use LeoGalleguillos\Share\Model\Entity as ShareEntity;

class Share
{
    public function getFacebook(): int
    {
        return $this->facebook;
    }

    public function getTwitter(): int
    {
        return $this->twitter;
    }

    public function setFacebook(int $facebook): ShareEntity\Share
    {
        $this->facebook = $facebook;
        return $this;
    }

    public function setTwitter(int $twitter): ShareEntity\Share
    {
        $this->twitter = $twitter;
        return $this;
    }
}
