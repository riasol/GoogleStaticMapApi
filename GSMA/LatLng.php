<?php
class LatLng implements IUrlPart{
	private $lat,$lng;
	function __construct($lat,$lng){
		$this->lat=$lat;
		$this->lng=$lng;
	}
	public function getUrlPart(){
		return "{$this->lat},{$this->lng}";
	}
}