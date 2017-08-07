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

namespace Vainyl\Elastic;

use Elasticsearch\Client;
use Vainyl\Connection\AbstractConnection;

/**
 * Class ElasticConnection
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 *
 * @method Client establish
 */
class ElasticConnection extends AbstractConnection
{
    private $clientBuilder;

    private $hosts;

    private $databaseName;

    /**
     * ElasticConnection constructor.
     *
     * @param string               $name
     * @param ElasticClientBuilder $clientBuilder
     * @param array                $hosts
     */
    public function __construct(string $name, ElasticClientBuilder $clientBuilder, array $hosts)
    {
        $this->clientBuilder = $clientBuilder;
        $this->hosts = $hosts;
        parent::__construct($name);
    }

    /**
     * @inheritDoc
     */
    public function doEstablish()
    {
        return $this->clientBuilder->setName($this->databaseName)->setHosts($this->hosts)->build();
    }

    /**
     * @param string $databaseName
     *
     * @return ElasticConnection
     */
    public function setDatabaseName(string $databaseName): ElasticConnection
    {
        $this->databaseName = $databaseName;

        return $this;
    }
}