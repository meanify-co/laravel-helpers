<?php

namespace Meanify\LaravelHelpers\Utils;

use Meanify\LaravelHelpers\Utils\ContextMethods\JobAfterDispatcher;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class JobUtil
{
    private $job_instance;

    private $job_public_id;

    private $queue_name;

    private $delay_in_carbon;

    public function __construct()
    {
        $this->job_instance    = null;
        $this->job_public_id   = null;
        $this->delay_in_carbon = null;
        $this->queue_name      = null;

        return $this;
    }

    /**
     * @return $this
     */
    public function queue($job_instance)
    {
        $this->job_instance = $job_instance;

        try
        {
            $this->queue_name = $job_instance->getQueueName();
        } catch (\Exception $e)
        {
            $this->queue_name = 'default';
        }

        return $this;
    }

    /**
     * @return $this
     */
    public function delay(Carbon $delay)
    {
        $this->delay_in_carbon = $delay;

        return $this;
    }

    /**
     * @return mixed
     *
     * @throws \Exception
     */
    public function dispatch()
    {
        if (is_null($this->job_instance))
        {
            throw new \Exception('Job is undefined');
        }

        if (is_null($this->delay_in_carbon))
        {
            \Queue::pushOn($this->queue_name, $this->job_instance);
        } else
        {
            \Queue::laterON($this->queue_name, $this->delay_in_carbon, $this->job_instance);
        }

        return new JobAfterDispatcher($this->job_instance->job_public_id ?? null);
    }

    /**
     * @return \stdClass
     */
    public function getByUuid(string $job_public_id)
    {
        $result            = new \stdClass;
        $result->state     = 'processed';
        $result->payload   = null;
        $result->command   = null;
        $result->full_data = null;

        $job = DB::table('jobs')->where('payload', 'like', '%'.$job_public_id.'%')->first();

        if (isset($job))
        {
            $job->payload                = json_decode($job->payload);
            $job->payload->data->command = unserialize($job->payload->data->command);

            $result->state     = 'queued';
            $result->payload   = $job->payload;
            $result->command   = $job->payload->data->command;
            $result->full_data = $job;
        } else
        {
            $failed_job = DB::table('failed_jobs')->where('payload', 'like', '%'.$job_public_id.'%')->first();

            if (isset($failed_job))
            {
                $failed_job->payload                = json_decode($failed_job->payload);
                $failed_job->payload->data->command = unserialize($failed_job->payload->data->command);

                $result->state     = 'failed';
                $result->payload   = $failed_job->payload;
                $result->command   = $failed_job->payload->data->command;
                $result->full_data = $failed_job;
            }
        }

        return json_decode(json_encode($result));
    }
}
