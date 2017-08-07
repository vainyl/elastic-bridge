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
use Elasticsearch\ClientBuilder;
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
    private $hosts;

    /**
     * ElasticConnection constructor.
     *
     * @param string $name
     * @param array  $hosts
     */
    public function __construct(string $name, array $hosts)
    {
        $this->hosts = $hosts;
        parent::__construct($name);
    }

    /**
     * @inheritDoc
     */
    public function doEstablish()
    {
        return ClientBuilder::fromConfig(['hosts' => $this->hosts]);
    }
}