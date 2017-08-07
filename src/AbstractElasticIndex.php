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
use Vainyl\Search\IndexInterface;

/**
 * Class AbstractElasticIndex
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractElasticIndex extends AbstractIdentifiable implements IndexInterface
{
    private $connection;

    /**
     * AbstractElasticIndex constructor.
     *
     * @param ElasticConnection $connection
     */
    public function __construct(ElasticConnection $connection)
    {
        $this->connection = $connection;
    }
}