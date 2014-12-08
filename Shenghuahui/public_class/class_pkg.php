<?php
class Pkg {
	public $id;
	public $type1;
	public $type2;
	public $cost;
	public $pkg_call;
	public $pkg_lcall;
	public $pkg_data;
	public $pkg_text;
	public $over_call;
	public $over_lcall;
	public $over_data;
	public $over_text;
	public $extra;
	public $full_cost;
	public function __construct($id, $type1, $type2, $cost, $pkg_call, $pkg_data, $pkg_text, $over_call, $over_data, $over_text, $extra) {
		$this->id = $id;
		$this->type1 = $type1;
		$this->type2 = $type2;
		$this->cost = $cost;
		$this->pkg_call = $pkg_call;
		$this->pkg_data = $pkg_data;
		$this->pkg_text = $pkg_text;
		$this->over_call = $over_call;
		$this->over_data = $over_data;
		$this->over_text = $over_text;
		$this->extra = $extra;
	}
	public function cal($call, $data, $text) {
		// $full_cost = 0.0;
		$this->full_cost = $this->cost + $this->cal_data ( $data ) + $this->cal_call ( $call ) + $this->cal_text ( $text );
		return $this->full_cost;
	}
	public function cal_data($data) {
		$cost_data = 0.0;
		if ($this->pkg_data < $data) {
			$cost_data = ($data - $this->pkg_data) * $this->over_data;
		}
		return $cost_data;
	}
	public function cal_call($call) {
		$cost_call = 0.0;
		if ($this->pkg_call < $call) {
			$cost_call = ($call - $this->pkg_call) * $this->over_call;
		}
		// echo $this->pkg_call;
		return $cost_call;
	}
	public function cal_text($text) {
		$cost_text = 0.0;
		if ($this->pkg_text < $text) {
			$cost_text = ($text - $this->pkg_text) * $this->over_text;
		}
		return $cost_text;
	}
	// a test for iPhone_plan
	public function init_all($id, $type1, $type2, $extra) {
		$this->id = $id;
		$this->type1 = $type1;
		$this->type2 = $type2;
		$this->cost = 0;
		$this->pkg_call = 0;
		$this->pkg_data = 0;
		$this->pkg_text = 0;
		$this->over_call = 0;
		$this->over_data = 0.3;
		$this->over_text = 0.1;
		$this->extra = $extra;
	}
	
	// display detail package
	public function display() {
		echo $this->id . '</br>';
		echo $this->type1 . '</br>';
		echo $this->type2 . '</br>';
		echo $this->cost . '</br>';
		echo $this->pkg_call . '</br>';
		echo $this->pkg_data . '</br>';
		echo $this->pkg_text . '</br>';
		echo $this->over_call . '</br>';
		echo $this->over_data . '</br>';
		echo $this->over_text . '</br>';
		echo $this->extra . '</br>';
	}
	
	// set all fields
	public function set_extra($e) {
		$this->extra = $e;
	}
	public function set_over_text($ot) {
		$this->over_text = $ot;
	}
	public function set_over_data($od) {
		$this->over_data = $od;
	}
	public function set_over_call($oc) {
		$this->over_call = $oc;
	}
	public function set_pkg_text($pt) {
		$this->pkg_text = $pt;
	}
	public function set_pkg_data($pd) {
		$this->pkg_data = $pd;
	}
	public function set_pkg_call($pc) {
		$this->pkg_call = $pc;
	}
	public function set_cost($c) {
		$this->cost = $c;
	}
	public function set_type2($t2) {
		$this->type2 = $t2;
	}
	public function set_type1($t1) {
		$this->type1 = $t1;
	}
	public function set_id($i) {
		$this->id = $i;
	}
	
	// decide whether
}
class Composition {
	public $type;
	public $price;
	public $volume;
	public $over_cost;
	public $upper;
	public $lower;
	public $full_cost;
	public function __construct($type, $price, $volume, $over_cost) {
		$this->type = $type;
		$this->price = $price;
		$this->volume = $volume;
		$this->over_cost = $over_cost;
		$this->lower = 0;
		$this->upper = 15360; // 15G
		$this->full_cost = $price;
	}
	public function cal($cdt) {
		if ($cdt < $this->volume) {
			$this->full_cost = $this->price;
		} else {
			$this->full_cost = $this->price + ($cdt - $this->volume) * $this->over_cost;
		}
	}
	public function set_price($price){
		$this->price = $price;
		$this->full_cost = $price;
	}
	public function set_over_cost($over_cost){
		$this->over_cost = $over_cost;
	}
	public function set_volume($volume){
		$this->volume = $volume;
	}
	public function set_upper($upper){
		$this->upper = $upper ;
	}
	public function set_lower($lower){
		$this->lower = $lower;
	}
	// display detail package
	public function display() {
		echo $this->type . '</br>';
		echo $this->price . '</br>';
		echo $this->volume . '</br>';
		echo $this->over_cost . '</br>';
		echo $this->lower . '</br>';
		echo $this->upper . '</br>';
		echo $this->full_cost . '</br>';
	}
}

// $p = new Composition('D', 8, 150, 0.3);
// $p->display();
// echo '</br>';
// $p->cal(176);
// $p->display();
?>