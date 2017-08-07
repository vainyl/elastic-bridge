<?php
/**
 * Vainyl
 *
 * PHP Version 7
 *
 * @package   Elastic-Bridge
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://vainyl.com
 */
declare(strict_types=1);

namespace Vainyl\Elastic\Factory;

use Vainyl\Core\AbstractIdentifiable;
use Vainyl\Database\DatabaseInterface;
use Vainyl\Database\Factory\DatabaseFactoryInterface;
use Vainyl\Elastic\ElasticDatabase;

/**
 * Class ElasticDatabaseFactory
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ElasticDatabaseFactory extends AbstractIdentifiable implements DatabaseFactoryInterface
{
    private $connectionStorage;

    /**
     * ElasticDatabaseFactory constructor.
     *
     * @param \ArrayAccess $connectionStorage
     */
    public function __construct(\ArrayAccess $connectionStorage)
    {
        $this->connectionStorage = $connectionStorage;
    }

    /**
     * @inheritDoc
     */
    public function createDatabase(
        string $databaseName,
        string $connectionName,
        array $options = []
    ): DatabaseInterface {
        return new ElasticDatabase($databaseName, $this->connectionStorage[$connectionName]);
    }
}
