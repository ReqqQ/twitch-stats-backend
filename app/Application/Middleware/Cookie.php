<?php

namespace Application\Middleware;

use Closure;
use Domain\UsersToken\Entity\UsersTokenEntity;
use Domain\UsersToken\UsersTokenService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Infrastructure\UsersToken\UsersTokenDbRepository;

class Cookie
{
    private UsersTokenService $usersTokenService;
    private UsersTokenEntity $usersTokenEntity;

    public function __construct(UsersTokenService $usersTokenService)
    {
        $this->usersTokenService = $usersTokenService;
    }

    /**
     * @param  Request  $request
     * @param  Closure  $next
     * @return \Illuminate\Http\Response
     */
    public function handle(Request $request, Closure $next)
    {
        /**
         * @var UsersTokenEntity $userTokenEntity
         */

        if ($request->hasCookie(UsersTokenService::USER_TOKEN) && $this->isTokenUserExists($request->cookie(UsersTokenService::USER_TOKEN)) && !$this->isTokenExpired()) {
            return $next($request);
        }

        return response()->view('pages.home');
    }

    private function isTokenExpired(): bool
    {
        return time() > $this->usersTokenEntity->getExpireAt();
    }

    private function isTokenUserExists(?string $cookieToken): bool
    {
        if (!$cookieToken) {
            return false;
        }
        $userTokenEntity = $this->usersTokenService->getUserByToken($cookieToken);
        if (!$userTokenEntity) {
            return false;
        }
        $this->usersTokenEntity = $userTokenEntity;

        return true;
    }
}
