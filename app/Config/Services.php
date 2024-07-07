<?php

namespace Config;

use App\Domain\Repositories\IAuthenticationRepository;
use App\Domain\Repositories\ISearchRepository;
use App\Domain\Repositories\ITokenRepository;
use App\Domain\Repositories\IUserCredentialRepository;
use App\Domain\Repositories\IUserRepository;
use App\Domain\Services\IJwt;
use App\Infrastructure\Services\Jwt;
use App\Infrastructure\Models\UserModel;
use App\Infrastructure\Models\UserCredentialModel;
use App\Infrastructure\Repositories\AuthenticationRepository;
use App\Infrastructure\Repositories\SearchRepository;
use App\Infrastructure\Repositories\TokenRepository;
use App\Infrastructure\Repositories\UserCredentialRepository;
use App\Infrastructure\Repositories\UserRepository;
use App\Infrastructure\Services\JwtAdapter;
use CodeIgniter\Config\BaseService;
use PhpParser\Node\Stmt\Static_;

/**
 * Services Configuration file.
 *
 * Services are simply other classes/libraries that the system uses
 * to do its job. This is used by CodeIgniter to allow the core of the
 * framework to be swapped out easily without affecting the usage within
 * the rest of your application.
 *
 * This file holds any application-specific services, or service overrides
 * that you might need. An example has been included with the general
 * method format you should use for your service methods. For more examples,
 * see the core Services file at system/Config/Services.php.
 */
class Services extends BaseService
{

    public static function userRepository($getShared = true): IUserRepository
    {
        if ($getShared) {
            return static::getSharedInstance('userRepository');
        }

        return new UserRepository(new UserModel());
    }

    public static function jwt($getShared = true): IJwt
    {
        if ($getShared) {
            return static::getSharedInstance("jwt");
        }
        return new Jwt($_ENV["SECRET_KEY"]);
    }

    public static function tokenRepository($getShared = true): ITokenRepository
    {
        if ($getShared) {
            return static::getSharedInstance("tokenRepository");
        }

        return new TokenRepository(static::jwt());
    }

    public static function userCredentialModel($getShared = true): UserCredentialModel
    {
        if ($getShared) {
            return static::getSharedInstance("userCredentialModel");
        }

        return new UserCredentialModel();
    }

    public static function userCredentialRepository($getShared =  true): IUserCredentialRepository
    {
        if ($getShared) {
            return static::getSharedInstance("userCredentialRepository");
        }
        return new UserCredentialRepository(static::userCredentialModel());
    }

    public static function authenticationRepository($getShared = true): IAuthenticationRepository
    {
        if ($getShared) {
            return static::getSharedInstance("authenticationRepository");
        }
        return new AuthenticationRepository(
            static::userRepository(),
            static::userCredentialRepository(),
            static::tokenRepository(),
        );
    }

    public static function searchRepository($getShared = false): ISearchRepository
    {
        if ($getShared) {
            return static::getSharedInstance("searchRepository");
        }

        return new SearchRepository(static::userRepository());
    }
}
