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
use Vainyl\Core\IdentifiableInterface;
use Vainyl\Search\FilterInterface;
use Vainyl\Search\IndexInterface;

/**
 * Class ElasticIndex
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ElasticIndex extends AbstractIdentifiable implements IndexInterface
{
    private $database;

    /**
     * AbstractElasticIndex constructor.
     *
     * @param ElasticDatabase $database
     */
    public function __construct(ElasticDatabase $database)
    {
        $this->database = $database;
    }

    /**
     * @inheritDoc
     */
    public function add(IdentifiableInterface $identifiable): bool
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
    public function finOne(FilterInterface $filter): IdentifiableInterface
    {
        trigger_error('Method finOne is not implemented', E_USER_ERROR);
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
    public function remove(IdentifiableInterface $identifiable): bool
    {
        trigger_error('Method remove is not implemented', E_USER_ERROR);
    }

    /**
     * @inheritDoc
     */
    public function supports(IdentifiableInterface $identifiable): bool
    {
        trigger_error('Method supports is not implemented', E_USER_ERROR);
    }
}