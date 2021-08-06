<?php

namespace BuildTalent\Main\Classes;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Psr\Log\LoggerInterface;

/**
 * Class CorsMiddleware
 *
 * @package BuildTalent\Main\Classes;
 */
class CorsMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        /** @var Response $response */
        $response = $next($request);

        // Only handle default responses (no redirects)
        // Ignore non-html responses and backend responses
        if (!$this->isApiRequest($request)) {
            return $response;
        }

        /** @var LoggerInterface $logger */
        $logger = app('log');

        try {
            $response->header('Access-Control-Allow-Origin', '*');
            $response->header('Access-Control-Allow-Methods', 'GET, POST, PATCH, PUT, DELETE, OPTIONS');
            $response->header('Access-Control-Allow-Headers', 'Origin, Content-Type, X-Auth-Token, Authorization');

            $method = $_SERVER['REQUEST_METHOD'];
            // For preflight requests
            if ($method == "OPTIONS") {
                $response->setStatusCode(200);
            }
        } catch (\Throwable $e) {
            $logger->warning(
                '[BuildTalent.CorsMiddleware] Failed to set response header: ' . $e->getMessage(),
                ['exception' => $e]
            );
        }

        return $response;
    }

    protected function isApiRequest(Request $request)
    {
        if (!$request->is('api/*')) {
            return false;
        }

        return true;
    }
}
