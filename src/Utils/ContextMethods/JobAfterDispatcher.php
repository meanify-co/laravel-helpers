<?php

namespace Meanify\LaravelHelpers\Utils\ContextMethods;

class JobAfterDispatcher
{
    private $job_id;

    public function __construct($job_id)
    {
        $this->job_id = $job_id;

        return $this;
    }

    /**
     * @return void
     */
    public function getJobId()
    {
        return $this->job_id;
    }
}
