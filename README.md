API REST with symfony 3.3
========================

What's inside?
--------------

The Symfony Standard Edition is configured with the following defaults:

  * An AppBundle you can use to start coding;

  * Twig as the only configured template engine;

  * Doctrine ORM/DBAL;

  * Swiftmailer;

  * Annotations enabled for everything.

It comes pre-configured with the following bundles:

  * **FrameworkBundle** - The core Symfony framework bundle

  * [**SensioFrameworkExtraBundle**][6] - Adds several enhancements, including
    template and routing annotation capability

  * [**DoctrineBundle**][7] - Adds support for the Doctrine ORM

  * [**TwigBundle**][8] - Adds support for the Twig templating engine

  * [**SecurityBundle**][9] - Adds security by integrating Symfony's security
    component

  * [**SwiftmailerBundle**][10] - Adds support for Swiftmailer, a library for
    sending emails

  * [**MonologBundle**][11] - Adds support for Monolog, a logging library

  * **WebProfilerBundle** (in dev/test env) - Adds profiling functionality and
    the web debug toolbar

  * **SensioDistributionBundle** (in dev/test env) - Adds functionality for
    configuring and working with Symfony distributions

  * [**SensioGeneratorBundle**][13] (in dev env) - Adds code generation
    capabilities

  * [**WebServerBundle**][14] (in dev env) - Adds commands for running applications
    using the PHP built-in web server

  * **DebugBundle** (in dev/test env) - Adds Debug and VarDumper component
    integration
    
  * [**StofDoctrineExtensionsBundle**][15] This bundle allows to easily use DoctrineExtensions in your Symfony project by configuring it through a ListenerManager and the DIC.

  * [**FOSRestBundle**] [16] - Adds rest functionality
  
  * [**FOSUserBundle**] [17] - Adds user-bundle
  
  * [**NelmioCorsBundle**] [18] - The NelmioCorsBundle allows you to send Cross-Origin Resource Sharing headers with ACL-style per-URL configuration.

  * [**JMSSerializerBundle**] [19] - JMSSerializerBundle allows you to serialize your data into a requested output format such as JSON, XML, or YAML, and vice versa.
  
  * [**LexikJWTAuthenticationBundle**] [20] - This bundle requires Symfony 2.8+ (and the OpenSSL library if you intend to use the default provided encoder).
  
  * [**NelmioApiDocBundle**] [21] (in dev/test env) - Generates documentation for your REST API from annotations
  
All libraries and bundles included in the Symfony Standard Edition are
released under the MIT or BSD license.

Enjoy!

php bin/console doctrine:schema:update --dump-sql --force

[1]:  https://symfony.com/doc/3.3/setup.html
[6]:  https://symfony.com/doc/current/bundles/SensioFrameworkExtraBundle/index.html
[7]:  https://symfony.com/doc/3.3/doctrine.html
[8]:  https://symfony.com/doc/3.3/templating.html
[9]:  https://symfony.com/doc/3.3/security.html
[10]: https://symfony.com/doc/3.3/email.html
[11]: https://symfony.com/doc/3.3/logging.html
[13]: https://symfony.com/doc/current/bundles/SensioGeneratorBundle/index.html
[14]: https://symfony.com/doc/current/setup/built_in_web_server.html
[15]: https://symfony.com/doc/master/bundles/StofDoctrineExtensionsBundle/index.html
[16]: https://github.com/FriendsOfSymfony/FOSRestBundle
[17]: https://symfony.com/doc/master/bundles/FOSUserBundle/index.html
[18]: https://github.com/nelmio/NelmioCorsBundle
[19]: http://jmsyst.com/bundles/JMSSerializerBundle
[20]: https://github.com/lexik/LexikJWTAuthenticationBundle/blob/master/Resources/doc/index.md#getting-started
[21]: https://github.com/nelmio/NelmioApiDocBundle