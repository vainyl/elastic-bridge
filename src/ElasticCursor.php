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

use Vainyl\Database\CursorInterface;

/**
 * Class ElasticCursor
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ElasticCursor implements CursorInterface
{
    private $mode = 0;

    private $data;

    /**
     * ElasticCursor constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @inheritDoc
     */
    public function count()
    {
        return count($this->data);
    }

    /**
     * @inheritDoc
     */
    public function current()
    {
        return current($this->data);
    }

    /**
     * @inheritDoc
     */
    public function next()
    {
        return next($this->data);
    }

    /**
     * @inheritDoc
     */
    public function key()
    {
        return key($this->data);
    }

    /**
     * @inheritDoc
     */
    public function valid()
    {
        return null !== $this->key();
    }

    /**
     * @inheritDoc
     */
    public function rewind()
    {
        reset($this->data);
    }

    /**
     * @inheritDoc
     */
    public function close(): CursorInterface
    {
        $this->data = [];

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function mode(int $mode): CursorInterface
    {
        $this->mode = $mode;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getSingle(): array
    {
        return array_shift($this->data);
    }

    /**
     * @inheritDoc
     */
    public function getAll(): array
    {
        return $this->data;
    }
}