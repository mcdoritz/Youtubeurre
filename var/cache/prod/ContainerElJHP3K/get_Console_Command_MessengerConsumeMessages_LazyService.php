<?php

namespace ContainerElJHP3K;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_Console_Command_MessengerConsumeMessages_LazyService extends App_KernelProdContainer
{
    /*
     * Gets the private '.console.command.messenger_consume_messages.lazy' shared service.
     *
     * @return \Symfony\Component\Console\Command\LazyCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.console.command.messenger_consume_messages.lazy'] = new \Symfony\Component\Console\Command\LazyCommand('messenger:consume', [], 'Consume messages', false, #[\Closure(name: 'console.command.messenger_consume_messages', class: 'Symfony\\Component\\Messenger\\Command\\ConsumeMessagesCommand')] fn (): \Symfony\Component\Messenger\Command\ConsumeMessagesCommand => ($container->privates['console.command.messenger_consume_messages'] ?? $container->load('getConsole_Command_MessengerConsumeMessagesService')));
    }
}