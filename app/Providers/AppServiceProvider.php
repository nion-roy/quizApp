<?php

namespace App\Providers;

use App\Repositories\SubjectRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\DepartmentRepository;
use App\Repositories\Interfaces\SubjectRepositoryInterface;
use App\Repositories\Interfaces\DepartmentRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   */
  public function register(): void
  {
    $this->app->bind(SubjectRepositoryInterface::class, SubjectRepository::class);
    $this->app->bind(DepartmentRepositoryInterface::class, DepartmentRepository::class);
  }

  /**
   * Bootstrap any application services.
   */
  public function boot(): void
  {
    //
  }
}
