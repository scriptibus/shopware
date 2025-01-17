<?php declare(strict_types=1);

namespace Shopware\Tests\Integration\Storefront\Theme\fixtures;

use Shopware\Core\System\SystemConfig\SystemConfigService;
use Shopware\Storefront\Theme\Event\ThemeCompilerEnrichScssVariablesEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * @internal
 */
class MockThemeVariablesSubscriber implements EventSubscriberInterface
{
    protected SystemConfigService $systemConfig;

    public function __construct(SystemConfigService $systemConfig)
    {
        $this->systemConfig = $systemConfig;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            ThemeCompilerEnrichScssVariablesEvent::class => 'onAddVariables',
        ];
    }

    public function onAddVariables(ThemeCompilerEnrichScssVariablesEvent $event): void
    {
        $event->addVariable('mock-variable-black', '#000000');
        $event->addVariable('mock-variable-special', 'Special value with quotes', true);
    }
}
