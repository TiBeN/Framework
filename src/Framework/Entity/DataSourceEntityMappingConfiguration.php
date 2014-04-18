<?php

namespace TiBeN\Framework\Entity;

use TiBeN\Framework\Datatype\AssociativeArray;

/**
 *  
 *
 * @package Entity
 * @author TiBeN
 */ 
interface DataSourceEntityMappingConfiguration
{
	/**
	 * @param AssociativeArray $config
	 * @return DataSourceEntityMappingConfiguration $dataSourceEntityMappingConfiguration
	 */
	public static function create(AssociativeArray $config);

}
