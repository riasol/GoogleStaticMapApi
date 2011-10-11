<?php
class BadArgumentException extends Exception{
	function __construct($message, $code, $previous){
		parent::__construct($message, $code, $previous);
	}
}