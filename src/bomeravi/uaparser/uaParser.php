<?php
namespace Bomeravi\uaParser;
use Bomeravi\uaParser\useragent;
use Bomeravi\uaParser\os;
use Bomeravi\uaParser\browser;
use Bomeravi\uaParser\engine;

class uaParser {
	public $useragent;
	
	public function __construct($name = null){
		$this->useragent = new useragent($name);
		$this->os = new os($this->useragent);
		$this->browser = new browser($this->useragent);
		$this->engine = new engine($this->useragent);
		$this->language = new language($this->useragent);
	}
}