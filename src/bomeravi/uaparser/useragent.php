<?php
namespace Bomeravi\uaParser;

class useragent {
	public $name;
	public function __construct($name = null){
	//	echo "it is executed";
	if(null !== $name){
		$this->setName($name);
	}
	else {
		$this->createName();
	}
	
	}
	public function setName($useragent)
  {
	
		$this->name = (string) $useragent;
		return $this;
  }
  
   public function getName()
    {
        if (null === $this->name) {
            $this->createName();
        }

        return $this->name;
    }
	
	public function createName($useragent= ''){
		if($useragent == null || empty($useragent)){
		$useragent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : null;
		}
			 $this->setName($useragent);
	 return $this;
	}
}