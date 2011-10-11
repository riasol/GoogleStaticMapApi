<?php
class GoogleStaticMapApi{
	const MAPS_URL='http://maps.googleapis.com/maps/api/staticmap';
	const FORMAT_PNG16='png16';
	const FORMAT_PNG8='png8';
	const FORMAT_GIF='gif';
	const FORMAT_JPG='jpg';
	const FORMAT_JPG_BASELINE='jpg-baseline';
	const MAP_TYPE_ROADMAP='roadmap';
	const MAP_TYPE_SATELLITE='satellite';
	const MAP_TYPE_TERRAIN='terrain';
	const MAP_TYPE_HYBRID='hybrid';
	function __construct(){
		spl_autoload_register(array($this,'autoload'));
	}
	private $center;
	public function setCenter($lngOrLocation){

	}
	private $zoom;
	public function setZoom($level){
		//0-21
	}
	private $size;
	public function setSize($width,$height){
	}
	//accept only 2
	private $scale;
	public function setScale($scale){
	}
	private $format;
	public function setFormat($format){
	}

	public function setMapType($maptype ){
	}
	public function setLanguage($language ){
	}
	private $markers=array();
	public function addMarker(Marker $marker ){
		$this->markers[]=$marker;
	}
	public function addPath($path ){
	}
	public function setVisible($visible ){
	}
	public function setStyle($style ){
	}
	private $sensor=false;
	public function setSensor($sensorUsed ){
		$this->sensor=$sensorUsed;
	}
	public function toURL(){
		$ret=GoogleStaticMapApi::MAPS_URL;
		$ret.='?';
		return $ret;
	}
	private function autoload($name){
		$potentialPath=dirname(__FILE__).DIRECTORY_SEPARATOR.'lib'.DIRECTORY_SEPARATOR.$name.'.php';
		if(is_file($potentialPath))	{
			require_once $potentialPath;
		}
	}

}

