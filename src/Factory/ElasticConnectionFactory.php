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

use Vainyl\Connection\ConnectionInterface;
use Vainyl\Connection\Factory\ConnectionFactoryInterface;
use Vainyl\Core\AbstractIdentifiable;
use Vainyl\Elastic\ElasticClientBuilder;
use Vainyl\Elastic\ElasticConnection;

/**
 * Class ElasticConnectionFactory
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ElasticConnectionFactory extends AbstractIdentifiable implements ConnectionFactoryInterface
{
    private $clientBuilder;

    /**
     * ElasticConnectionFactory constructor.
     *
     * @param ElasticClientBuilder $clientBuilder
     */
    public function __construct(ElasticClientBuilder $clientBuilder)
    {
        $this->clientBuilder = $clientBuilder;
    }

    /**
     * @inheritDoc
     */
    public function createConnection(string $name, array $configData): ConnectionInterface
    {
        return new ElasticConnection($name, $this->clientBuilder, $configData['hosts']);
    }
}
