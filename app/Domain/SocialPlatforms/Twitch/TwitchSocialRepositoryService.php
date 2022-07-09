<?php

namespace Domain\SocialPlatforms\Twitch;

use Domain\SocialPlatforms\Twitch\Entity\TwitchUserTokenEntity;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

class TwitchSocialRepositoryService
{
    private const TWITCH_AUTH_URL = "TWITCH_AUTH_URL";
    private const TWITCH_RESPONSE_TYPE_TOKEN = 'token';
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function createTwitchAuthorizationUrl(): string
    {
        return env(self::TWITCH_AUTH_URL) . '?'.http_build_query($this->getTwitchAuthorizationParams());
    }

    private function getTwitchAuthorizationParams(): array
    {
        return [
            "client_id" => env("TWITCH_CLIENT_ID"),
            "redirect_uri" => env("TWITCH_REDIRECT_URL"),
            "scope" => "user:read:email",
            "response_type" => 'code',
        ];
    }

    public function getUserTokenFromTwitch(string $accessToken): ?TwitchUserTokenEntity
    {
        $response = $this->client->post(env("TWITCH_TOKEN_URL"), [
            'json' => [
                'client_id' => env("TWITCH_CLIENT_ID"),
                'client_secret' => env("TWITCH_SECRET_ID"),
                'code' => $accessToken,
                'grant_type' => 'authorization_code',
                'redirect_uri' => env("TWITCH_REDIRECT_URL")
            ]
        ]);
        if ($response->getStatusCode() != 200) {
            return null;
        }
        $response = json_decode($response->getBody()->getContents(), false);

        return (new TwitchUserTokenEntity())->setAccessToken($response->access_token)->setRefreshToken(
            $response->refresh_token
        )->setExpireTime($response->expires_in);
    }
}
