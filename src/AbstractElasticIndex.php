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
}