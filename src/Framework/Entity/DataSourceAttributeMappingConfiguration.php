<?php

namespace TiBeN\Framework\Entity;

use TiBeN\Framework\Datatype\AssociativeArray;

/**
 *  
 *
 * @package TiBeN\Framework\Entity
 * @author TiBeN
 */ 
interface DataSourceAttributeMappingConfiguration
{
	/**
	 * @param AssociativeArray $config
	 * @return DataSourceAttributeMappingConfiguration $dataSourceAttributeMappingConfiguration
	 */
	public static function create(AssociativeArray $config);

}
