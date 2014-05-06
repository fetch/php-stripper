<?php

namespace Stripper;

class Textile extends AbstractStripper implements StripperInterface{

	public function strip(){
		$this->_strip_simple_tags();
		$this->_strip_links();
		return $this->_string;
	}

	/**
	 * Regex to replace simple patterns
	 * Borrowed from: https://gist.github.com/cscotta/16132
	 *
	 * @return void
	 * @author Koen Punt
	 */
	public function _strip_simple_tags(){
		$this->_string = preg_replace('/\b[_+^*~@%\-]{1,2}|[_+^*~@%\-]{1,2}\b|\b\?\?|\?\?\b|h\d\.\s|bq.\s|fn\d\.\s|\D\{.*\}\.\s?|\{.*\}\.\s?|\%\{.*\}|\D\(.*\)\.\s?|\{%.*\%\}\s|<.*?>/', "", $this->_string);
	}

	/**
	 * Strip links
	 *
	 * "Text Here":http://google.com => Text Here
	 *
	 * @return void
	 * @author Koen Punt
	 */
	protected function _strip_links(){
		$this->_string = preg_replace('/"(.*?)":[^\s]+/', '\\1', $this->_string);
	}

}