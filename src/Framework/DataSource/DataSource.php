<?php

namespace TiBeN\Framework\DataSource;
 
/**
 *  
 * @package DataSource
 * @author TiBeN
 */ 
interface DataSource
{
	/**
	 * @return string
	 */
	public function getName();

	/**
	 * @param string $name
	 */
	public function setName($name);

	/**
	 * @param EntityMapping $entityMapping
	 * @param CriteriaSet $criteriaSet
	 * @return EntityCollection $entityCollection
	 */
	public function read(EntityMapping $entityMapping, CriteriaSet $criteriaSet);

	/**
	 * @return string $className
	 */
	public static function getAttributeMappingConfigurationClassName();

	/**
	 * @return string $className
	 */
	public static function getEntityMappingConfigurationClassName();

	/**
	 * @param EntityMapping $entityMapping
	 * @param Entity $entity
	 */
	public function create(EntityMapping $entityMapping, Entity $entity);

	/**
	 * @param EntityMapping $entityMapping
	 * @param Entity $entity
	 */
	public function delete(EntityMapping $entityMapping, Entity $entity);

	/**
	 * @param EntityMapping $entityMapping
	 * @param Entity $entity
	 */
	public function update(EntityMapping $entityMapping, Entity $entity);

}
