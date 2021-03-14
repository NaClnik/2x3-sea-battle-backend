<?php


namespace Core\Models;


class ExceptionHandlerValuePair
{
    // Поля класса.
    private string $type;
    private $handler;

    // Конструктор.
    public function __construct(string $type, $handler)
    {
        $this->type = $type;
        $this->handler = $handler;
    } // __construct.

    #region Аксессоры класса
    // Аксессоры класса.
    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getHandler()
    {
        return $this->handler;
    }

    /**
     * @param mixed $handler
     */
    public function setHandler($handler): void
    {
        $this->handler = $handler;
    }
    #endregion
} // ExceptionHandlerValuePair.