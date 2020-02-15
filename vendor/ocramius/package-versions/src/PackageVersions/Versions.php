<?php

declare(strict_types=1);

namespace PackageVersions;

/**
 * This class is generated by ocramius/package-versions, specifically by
 * @see \PackageVersions\Installer
 *
 * This file is overwritten at every run of `composer install` or `composer update`.
 */
final class Versions
{
    public const ROOT_PACKAGE_NAME = '__root__';
    /**
     * Array of all available composer packages.
     * Dont read this array from your calling code, but use the \PackageVersions\Versions::getVersion() method instead.
     *
     * @var array<string, string>
     * @internal
     */
    public const VERSIONS          = array (
  'api-platform/api-pack' => 'v1.2.1@41364f8763475d7709c43f790aa77a4157d038e2',
  'api-platform/core' => 'v2.5.4@14ed547d10a23dcd5c852e24948e661aee48492e',
  'doctrine/annotations' => 'v1.8.0@904dca4eb10715b92569fbcd79e201d5c349b6bc',
  'doctrine/cache' => '1.10.0@382e7f4db9a12dc6c19431743a2b096041bcdd62',
  'doctrine/collections' => '1.6.4@6b1e4b2b66f6d6e49983cebfe23a21b7ccc5b0d7',
  'doctrine/common' => '2.12.0@2053eafdf60c2172ee1373d1b9289ba1db7f1fc6',
  'doctrine/dbal' => 'v2.10.1@c2b8e6e82732a64ecde1cddf9e1e06cb8556e3d8',
  'doctrine/doctrine-bundle' => '2.0.7@6926771140ee87a823c3b2c72602de9dda4490d3',
  'doctrine/doctrine-migrations-bundle' => '2.1.2@856437e8de96a70233e1f0cc2352fc8dd15a899d',
  'doctrine/event-manager' => '1.1.0@629572819973f13486371cb611386eb17851e85c',
  'doctrine/inflector' => '1.3.1@ec3a55242203ffa6a4b27c58176da97ff0a7aec1',
  'doctrine/instantiator' => '1.3.0@ae466f726242e637cebdd526a7d991b9433bacf1',
  'doctrine/lexer' => '1.2.0@5242d66dbeb21a30dd8a3e66bf7a73b66e05e1f6',
  'doctrine/migrations' => '2.2.1@a3987131febeb0e9acb3c47ab0df0af004588934',
  'doctrine/orm' => 'v2.7.0@4d763ca4c925f647b248b9fa01b5f47aa3685d62',
  'doctrine/persistence' => '1.3.6@5dd3ac5eebef2d0b074daa4440bb18f93132dee4',
  'doctrine/reflection' => 'v1.1.0@bc420ead87fdfe08c03ecc3549db603a45b06d4c',
  'fig/link-util' => '1.1.0@47f55860678a9e202206047bc02767556d298106',
  'jdorn/sql-formatter' => 'v1.2.17@64990d96e0959dff8e059dfcdc1af130728d92bc',
  'laminas/laminas-code' => '3.4.1@1cb8f203389ab1482bf89c0e70a04849bacd7766',
  'laminas/laminas-eventmanager' => '3.2.1@ce4dc0bdf3b14b7f9815775af9dfee80a63b4748',
  'laminas/laminas-zendframework-bridge' => '1.0.1@0fb9675b84a1666ab45182b6c5b29956921e818d',
  'lcobucci/jwt' => '3.3.1@a11ec5f4b4d75d1fcd04e133dede4c317aac9e18',
  'lexik/jwt-authentication-bundle' => 'v2.6.5@448551fc08c6cff37aad9d8f27f6b9615cd28966',
  'namshi/jose' => '7.2.3@89a24d7eb3040e285dd5925fcad992378b82bcff',
  'nelmio/cors-bundle' => '2.0.1@9683e6d30d000ef998919261329d825de7c53499',
  'ocramius/package-versions' => '1.5.1@1d32342b8c1eb27353c8887c366147b4c2da673c',
  'ocramius/proxy-manager' => '2.6.1@dec37bfb3c3594440ee4fa263494189344787d22',
  'phpdocumentor/reflection-common' => '2.0.0@63a995caa1ca9e5590304cd845c15ad6d482a62a',
  'phpdocumentor/reflection-docblock' => '4.3.4@da3fd972d6bafd628114f7e7e036f45944b62e9c',
  'phpdocumentor/type-resolver' => '1.0.1@2e32a6d48972b2c1976ed5d8967145b6cec4a4a9',
  'psr/cache' => '1.0.1@d11b50ad223250cf17b86e38383413f5a6764bf8',
  'psr/container' => '1.0.0@b7ce3b176482dbbc1245ebf52b181af44c2cf55f',
  'psr/link' => '1.0.0@eea8e8662d5cd3ae4517c9b864493f59fca95562',
  'psr/log' => '1.1.2@446d54b4cb6bf489fc9d75f55843658e6f25d801',
  'symfony/asset' => 'v4.4.3@2c67c89d064bfb689ea6bc41217c87100bb94c17',
  'symfony/cache' => 'v4.4.3@31e57957c43da2351299978aa52c44a53a89ef73',
  'symfony/cache-contracts' => 'v2.0.1@23ed8bfc1a4115feca942cb5f1aacdf3dcdf3c16',
  'symfony/config' => 'v4.4.4@4d3979f54472637169080f802dc82197e21fdcce',
  'symfony/console' => 'v4.4.3@e9ee09d087e2c88eaf6e5fc0f5c574f64d100e4f',
  'symfony/debug' => 'v4.4.4@20236471058bbaa9907382500fc14005c84601f0',
  'symfony/dependency-injection' => 'v4.4.4@ec60a7d12f5e8ab0f99456adce724717d9c1784a',
  'symfony/doctrine-bridge' => 'v4.4.3@0755dfc0a9815e5a5e4050e2a671ccad9a8bfffa',
  'symfony/dotenv' => 'v4.4.3@b74a1638f53e3c65e4bbfc2a03c23fdc400fd243',
  'symfony/error-handler' => 'v4.4.4@d2721499ffcaf246a743e01cdf6696d3d5dd74c1',
  'symfony/event-dispatcher' => 'v4.4.4@9e3de195e5bc301704dd6915df55892f6dfc208b',
  'symfony/event-dispatcher-contracts' => 'v1.1.7@c43ab685673fb6c8d84220c77897b1d6cdbe1d18',
  'symfony/expression-language' => 'v4.4.3@8b145496d7e2e7103b1a1b8f1fce81c6e084b380',
  'symfony/filesystem' => 'v4.4.4@266c9540b475f26122b61ef8b23dd9198f5d1cfd',
  'symfony/finder' => 'v4.4.3@3a50be43515590faf812fbd7708200aabc327ec3',
  'symfony/flex' => 'v1.6.1@c497c0c77cb9018cccd9c092832ebf9826612f92',
  'symfony/framework-bundle' => 'v4.4.3@427849319016364de98cf1e03f5c52fd77ec5a91',
  'symfony/http-foundation' => 'v4.4.4@491a20dfa87e0b3990170593bc2de0bb34d828a5',
  'symfony/http-kernel' => 'v4.4.4@62116a9c8fb15faabb158ad9cb785c353c2572e5',
  'symfony/inflector' => 'v4.4.4@f419ab2853cc00471ffd7fc18e544b5f5a90adb1',
  'symfony/mime' => 'v4.4.4@225034620ecd4b34fd826e9983d85e2b7a359094',
  'symfony/orm-pack' => 'v1.0.7@c57f5e05232ca40626eb9fa52a32bc8565e9231c',
  'symfony/polyfill-intl-idn' => 'v1.13.1@6f9c239e61e1b0c9229a28ff89a812dc449c3d46',
  'symfony/polyfill-mbstring' => 'v1.13.1@7b4aab9743c30be783b73de055d24a39cf4b954f',
  'symfony/polyfill-php72' => 'v1.13.1@66fea50f6cb37a35eea048d75a7d99a45b586038',
  'symfony/polyfill-php73' => 'v1.13.1@4b0e2222c55a25b4541305a053013d5647d3a25f',
  'symfony/property-access' => 'v4.4.4@090b4bc92ded1ec512f7e2ed1691210769dffdb3',
  'symfony/property-info' => 'v4.4.3@e6355ba81c738be31c3c3b3cd7929963f98da576',
  'symfony/routing' => 'v4.4.3@7bf4e38573728e317b926ca4482ad30470d0e86a',
  'symfony/security-bundle' => 'v4.4.3@99ac9cd1735fbfec88e5e7cf55ed7fa046cb456e',
  'symfony/security-core' => 'v4.4.3@b2c02d5204f1eac0fb6497a7a479312d499fca31',
  'symfony/security-csrf' => 'v4.4.3@da4664d94164e2b50ce75f2453724c6c33222505',
  'symfony/security-guard' => 'v4.4.3@f457f2d6d7392259b1ede1d036a26b6c1fa20202',
  'symfony/security-http' => 'v4.4.3@3a872eac6be8e446592f72bddcbd293d831a1e1a',
  'symfony/serializer' => 'v4.4.3@76ecc214a93b763c29b924277e85f64326f9fbb2',
  'symfony/service-contracts' => 'v2.0.1@144c5e51266b281231e947b51223ba14acf1a749',
  'symfony/stopwatch' => 'v4.4.3@abc08d7c48987829bac301347faa10f7e8bbf4fb',
  'symfony/translation' => 'v4.4.4@f5d2ac46930238b30a9c2f1b17c905f3697d808c',
  'symfony/translation-contracts' => 'v2.0.1@8cc682ac458d75557203b2f2f14b0b92e1c744ed',
  'symfony/twig-bridge' => 'v4.4.3@d5f3e83e2cc2fcdd60c351b5be1beb9533cf698c',
  'symfony/twig-bundle' => 'v4.4.3@d3e3e46e9e683e946746219570299ba07506260a',
  'symfony/validator' => 'v4.4.3@2f3ec17a371cc56b3a2855b5eae0702f70611e81',
  'symfony/var-dumper' => 'v4.4.4@46b53fd714568af343953c039ff47b67ce8af8d6',
  'symfony/var-exporter' => 'v4.4.3@1a76a943f2af334da13bc9f33f49392fa530eec9',
  'symfony/web-link' => 'v4.4.3@dad60d94b2e7f16e1a7d0ebd0f1f460f45a51386',
  'symfony/yaml' => 'v4.4.3@cd014e425b3668220adb865f53bff64b3ad21767',
  'twig/twig' => 'v3.0.1@28f856a4c57eeb24485916e8a68403f41a133616',
  'webimpress/safe-writer' => '2.0.0@d03bea3b98abe1d4c8b24cbebf524361ffaafee4',
  'webmozart/assert' => '1.6.0@573381c0a64f155a0d9a23f4b0c797194805b925',
  'willdurand/negotiation' => 'v2.3.1@03436ededa67c6e83b9b12defac15384cb399dc9',
  'doctrine/data-fixtures' => '1.4.2@39e9777c9089351a468f780b01cffa3cb0a42907',
  'doctrine/doctrine-fixtures-bundle' => '3.3.0@8f07fcfdac7f3591f3c4bf13a50cbae05f65ed70',
  'nikic/php-parser' => 'v4.3.0@9a9981c347c5c49d6dfe5cf826bb882b824080dc',
  'symfony/maker-bundle' => 'v1.14.3@c864e7f9b8d1e1f5f60acc3beda11299f637aded',
  'symfony/process' => 'v4.4.3@f5697ab4cb14a5deed7473819e63141bf5352c36',
  'symfony/web-server-bundle' => 'v4.4.3@92a37564d8577f01a21e7a77dab2f4fcad32f4ba',
  'paragonie/random_compat' => '2.*@',
  'symfony/polyfill-ctype' => '*@',
  'symfony/polyfill-iconv' => '*@',
  'symfony/polyfill-php71' => '*@',
  'symfony/polyfill-php70' => '*@',
  'symfony/polyfill-php56' => '*@',
  '__root__' => 'No version set (parsed as 1.0.0)@',
);

    private function __construct()
    {
    }

    /**
     * @throws \OutOfBoundsException If a version cannot be located.
     *
     * @psalm-param key-of<self::VERSIONS> $packageName
     */
    public static function getVersion(string $packageName) : string
    {
        if (isset(self::VERSIONS[$packageName])) {
            return self::VERSIONS[$packageName];
        }

        throw new \OutOfBoundsException(
            'Required package "' . $packageName . '" is not installed: check your ./vendor/composer/installed.json and/or ./composer.lock files'
        );
    }
}
