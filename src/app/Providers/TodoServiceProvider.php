<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use Psr\Log\LoggerInterface;
use Todo\Application\Boundary\MailSender;
use Todo\Domain\Model\ActivityReport\ActivityReportFactory;
use Todo\Domain\Model\ActivityReport\ActivityReportRepository;
use Todo\Domain\Model\Password\PasswordResetNotificationSender;
use Todo\Domain\Model\Task\TaskFactory;
use Todo\Domain\Model\Task\TaskRepository;
use Todo\Domain\Model\User\UserFactory;
use Todo\Domain\Model\User\UserRepository;
use Todo\Infra\Domain\Model\ActivityReport\ConcreteActivityReportFactory;
use Todo\Infra\Domain\Model\ActivityReport\LogActivityReportRepository;
use Todo\Infra\Domain\Model\Password\MailPasswordResetNotificationSender;
use Todo\Infra\Domain\Model\Task\ConcreteTaskFactory;
use Todo\Infra\Domain\Model\Task\DbTaskRepository;
use Todo\Infra\Domain\Model\User\ConcreteUserFactory;
use Todo\Infra\Domain\Model\User\DbUserRepository;
use Todo\Infra\Gateway\LaravelMailSender;
use Todo\Infra\Lang\ConcreteUnitOfWork;
use Todo\Infra\Lang\SystemClock;
use Todo\Lang\Clock;
use Todo\Lang\UnitOfWork;

final class TodoServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $bindings = [
        ActivityReportFactory::class => ConcreteActivityReportFactory::class,
        ActivityReportRepository::class => LogActivityReportRepository::class,
        Clock::class => SystemClock::class,
        MailSender::class => LaravelMailSender::class,
        PasswordResetNotificationSender::class => MailPasswordResetNotificationSender::class,
        TaskFactory::class => ConcreteTaskFactory::class,
        TaskRepository::class => DbTaskRepository::class,
        UserFactory::class => ConcreteUserFactory::class,
        UserRepository::class => DbUserRepository::class,
        UnitOfWork::class => ConcreteUnitOfWork::class,
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->when(LogActivityReportRepository::class)
            ->needs(LoggerInterface::class)
            ->give(fn () => Log::channel('activity-report'));
    }

    /**
     * Get the services provided by the provider.
     */
    public function provides(): array
    {
        return array_keys($this->bindings);
    }
}
