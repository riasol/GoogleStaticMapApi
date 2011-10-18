<?php
require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'GoogleStaticMapApiLib'.DIRECTORY_SEPARATOR.'IUrlPart.php';
class GoogleStaticMapApi implements IUrlPart{
	const MAPS_URL='http://maps.googleapis.com/maps/api/staticmap';


	function __construct(){
		spl_autoload_register(array($this,'autoload'));
	}
	/**
	 * @var LatLng
	 */
	private $center;
	public function setCenter($lngOrLocation){
		$this->center=$lngOrLocation;
	}
	private $zoom;
	public function setZoom($zoom){
		$range=array(0,21);
		if($zoom<$range[0] || $zoom>$range[1]){
			throw new BadArgumentException("Zoom not in range {$range[0]} - {$range[1]}");
		}
		$this->zoom=$zoom;
	}
	private $size=array(200,200);
	public function setSize($width,$height){
		$this->size=array($width,$height);
	}
	//free version accept only 2
	private $scale=2;
	public function setScale($scale){
		$this->scale=$scale;
	}
	private $format;
	public function setFormat(ImageFormat $format){
		$this->format=$format;
	}

	public function setMapType(MapType $maptype ){

	}
	public function setLanguage($language ){
	}
	private $markers=array();
	public function addMarker(Marker $marker ){
		$this->markers[]=$marker;
	}
	private $pathes=array();
	public function addPath(Path $path ){
		$this->pathes[]=$path;
	}
	private $visible=true;
	public function setVisible($visible ){
		$this->visible=$visible;
	}
	private $styles;
	public function setStyle($style ){
		$this->styles[]=$style;
	}
	private $sensor=false;
	public function setSensor($sensorUsed ){
		$this->sensor=$sensorUsed;
	}
	public function getUrlPart(){
		$s=GoogleStaticMapApi::MAPS_URL;
		$s.='?';
		$s.='&sensor='.($this->sensor?'true':'false');
		$s.='&size='.$this->size[0].'x'.$this->size[1];
		if(!empty($this->zoom)){
			$s.='&zoom='.$this->zoom;
		}
		if(!empty($this->markers)){
			foreach($this->markers as /** @var Marker*/$marker){
				$s.='&';
				$s.=$marker->getUrlPart();
			}
		}
		if(empty($this->center) && empty($this->markers)){
			$this->center=new LatLng(50.061822,19.937353);//cracow main square
		}
		if($this->center instanceof LatLng){
			$s.='&center='.$this->center->getUrlPart();
		}
		return $s;
	}
	private function autoload($name){
		$potentialPath=dirname(__FILE__).DIRECTORY_SEPARATOR.'GoogleStaticMapApiLib'.DIRECTORY_SEPARATOR.$name.'.php';
		if(is_file($potentialPath))	{
			require_once $potentialPath;
		}
	}

}
class MapType {
	const ROADMAP='roadmap';
	const SATELLITE='satellite';
	const TERRAIN='terrain';
	const HYBRID='hybrid';
}
class ImageFormat{
	const PNG16='png16';
	const PNG8='png8';
	const GIF='gif';
	const JPG='jpg';
	const JPG_BASELINE='jpg-baseline';
}
