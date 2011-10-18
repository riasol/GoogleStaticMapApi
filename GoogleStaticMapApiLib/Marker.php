<?php
class Marker implements IUrlPart{
	const SIZE_TINY='tiny';
	const SIZE_MID='mid';
	const SIZE_SMALL='small';
	private $locations=array();
	public function addLocation(LatLng $location){
		$this->locations[]=$location;
	}
	private $label;
	public function setLabel($label){
		$this->label=$label;
	}
	private $size;
	public function setSize($size){
		$this->size=$size;
	}
	private $color;
	/**
	 *
	 * @param 0x.. or named $color
	 */
	public function setColor($color){
		$this->color=$color;
	}
	public function getUrlPart(){
		$s='markers=';
		if(!empty($this->size)){
			$s.="size:{$this->size}|";
		}
		if(!empty($this->color)){
			$s.="color:{$this->color}|";
		}
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