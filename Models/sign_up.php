<?php


class sign_up
{
    public $ID, $F_Name, $L_Name, $Email;

    /**
     * sign_up constructor.
     * @param $ID
     * @param $F_Name
     * @param $L_Name
     * @param $Email
     */
    public function __construct($ID, $F_Name, $L_Name, $Email)
    {
        $this->ID = $ID;
        $this->F_Name = $F_Name;
        $this->L_Name = $L_Name;
        $this->Email = $Email;
    }
}