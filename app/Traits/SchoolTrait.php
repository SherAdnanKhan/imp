<?php

namespace App\Traits;

use App\Models\Kelex_campus;
use App\Models\Kelex_class;
use App\Models\Kelex_employee;

trait SchoolTrait
{
    public function getcampusdetails($url)
    {
     
        $parse=parse_url($url);
        $campus= Kelex_campus::where('SCHOOL_WEBSITE',$parse['host'])->first();
    
        return $campus;
    }
    public function getemployeedetails($campus)
    {
        $employee= Kelex_employee::where('CAMPUS_ID',$campus['CAMPUS_ID'])->get();
    
        return $employee;
    }
    public function getClasses($campus)
    {
        $class= Kelex_class::where('CAMPUS_ID',$campus['CAMPUS_ID'])->get();
    
        return $class;
    }
    

}
?>
