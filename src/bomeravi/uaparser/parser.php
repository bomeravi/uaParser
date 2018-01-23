<?php
namespace Bomeravi\uaParser;
use Bomeravi\uaParser\useragent;
use Bomeravi\uaParser\os;
use Bomeravi\uaParser\browser;
use Bomeravi\uaParser\engine;
use Bomeravi\uaParser\language;

abstract class parser { //to get data as class;

public static function getOs($data=null) {
        return new os($data);
    }
public static function getBrowser($data=null) {
	return new browser($data);
}
public static function getLanguage($data=null){
	return new language($data);
}
public static function getEngine($data=null){
	return new engine($data);
}

}