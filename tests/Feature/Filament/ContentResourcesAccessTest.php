<?php

declare(strict_types=1);

use App\Models\User;

dataset('content_resource_paths', [
    'admin/hero-slides',
    'admin/hero-stats',
    'admin/about-values',
    'admin/content-blocks',
    'admin/stat-numbers',
    'admin/programs',
    'admin/labs',
    'admin/news-categories',
    'admin/news',
    'admin/publications',
    'admin/admission-steps',
    'admin/admission-documents',
    'admin/admission-key-dates',
    'admin/admission-applications',
    'admin/testimonials',
    'admin/pages',
    'admin/partners',
    'admin/social-links',
    'admin/contact-messages',
    'admin/manage-about-section',
    'admin/settings/manage-site-settings',
]);

it('allows a super-admin to view each content module', function (string $path) {
    $this->actingAs(superAdmin());

    $this->get($path)->assertOk();
})->with('content_resource_paths');

it('denies a permission-less user from viewing each content module', function (string $path) {
    $this->actingAs(User::factory()->withRole('user')->create());

    $this->get($path)->assertForbidden();
})->with('content_resource_paths');
