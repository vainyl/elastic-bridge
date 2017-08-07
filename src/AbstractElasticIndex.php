<?php
/**
 * Vainyl
 *
 * PHP Version 7
 *
 * @package   Elastic-bridge
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://vainyl.com
 */
declare(strict_types=1);

namespace Vainyl\Elastic;

use Vainyl\Domain\Storage\DomainStorageInterface;
use Vainyl\Search\AbstractIndex;
use Vainyl\Search\FilterInterface;
use Vainyl\Search\IndexInterface;
use Vainyl\Search\SearchableInterface;

/**
 * Class AbstractElasticIndex
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractElasticIndex extends AbstractIndex implements IndexInterface
{
    private $database;

    /**
     * AbstractElasticIndex constructor.
     *
     * @param ElasticDatabase        $database
     * @param DomainStorageInterface $domainStorage
     */
    public function __construct(ElasticDatabase $database, DomainStorageInterface $domainStorage)
    {
        $this->database = $database;
        parent::__construct($domainStorage);
    }

    /**
     * @inheritDoc
     */
    public function clear(): bool
    {
        return $this->database->delete(
            [
                'index' => $this->getName(),
                'type'  => $this->getType(),
            ]
        )['acknowledged'];
    }

    /**
     * @inheritDoc
     */
    public function create(): bool
    {
        return $this->database->indices()->create(
            [
                'index' => $this->getName(),
                'body'  => [
                    'settings' => $this->getSettings(),
                    'mappings' => $this->getMappings(),
                ],
            ]
        )['acknowledged'];
    }

    /**
     * @inheritDoc
     */
    public function doAdd(SearchableInterface $object): bool
    {
        return $this->database->index(
            [
                'index' => $this->getName(),
                'type'  => $this->getType(),
                'id'    => $object->getId(),
                'body'  => $this->map($object),
            ]
        )['acknowledged'];
    }

    /**
     * @inheritDoc
     */
    public function doFindId(FilterInterface $filter): ?string
    {
        return $this->database->search(
            [
                'index' => $this->getName(),
                'type'  => $this->getType(),
                'body'  => $filter->toArray(),
            ]
        )[''];
    }

    /**
     * @inheritDoc
     */
    public function doFindIds(FilterInterface $filter): array
    {
        return $this->database->search(
            [
                'index' => $this->getName(),
                'type'  => $this->getType(),
                'body'  => $filter->toArray(),
            ]
        )[''];
    }

    /**
     * @inheritDoc
     */
    public function doRemove(SearchableInterface $object): bool
    {
        return $this->database->delete(
            [
                'index' => $this->getName(),
                'type'  => $this->getType(),
                'id'    => $object->getId(),
            ]
        )['acknowledged'];
    }

    /**
     * @inheritDoc
     */
    public function doUpdate(SearchableInterface $object): bool
    {
        return $this->database->update(
            [
                'index' => $this->getName(),
                'type'  => $this->getType(),
                'id'    => $object->getId(),
                'body'  => [
                    'upsert' => [
                        $this->map($object),
                    ],
                ],

            ]
        )['acknowledged'];
    }

    /**
     * @inheritDoc
     */
    public function drop(): bool
    {
        return $this->database->indices()->delete(['index' => $this->getName()])['acknowledged'];
    }

    /**
     * @return array
     */
    abstract public function getMappings(): array;

    /**
     * @return array
     */
    abstract public function getSettings(): array;

    /**
     * @return string
     */
    abstract public function getType(): string;

    /**
     * @param SearchableInterface $searchable
     *
     * @return array
     */
    abstract public function map(SearchableInterface $searchable): array;
}