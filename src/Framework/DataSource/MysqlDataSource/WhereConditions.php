<?php

namespace TiBeN\Framework\DataSource\MysqlDataSource;

use TiBeN\Framework\Datatype\GenericCollection;
use TiBeN\Framework\Entity\CriteriaSet;
use TiBeN\Framework\Entity\Entity;
use TiBeN\Framework\Datatype\AssociativeArray;
use TiBeN\Framework\Entity\EntityMapping;
use TiBeN\Framework\Entity\MatchCriteria;

// Start of user code WhereConditions.useStatements
// Place your use statements here.
// End of user code

/**
 * Represent a where_condition statement chunk.
 * 
 *
 * @package TiBeN\Framework\DataSource\MysqlDataSource
 * @author TiBeN
 */
class WhereConditions
{
    /**
     * @var Expr
     */
    public $expr;

    /**
     * @var AssociativeArray
     */
    public $statementParameters;

    /**
     * @return Expr
     */
    public function getExpr()
    {
        // Start of user code Getter WhereConditions.getExpr
        // End of user code
        return $this->expr;
    }

    /**
     * @param Expr $expr
     */
    public function setExpr(Expr $expr)
    {
        // Start of user code Setter WhereConditions.setExpr
        // End of user code
        $this->expr = $expr;
    }

    /**
     * @return AssociativeArray
     */
    public function getStatementParameters()
    {
        // Start of user code Getter WhereConditions.getStatementParameters
        // End of user code
        return $this->statementParameters;
    }

    /**
     * @param AssociativeArray $statementParameters
     */
    public function setStatementParameters(AssociativeArray $statementParameters)
    {
        // Start of user code Setter WhereConditions.setStatementParameters
        // End of user code
        $this->statementParameters = $statementParameters;
    }

    /**
     * Factory method that generate a WhereConditions 
     * that target the row pointed by the entity.
     *
     * @param EntityMapping $entityMapping
     * @param Entity $entity
     * @return WhereConditions $whereConditions
     */
    public static function createEntityTargetFromEntity(EntityMapping $entityMapping, Entity $entity)
    {
        // Start of user code WhereConditions.createEntityTargetFromEntity
        $mapper = new MysqlEntityAttributeMapper();
        $mapper->setEntityMapping($entityMapping);
        $mapper->setEntity($entity);        
        if($mapper->getIdentifierValue() === NULL) {
            throw new \LogicException(
               'A WhereConditions can\'t be instanciated from an unidentified entity'
            ); 
        }
        $criteriaSet = CriteriaSet::createAnd()
            ->add(
                MatchCriteria::equals(
                    $mapper->getIdentifierAttributeName(), 
                    $mapper->getIdentifierValue()
                )
            )
        ;             

        $whereConditions = self::createFromCriteriaSet($criteriaSet, $entityMapping);
        // End of user code
    
        return $whereConditions;
    }

    /**
     * Generate the where_condition as a string.
     *
     * @return string $string
     */
    public function toString()
    {
        // Start of user code WhereConditions.toString
        if(is_null($this->expr)) {
            throw new \LogicException('No expr set');
        }
        $string = 'WHERE ' . $this->expr->toString(); 
        // End of user code
    
        return $string;
    }

    /**
     * Factory Method that create a WhereConditions 
     * from an entity CriterieSet.
     *
     * @param CriteriaSet $criteriaSet
     * @param EntityMapping $entityMapping
     * @return WhereConditions $whereCondition
     */
    public static function createFromCriteriaSet(CriteriaSet $criteriaSet, EntityMapping $entityMapping)
    {
        // Start of user code WhereConditions.createFromCriteriaSet
        $whereCondition = new self();                
        $expr = self::convertCriteriaSetToExpr($criteriaSet, $entityMapping);
        $whereCondition->setExpr($expr);        
        $whereCondition->setStatementParameters($expr->getExprParameters());               
        // End of user code
    
        return $whereCondition;
    }

    /**
     * Factory method that generate a WhereConditions
     * fom an Expr.
     *
     * @param Expr $expr
     * @return WhereConditions $whereConditions
     */
    public static function createFromExpr(Expr $expr)
    {
        // Start of user code WhereConditions.createFromExpr
        $whereConditions = new self();
        $whereConditions->expr = $expr;
        $whereConditions->statementParameters = $expr->getExprParameters();
        // End of user code
    
        return $whereConditions;
    }

    // Start of user code WhereConditions.implementationSpecificMethods
    
    /**
     * Hold logical separator mappings between the entity criteria set and Mysql expr
     *
     * @var array
     */
    public static $criteriaSetExprLogicalSeparatorMapping = array(
        CriteriaSet::LOGICAL_SEPARATOR_AND => Expr::LOGICAL_SEPARATOR_AND,
        CriteriaSet::LOGICAL_SEPARATOR_OR => Expr::LOGICAL_SEPARATOR_OR
    );
    
    /**
     * Hold operator mappings between the entity match criteria and Mysql expr
     *
     * @var array
     */ 
    public static $criteriaSetExprOperatorMapping = array(
            MatchCriteria::OPERATOR_EQUALS => Expr::OPERATOR_EQUALS,
            MatchCriteria::OPERATOR_GREATER_THAN => Expr::OPERATOR_GREATER_THAN,
            MatchCriteria::OPERATOR_GREATER_THAN_OR_EQUALS 
                => Expr::OPERATOR_GREATER_THAN_OR_EQUALS
            ,
            MatchCriteria::OPERATOR_LESS_THAN => Expr::OPERATOR_LESS_THAN,
            MatchCriteria::OPERATOR_LESS_THAN_OR_EQUALS => Expr::OPERATOR_LESS_THAN_OR_EQUALS,
            MatchCriteria::OPERATOR_LIKE => Expr::OPERATOR_LIKE,
            MatchCriteria::OPERATOR_NOT_EQUALS => Expr::OPERATOR_NOT_EQUALS,
            MatchCriteria::OPERATOR_NOT_LIKE => Expr::OPERATOR_NOT_LIKE
    );
    
    /**
     * Convert a CriteriaSet to an Expr
     *
     * @param CriteriaSet $criteriaSet 
     * @param EntityMapping $entityMapping
     * @param AssociativeArray $exprParameters (used internaly as memory for recursive loop)
     * @return Expr
     */
    public static function ConvertCriteriaSetToExpr(
        CriteriaSet $criteriaSet, 
        EntityMapping $entityMapping, 
        AssociativeArray $exprParameters = NULL
    ) {
        $exprCollection = new GenericCollection(
            'TiBeN\\Framework\\DataSource\\MysqlDataSource\\Expr'
        );
        if(is_null($exprParameters)) $exprParameters = new AssociativeArray();
                
        foreach($criteriaSet->getCriteriaSets() as $subCriteriaSet) {
            $subExpr = self::ConvertCriteriaSetToExpr(
                $subCriteriaSet, 
                $entityMapping, 
                $exprParameters
            );
            $exprCollection->add($subExpr);
            $exprParameters->merge($subExpr->getExprParameters());
        }
                
        $mapper = new MysqlEntityAttributeMapper();
        $mapper->setEntityMapping($entityMapping);
        
        foreach($criteriaSet->getMatchCriterias() as $matchCriteria) {
            $numberedAttribute = $matchCriteria->getAttribute()."0";
            $i = 0;
            while($i >= 0) {
                $numberedAttribute = $matchCriteria->getAttribute().(string)$i;
                if($exprParameters->has($numberedAttribute)) $i++;
                else break;
            }
            
            $exprParameters->set($numberedAttribute, $matchCriteria->getValue());

            $exprCollection->add(
                Expr::fromString(
                    sprintf(
                        '%s %s %s', 
                        $mapper->getColumnName($matchCriteria->getAttribute()), 
                        self::$criteriaSetExprOperatorMapping[$matchCriteria->getOperator()],
                        ':' . $numberedAttribute
                    ), 
                    AssociativeArray::createFromNativeArray(
                        null,   
                        array($numberedAttribute => $matchCriteria->getValue())
                    )
                )
            );
        }

        return Expr::concat(
            $exprCollection, 
            self::$criteriaSetExprLogicalSeparatorMapping[$criteriaSet->getLogicalSeparator()]
        );
    }
    // End of user code
}
