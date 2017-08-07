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

use Vainyl\Core\AbstractIdentifiable;
use Vainyl\Search\FilterInterface;
use Vainyl\Search\IndexInterface;
use Vainyl\Search\SearchableInterface;

/**
 * Class AbstractElasticIndex
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractElasticIndex extends AbstractIdentifiable implements IndexInterface
{
    /**
     * @inheritDoc
     */
    public function add(SearchableInterface $object): bool
    {
        trigger_error('Method add is not implemented', E_USER_ERROR);
    }

    /**
     * @inheritDoc
     */
    public function clear(): bool
    {
        trigger_error('Method clear is not implemented', E_USER_ERROR);
    }

    /**
     * @inheritDoc
     */
    public function create(): bool
    {
        trigger_error('Method create is not implemented', E_USER_ERROR);
    }

    /**
     * @inheritDoc
     */
    public function findOne(FilterInterface $filter): SearchableInterface
    {
        trigger_error('Method findOne is not implemented', E_USER_ERROR);
    }

    /**
     * @inheritDoc
     */
    public function find(FilterInterface $filter): array
    {
        trigger_error('Method find is not implemented', E_USER_ERROR);
    }

    /**
     * @inheritDoc
     */
    public function remove(SearchableInterface $object): bool
    {
        trigger_error('Method remove is not implemented', E_USER_ERROR);
    }

    /**
     * @inheritDoc
     */
    public function supports(string $name): bool
    {
        trigger_error('Method supports is not implemented', E_USER_ERROR);
    }

    /**
     * @inheritDoc
     */
    public function update(SearchableInterface $object): bool
    {
        trigger_error('Method update is not implemented', E_USER_ERROR);
    }
}