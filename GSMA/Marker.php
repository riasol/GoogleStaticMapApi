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

	}
}