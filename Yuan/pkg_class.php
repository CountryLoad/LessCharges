<?php
class Pkg{  
  public $id;
  public $type1;
  public $type2;
  public $cost;
  public $pkg_call;
  public $pkg_data;
  public $pkg_text;
  public $over_call;
  public $over_data;
  public $over_text;
  public $extra;
  
  public function cal($call, $data, $text){
    $full_cost = 0.0;
    $full_cost = $this->cost + $this->cal_data($data) + $this->cal_call($call) + $this->cal_text($text);
    return $full_cost;
  }

  public function cal_data($data){
    $cost_data = 0.0 ;
    if($this->pkg_data < $data){
      $cost_data = ($data - $this->pkg_data) * $this->over_data;
    }
    return $cost_data;
  }
  public function cal_call($call){
    $cost_call = 0.0;
    if($this->pkg_call < $call){
      $cost_call = ($call - $this->pkg_call) * $this->over_call;
    }
    echo $this->pkg_call;
    return $cost_call;
  }
  public function cal_text($text){
    $cost_text = 0.0 ;
    if($this->pkg_text < $text){
      $cost_text = ($text - $this->pkg_text) * $this->over_text;
    }
    return $cost_text;
  }
  // a test for iPhone_plan
  public function init_all(){
    $this->id = '0';
    $this->type1 = 3;
    $this->type2 = 'A';
    $this->cost = 66.0;
    $this->pkg_call = 160 ;
    $this->pkg_data = 220;
    $this->pkg_text = 50;
    $this->over_call = 0.20;
    $this->over_data = 0.30;
    $this->over_text = 0.1;
    $this->extra = 0;
  } 
  // set all fields
  public function set_extra($e){
    $this->extra = $e ;
  }
  public function set_over_text($ot){
    $this->over_text = $ot;
  }
  public function set_over_data($od){
    $this->over_data = $od;
  }
  public function set_over_call($oc){
    $this->over_call = $oc;
  }
  public function set_pkg_text($pt){
    $this->pkg_text = $pt;
  }
  public function set_pkg_data($pd){
    $this->pkg_data = $pd;
  }
  public function set_pkg_call($pc){
    $this->pkg_call = $pc;
  }
  public function set_cost($c){
    $this->cost = $c;
  }
  public function set_type2($t2){
    $this->type2 = $t2;
  }
  public function set_type1($t1){
    $this->type1 = $t1;
  }  
  public function set_id ($i){
    $this->id = $i;
  }

}
?>
