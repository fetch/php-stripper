<?php

namespace Stripper;

abstract class AbstractStripper{

	protected $_string;

	public function __construct($string){
		$this->_string = $string;
	}
}
