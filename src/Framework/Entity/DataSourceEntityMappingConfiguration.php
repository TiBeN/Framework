<?php

namespace TiBeN\Framework\Entity;

use TiBeN\Framework\Datatype\AssociativeArray;

/**
 * Holds the datasource specific entity mapping data.
 *   
 *
 * @package TiBeN\Framework\Entity
 * @author TiBeN
 */ 
interface DataSourceEntityMappingConfiguration
{
	/**
	 * Factory method that ease the instanciation process using
	 * associative arrays.
	 *
	 * @param AssociativeArray $config
	 * @return DataSourceEntityMappingConfiguration $dataSourceEntityMappingConfiguration
	 */
	public static function create(AssociativeArray $config);

}
