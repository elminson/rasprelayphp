<?php
/**
 * Created by PHPProjectGen.
 * User: edeoleo@gmail.com
 * Date: 02/18/2019
 * Time: 05:41 AM
 */

namespace Elminson\rasprelayphp;

/**
 *
 *
 */
class rasprelayphp
{
    /**
     * PHPProjectGen constructor.
     */

    public $gpio_array = [];
    public $gpio_status = [];

    public function __construct()
    {
        $this->gpio_array = [0, 1, 2, 3, 4, 5, 6, 7, 21, 22, 23, 24, 25, 26, 27, 28, 29];
    }

    public function index()
    {
        return "index";
    }

    public function switchRelay($relay_id, $status)
    {

        //Validate $relay_id and $status
        system(" gpio mode $relay_id out ");
        system(" gpio write $relay_id $status");

    }

    public function getStatus()
    {
        foreach ($this->gpio_array as $index => $pin) {
            $command = "gpio read $pin ";
            $this->gpio_status[$pin] = (int)shell_exec($command);
        }
        return $this->gpio_status;
    }


}
