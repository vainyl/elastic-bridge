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

use Vainyl\Core\Storage\Decorator\AbstractStorageDecorator;
use Vainyl\Search\IndexInterface;

/**
 * Class ElasticIndexStorage
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ElasticIndexStorage extends AbstractStorageDecorator implements ElasticIndexStorageInterface
{
    /**
     * @inheritDoc
     */
    public function addIndex(string $name, IndexInterface $index): ElasticIndexStorageInterface
    {
        $this->offsetSet($name, $index);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getIndex(string $name): IndexInterface
    {
        return $this->offsetGet($name);
    }
}