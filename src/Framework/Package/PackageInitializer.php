<?php

namespace TiBeN\Framework\Package;

/**
 * Contain initalization logic of a package which is launched 
 * during bootstrap. An instance of the classes which implements this 
 * interface must be passed to the Bootstrap's constructor. This allow find grained control
 * on used package during custom runtimes.  
 *
 * @package TiBeN\Framework\Package
 * @author TiBeN
 */ 
interface PackageInitializer
{
	/**
	 * Execute initialisation process of a package
	 */
	public function init();

}
