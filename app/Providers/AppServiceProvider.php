<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\AboutSection;
use App\Models\AboutValue;
use App\Models\AdmissionApplication;
use App\Models\AdmissionDocument;
use App\Models\AdmissionKeyDate;
use App\Models\AdmissionStep;
use App\Models\ContactMessage;
use App\Models\ContentBlock;
use App\Models\HeroSlide;
use App\Models\HeroStat;
use App\Models\Lab;
use App\Models\Menu;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\Page;
use App\Models\Partner;
use App\Models\Program;
use App\Models\Publication;
use App\Models\SiteSetting;
use App\Models\SocialLink;
use App\Models\StatNumber;
use App\Models\Testimonial;
use App\Policies\AboutSectionPolicy;
use App\Policies\AboutValuePolicy;
use App\Policies\ActivityPolicy;
use App\Policies\AdmissionApplicationPolicy;
use App\Policies\AdmissionDocumentPolicy;
use App\Policies\AdmissionKeyDatePolicy;
use App\Policies\AdmissionStepPolicy;
use App\Policies\ContactMessagePolicy;
use App\Policies\ContentBlockPolicy;
use App\Policies\HeroSlidePolicy;
use App\Policies\HeroStatPolicy;
use App\Policies\LabPolicy;
use App\Policies\NewsCategoryPolicy;
use App\Policies\NewsPolicy;
use App\Policies\PagePolicy;
use App\Policies\PartnerPolicy;
use App\Policies\PermissionPolicy;
use App\Policies\ProgramPolicy;
use App\Policies\PublicationPolicy;
use App\Policies\RolePolicy;
use App\Policies\SiteSettingPolicy;
use App\Policies\SocialLinkPolicy;
use App\Policies\StatNumberPolicy;
use App\Policies\TestimonialPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Spatie\Activitylog\Models\Activity;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Gate::before(fn ($user, string $ability) => $user->hasRole('super-admin') ? true : null);

        Gate::policy(Role::class, RolePolicy::class);
        Gate::policy(Permission::class, PermissionPolicy::class);
        Gate::policy(Activity::class, ActivityPolicy::class);

        Gate::policy(Page::class, PagePolicy::class);
        Gate::policy(HeroSlide::class, HeroSlidePolicy::class);
        Gate::policy(HeroStat::class, HeroStatPolicy::class);
        Gate::policy(AboutSection::class, AboutSectionPolicy::class);
        Gate::policy(AboutValue::class, AboutValuePolicy::class);
        Gate::policy(ContentBlock::class, ContentBlockPolicy::class);
        Gate::policy(StatNumber::class, StatNumberPolicy::class);
        Gate::policy(Program::class, ProgramPolicy::class);
        Gate::policy(Lab::class, LabPolicy::class);
        Gate::policy(Partner::class, PartnerPolicy::class);
        Gate::policy(NewsCategory::class, NewsCategoryPolicy::class);
        Gate::policy(News::class, NewsPolicy::class);
        Gate::policy(Publication::class, PublicationPolicy::class);
        Gate::policy(AdmissionStep::class, AdmissionStepPolicy::class);
        Gate::policy(AdmissionDocument::class, AdmissionDocumentPolicy::class);
        Gate::policy(AdmissionKeyDate::class, AdmissionKeyDatePolicy::class);
        Gate::policy(AdmissionApplication::class, AdmissionApplicationPolicy::class);
        Gate::policy(Testimonial::class, TestimonialPolicy::class);
        Gate::policy(SocialLink::class, SocialLinkPolicy::class);
        Gate::policy(ContactMessage::class, ContactMessagePolicy::class);
        Gate::policy(SiteSetting::class, SiteSettingPolicy::class);

        View::composer('*', function ($view): void {
            $view->with([
                'settings' => SiteSetting::current(),
                'topbarSocialLinks' => SocialLink::active()->location('topbar')->get(),
                'footerSocialLinks' => SocialLink::active()->location('footer')->get(),
                'footerPages' => Page::query()->published()->whereIn('slug', ['nizom', 'litsenziya', 'kadrlar-bolimi'])->get(),
                'headerMenus' => Menu::query()
                    ->location('header')
                    ->whereNull('parent_id')
                    ->where('is_active', true)
                    ->with(['children' => fn ($query) => $query->where('is_active', true)->orderBy('order')])
                    ->orderBy('order')
                    ->get(),
            ]);
        });
    }
}
