<?php

namespace TiBeN\Framework\DataSource;

use TiBeN\Framework\Entity\CriteriaSet;
use TiBeN\Framework\Entity\EntityMapping;
use TiBeN\Framework\Entity\EntityCollection;
use TiBeN\Framework\Entity\Entity;

/**
 *  
 *
 * @package TiBeN\Framework\DataSource
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
	public static function getAttributeMappingConfigurationClassName();

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

	/**
	 * @param EntityMapping $entityMapping
	 * @param Entity $entity
	 */
	public function create(EntityMapping $entityMapping, Entity $entity);

	/**
	 * @param EntityMapping $entityMapping
	 * @param CriteriaSet $criteriaSet
	 * @return EntityCollection $entityCollection
	 */
	public function read(EntityMapping $entityMapping, CriteriaSet $criteriaSet);

	/**
	 * @return string $className
	 */
	public static function getEntityMappingConfigurationClassName();

}
