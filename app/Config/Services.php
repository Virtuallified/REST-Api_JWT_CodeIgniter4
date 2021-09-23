<?php

namespace Config;

use CodeIgniter\Config\BaseService;

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
    public static function getSecretKey() 
    {
        return getenv('JWT_SECRET_KEY');
    } 

    public static function getPrivateKey()
    {
        $privateKey = <<<EOD
            -----BEGIN RSA PRIVATE KEY-----
            MIICdgIBADANBgkqhkiG9w0BAQEFAASCAmAwggJcAgEAAoGBAIl7uZdhwCmE0/xEJvxKn
            GJqNQWOPtysnoxTO0bG8yshacRQ54HyUGhAgQ/lIEGyWGwtjxAqcOKrAjvZHRMSaH4Hpz
            ZBcpLjEsk/Dv6PptDodPIBFJsmZeaCunerR8F115R4hUo5akamvwb4xbvR13SUBmYti0d
            zwIjojqVLwOu3AgMBAAECgYBGT9V52084rKrxsDU0AEB8gI6/WaFCoLGxWHvPVb5VR5Bd
            C3dq2O9QcfTPmUHm93wLTz2EagAznHvW+dHJyDdRxPhU0pG7CNvwXTveqtOLb1GY8PNt7
            f1tcwyb2+bvH37drjRwNwg+byZL2Qs0qPMPGj3DngkJGFyd53FYaFApGQJBAMfIOnWlC1
            18bbHl6eP1MOYhVSaT8e54apdMGB46eUTd1GYgAOjWpjmV94XAMxD3CXkKXbm39KeKQMv
            0r80/IAMCQQCwK6eQ4Tce4Wf0PW/BUK7AVbQZYfkIDuGdZtnA8/4fh9ozXCfnJaMatBnZ
            e9zv9XnIfvx0bnitwRVfYqtTMhk9AkEAr5GdHmoutLd2x1If279Me9FrPX3irQmR0uiCg
            X4tuIGh+SXC5txMNGtAnYAs4InY/1BG0cGB9gKfsx2TqbIB9QJADOXFSMgUPwCFmc39po
            t/n7kmjE0t7DcasWlcO9IhIrHReb0fdr68qDHTSqbU0ASKu/EADo4f66idJfSVUmvyiQJ
            AO1KRxc0ITtMQs59nxw4vRBW4t386jMpltqXMDkhrwkwsz3U1ympOL3jE5fvDdrKkYJl+
            D3L15nFypKm/GjjBfA==
            -----END RSA PRIVATE KEY-----
            EOD;
            // -----BEGIN PUBLIC KEY-----
            // MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCJe7mXYcAphNP8RCb8SpxiajUFjj7cr
            // J6MUztGxvMrIWnEUOeB8lBoQIEP5SBBslhsLY8QKnDiqwI72R0TEmh
            // -----END PUBLIC KEY-----
        return $privateKey;
    }
    
    /*
     * public static function example($getShared = true)
     * {
     *     if ($getShared) {
     *         return static::getSharedInstance('example');
     *     }
     *
     *     return new \CodeIgniter\Example();
     * }
     */
}
