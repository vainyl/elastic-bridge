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

namespace Vainyl\Elastic\Storage;

use Vainyl\Core\IdentifiableInterface;
use Vainyl\Search\IndexInterface;

/**
 * Interface ElasticIndexStorageInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ElasticIndexStorageInterface extends IdentifiableInterface
{
    /**
     * @param string         $name
     * @param IndexInterface $index
     *
     * @return ElasticIndexStorageInterface
     */
    public function addIndex(string $name, IndexInterface $index) : ElasticIndexStorageInterface;

    /**
     * @param string $name
     *
     * @return IndexInterface
     */
    public function getIndex(string $name) : IndexInterface;
}