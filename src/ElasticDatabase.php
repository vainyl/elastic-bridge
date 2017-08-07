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

use Vainyl\Database\AbstractDatabase;
use Vainyl\Database\CursorInterface;
use Elasticsearch\Client;

/**
 * Class ElasticDatabase
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 *
 * @method Client getConnection
 */
class ElasticDatabase extends AbstractDatabase
{
    /**
     * @inheritDoc
     */
    public function runQuery($query, array $bindParams = [], array $bindTypes = []): CursorInterface
    {
        return new ElasticCursor($this->getConnection()->get(['query' => $query, 'bindParams' => $bindParams]));
    }
}