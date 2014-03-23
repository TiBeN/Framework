<?php

namespace TiBeN\Framework\Entity;
 
/**
 *  
 * @package Entity
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
