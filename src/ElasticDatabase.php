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

use Elasticsearch\Transport;
use Vainyl\Core\IdentifiableInterface;
use Vainyl\Database\CursorInterface;
use Elasticsearch\Client;
use Vainyl\Database\DatabaseInterface;

/**
 * Class ElasticDatabase
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ElasticDatabase extends Client implements DatabaseInterface
{
    private $name;

    /**
     * ElasticDatabase constructor.
     *
     * @param string    $name
     * @param Transport $transport
     * @param callable  $endpoint
     * @param array     $registeredNamespaces
     */
    public function __construct(string $name, Transport $transport, callable $endpoint, array $registeredNamespaces)
    {
        $this->name = $name;
        parent::__construct($transport, $endpoint, $registeredNamespaces);
    }

    /**
     * @param IdentifiableInterface $obj
     *
     * @return bool
     */
    public function equals($obj): bool
    {
        return $this->getId() === $obj->getId();
    }

    /**
     * @inheritDoc
     */
    public function getId(): ?string
    {
        return spl_object_hash($this);
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @inheritDoc
     */
    public function hash()
    {
        return $this->getId();
    }

    /**
     * @inheritDoc
     */
    public function runQuery($query, array $bindParams = [], array $bindTypes = []): CursorInterface
    {
        return new ElasticCursor($this->get(['query' => $query, 'bindParams' => $bindParams]));
    }
}