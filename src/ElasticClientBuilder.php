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

use Elasticsearch\ClientBuilder;
use Elasticsearch\Transport;

/**
 * Class ElasticClientBuilder
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ElasticClientBuilder extends ClientBuilder
{
    private $name;

    /**
     * @param string $name
     *
     * @return ElasticClientBuilder
     */
    public function setName(string $name) : ElasticClientBuilder
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @inheritDoc
     */
    protected function instantiate(Transport $transport, callable $endpoint, array $registeredNamespaces)
    {
        return new ElasticDatabase($this->name, $transport, $endpoint, $registeredNamespaces);
    }
}