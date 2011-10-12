<?php
class Marker implements IUrlPart{
	private $locations=array();
	public function addLocation(LatLng $location){
		$this->locations[]=$location;
	}
	private $label;
	public function setLabel($label){
		$this->label=$label;
	}
	public function getUrlPart(){
		$s='';
		if(!empty($this->label)){
			$s.='label:'.urlencode($this->label).'|';
		}
		$ar=array();
		foreach ($this->locations as $location){
			$ar[]=$location->getUrlPart();
		}
		$s.=join('|',$ar);
		return $s;
	}
}