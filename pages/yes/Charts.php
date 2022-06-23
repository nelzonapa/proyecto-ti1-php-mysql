<?php
//carga el chart
class Charts extends Front_end{
    function __construct(){
        parent::__constructu();
              $this ->load->model("charts_model");
     }
    
function index()
    {
        $data["has offers rate"]=$this->charts_model->get_services_has_offers();
        $this->view("content/charts",$data);
    }
    
}

?>