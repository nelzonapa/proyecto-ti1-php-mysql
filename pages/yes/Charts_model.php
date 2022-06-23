<?php
if (!defined("BASEPATH"))
    exit("No direct script access allowed");

class Charts_model extends CI_Model{
    function get_services_has_offers()
    {
        return $this->db->query("
            SELECT ServiceNameEN,
                (SELECT COUNT(ServiceID) FROM ci_provider_services WHERE SRV.ServiceId = ServiceId) AS offers 
            FROM ci_services SRV WHERE ServiceID IN {
                SELECT ServiceID FROM ci_provider_services WHERE SRV.ServiceId = ServiceId
             }
	    ORDER BY offers DESC")->result_array();
    }
}
?>