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
    public function __construct()
    {
    }

    public function index()
    {
        return "index";
    }

    public function switchRelay($relay_id, $status){

        //Validate $relay_id and $status
        system(" gpio-g mode $relay_id out ") ;
        system(" gpio-g write $relay_id $status") ;

    }


}
