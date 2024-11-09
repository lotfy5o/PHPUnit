<?php

class WeatherMonitor
{
    /**
     * @var TempratureService
     */
    protected $service;

    /**
     * Constructor
     * @param TemperatureService
     * 
     * @return void
     */
    public function __construct(TemperatureService $service)
    {
        $this->service = $service;
    }

    /**
     * @param string $start Start time hh:mm
     * @param string $end end time hh:mm
     * 
     * @return int
     */
    public function getAverageTemperature(string $start, string $end)
    {
        $start_temp = $this->service->getTemperature($start);
        $end_temp = $this->service->getTemperature($end);

        return ($start_temp + $end_temp) / 2;
    }
}
