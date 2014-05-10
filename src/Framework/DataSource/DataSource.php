<?php

namespace TiBeN\Framework\DataSource;

use TiBeN\Framework\Entity\EntityCollection;
use TiBeN\Framework\Entity\CriteriaSet;
use TiBeN\Framework\Entity\Entity;
use TiBeN\Framework\Entity\EntityMapping;

/**
 *  
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
	 * @param CriteriaSet $criteriaSet
	 * @return EntityCollection $entityCollection
	 */
	public function read(EntityMapping $entityMapping, CriteriaSet $criteriaSet);

	/**
	 * @param EntityMapping $entityMapping
	 * @param Entity $entity
	 */
	public function update(EntityMapping $entityMapping, Entity $entity);

	/**
	 * @return string $className
	 */
	public static function getAttributeMappingConfigurationClassName();

}
