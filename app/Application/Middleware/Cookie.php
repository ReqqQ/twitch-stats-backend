<?php

namespace Application\Middleware;

use Closure;
use Domain\UsersToken\Entity\UsersTokenEntity;
use Domain\UsersToken\UsersTokenService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie as CookieQueue;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Cookie\CookieJar;
class Cookie
{
    private UsersTokenService $usersTokenService;
    private UsersTokenEntity $usersTokenEntity;
    private CookieJar $cookieJar;

    public function __construct(UsersTokenService $usersTokenService,CookieJar $cookieJar)
    {
        $this->usersTokenService = $usersTokenService;
        $this->cookieJar = $cookieJar;
    }

    /**
     * @param  Request  $request
     * @param  Closure  $next
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        /**
         * @var UsersTokenEntity $userTokenEntity
         */

        if ($request->hasCookie(UsersTokenService::USER_TOKEN) && $this->isTokenUserExists($request->cookie(UsersTokenService::USER_TOKEN)) && !$this->isTokenExpired()) {
            return $next($request);
        }
        CookieQueue::queue(
            $this->cookieJar->forget(UsersTokenService::USER_TOKEN)
        );
        return Redirect::to('/');
    }

    private function isTokenExpired(): bool
    {
        return $this->usersTokenEntity->getExpireAt() < time() ;
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
