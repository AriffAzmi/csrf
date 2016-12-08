<?php namespace CSRF\Interfaces;


interface CsrfInterface{

	function getToken();
	function setToken();
	function generateToken();
	function validate();
}

?>