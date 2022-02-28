<?php

namespace App\Http\Controllers;

use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;
use Phpfastcache\Exceptions\PhpfastcacheDriverCheckException;
use Phpfastcache\Exceptions\PhpfastcacheDriverException;
use Phpfastcache\Exceptions\PhpfastcacheDriverNotFoundException;
use Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException;
use Phpfastcache\Exceptions\PhpfastcacheInvalidConfigurationException;
use Phpfastcache\Exceptions\PhpfastcacheLogicException;
use Phpfastcache\Exceptions\PhpfastcacheSimpleCacheException;
use Phpfastcache\Helper\Psr16Adapter;
use Psr\Cache\InvalidArgumentException;
use ReflectionException;

class UserController
{
    private string $keyJWT;
    private string $email;
    private string $password;
    private Psr16Adapter $cache;

    /**
     * @throws PhpfastcacheDriverNotFoundException
     * @throws PhpfastcacheInvalidConfigurationException
     * @throws PhpfastcacheDriverCheckException
     * @throws ReflectionException
     * @throws PhpfastcacheLogicException
     * @throws PhpfastcacheDriverException
     * @throws PhpfastcacheInvalidArgumentException
     */
    public function __construct()
    {
        $this->keyJWT = 'ls';
        $this->email = 'test@ls.com';
        $this->password = '123456';
        $defaultDriver = 'Files';
        $this->cache = new Psr16Adapter($defaultDriver);
    }

    /**
     * @param Request $request
     * @return array|false
     * @throws PhpfastcacheSimpleCacheException
     * @throws InvalidArgumentException
     */
    public function login(Request $request)
    {
        if ($request->email === $this->email && $request->password === $this->password) {
            $payload = array(
                "email" => $request->email,
                "password" => $request->password,
            );
            $data['token'] = JWT::encode($payload, $this->keyJWT, 'HS256');
            $this->cache->set('token', $data['token'], 30);
            return $data;
        }
        return false;
    }

    /**
     * @param Request $request
     * @return void
     * @throws InvalidArgumentException
     * @throws PhpfastcacheSimpleCacheException
     */
    public function logout(Request $request)
    {
        $this->cache->set('token', '', 0);
    }

    /**
     * @param $token
     * @return bool
     */
    public function checkJWT($token = null): bool
    {
        if ($token !== null) {
            $decoded = JWT::decode($token, new Key($this->keyJWT, 'HS256'));
            if ($decoded->email === $this->email && $decoded->password === $this->password) {
                return true;
            }
        }
        return false;
    }

    /**
     * @return mixed|void|null
     * @throws InvalidArgumentException
     * @throws Exception
     */
    public function verifyToken()
    {
        try {
            if ($this->cache->has('token')) {
                return $this->cache->get('token');
            }
        } catch (Exception $exception) {
            throw new Exception($exception);
        }
    }
}
