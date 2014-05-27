<?php

namespace TiBeN\Framework\DataSource;

use TiBeN\Framework\Entity\EntityCollection;
use TiBeN\Framework\Entity\EntityMapping;
use TiBeN\Framework\Entity\Entity;
use TiBeN\Framework\Entity\CriteriaSet;

/**
 * This is the main entry point of a DataSource.
 * Its purpose is to abstract specific target datasource handling 
 * behind a standardised entity aware CRUD interface.
 * 
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
	 * Retrieve a collection of entities of the specified EntityMapping
	 *  that matches some CriteriaSet.
	 *   
	 *
	 * @param EntityMapping $entityMapping
	 * @param CriteriaSet $criteriaSet
	 * @return EntityCollection $entityCollection
	 */
	public function read(EntityMapping $entityMapping, CriteriaSet $criteriaSet);

	/**
	 * Update the content of an entity.
	 *
	 * @param EntityMapping $entityMapping
	 * @param Entity $entity
	 */
	public function update(EntityMapping $entityMapping, Entity $entity);

	/**
	 * Store a new entity on the datasource.
	 * The entity must not be already on the datasource.
	 *
	 * @param EntityMapping $entityMapping
	 * @param Entity $entity
	 */
	public function create(EntityMapping $entityMapping, Entity $entity);

	/**
	 * Return the name of the AttributeMappingConfiguration class
	 * of the datasource
	 *
	 * @return string $className
	 */
	public static function getAttributeMappingConfigurationClassName();

	/**
	 * Return the name of the EntityMappingConfiguration class 
	 * of the data source.
	 *
	 * @return string $className
	 */
	public static function getEntityMappingConfigurationClassName();

	/**
	 * Delete an entity from the datasource.
	 *
	 * @param EntityMapping $entityMapping
	 * @param Entity $entity
	 */
	public function delete(EntityMapping $entityMapping, Entity $entity);

}
