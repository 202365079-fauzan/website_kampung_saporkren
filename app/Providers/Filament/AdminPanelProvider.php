<?php

namespace App\Providers\Filament;

use App\Filament\Widgets\SaporkrenStatsOverview;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\View\PanelsRenderHook;
use Filament\Widgets\AccountWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\HtmlString;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('admin')
            ->path('adminsaporkren')
            ->login(\App\Filament\Pages\Auth\Login::class)
            ->registration(false)
            ->brandName('Kampung Saporkren - Admin Panel')
            ->font('Momo Trust Display')
            ->sidebarCollapsibleOnDesktop()
            ->colors([
                'primary' => Color::Sky,      // Ocean Blue (#0ea5e9)
                'success' => Color::Emerald,  // Tropical Green (#10b981)
                'warning' => Color::Amber,    // Sand Amber (#f59e0b)
                'danger'  => Color::Rose,
                'info'    => Color::Cyan,
                'gray'    => Color::Slate,    // Dark Slate
            ])
            ->renderHook(
                PanelsRenderHook::HEAD_END,
                fn (): HtmlString => new HtmlString('
                    <style>
                        @import url("https://fonts.googleapis.com/css2?family=Momo+Trust+Display&display=swap");
                        
                        /* Custom Top Bar Gradient Accent Line */
                        .fi-topbar {
                            border-top: 3px solid transparent !important;
                            border-image: linear-gradient(to right, #0ea5e9, #10b981, #f59e0b) 1 !important;
                        }

                        /* Sleek Rounded Cards & Inputs */
                        .fi-section, .fi-wi-widget-content, .fi-ta-content {
                            border-radius: 0.875rem !important;
                        }

                        /* Custom Active Navigation Accent */
                        .fi-sidebar-item-active > a {
                            background: linear-gradient(135deg, rgba(14, 165, 233, 0.12), rgba(16, 185, 129, 0.08)) !important;
                            border-left: 3px solid #0ea5e9 !important;
                        }
                    </style>
                ')
            )
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                SaporkrenStatsOverview::class,
                AccountWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}

