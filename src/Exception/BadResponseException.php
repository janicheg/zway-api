<?php

namespace ZWayApi\Exception;

use Psr\Http\Message\ResponseInterface;

/**
 * Class BadResponseException
 * @package ZWayApi\Exception
 */
class BadResponseException extends \Exception
{
    /**
     * BadResponseException constructor.
     * @param ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        parent::__construct(
            sprintf(
                'Failed to get response from z-way server, response: %s ',
                $response->getBody()->getContents()
            ),
            $response->getStatusCode()
        );
    }
}