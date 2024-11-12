<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Models\DanhMuc;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // Chia sẻ danh sách danh mục với view clients.block.header
        View::composer('clients.block.header', function ($view) {
            $danhMucs = DanhMuc::all(); // Lấy tất cả danh mục
            $view->with('danhMucs', $danhMucs);
        });
        View::composer('layouts.client', function ($view) {
            $danhMucs = DanhMuc::all(); // Lấy tất cả danh mục
            $view->with('danhMucs', $danhMucs);
        });
    }
}
