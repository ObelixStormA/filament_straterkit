<footer class="section footer noover">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="widget clearfix">
                    <img src="{{ asset('template/images/ahi.png') }}" alt="Institut gerbi" class="footer-gerb">
                    <h3 class="widget-title" style="margin-top:20px;">{{ $settings->site_short_name ?? 'AKTVA Instituti' }}</h3>
                    <p class="institute-desc">{{ $settings->footer_description ?? '' }}</p>
                    <div class="social-links">
                        @foreach ($footerSocialLinks ?? [] as $link)
                            <a href="{{ $link->url }}" target="_blank" rel="noopener" title="{{ ucfirst($link->platform) }}"><i class="fa {{ $link->icon }}"></i></a>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3">
                <div class="widget clearfix">
                    <h3 class="widget-title">{{ __('Tezkor havolalar') }}</h3>
                    <div class="list-widget">
                        <ul>
                            <li><a href="{{ route('home') }}#about">{{ __('Institut haqida') }}</a></li>
                            <li><a href="{{ route('home') }}#yonalishlar">{{ __("Ta'lim yo'nalishlari") }}</a></li>
                            <li><a href="{{ route('home') }}#ilmiy-faoliyat">{{ __('Ilmiy faoliyat') }}</a></li>
                            <li><a href="{{ route('home') }}#qabul">{{ __('Qabul') }}</a></li>
                            <li><a href="{{ route('contact') }}">{{ __('Aloqa') }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3">
                <div class="widget clearfix">
                    <h3 class="widget-title">{{ __("Aloqa ma'lumotlari") }}</h3>
                    <div class="list-widget">
                        <ul>
                            <li><i class="fa fa-map-marker"></i> &nbsp;{{ $settings->address ?? '' }}</li>
                            <li><i class="fa fa-phone"></i> &nbsp;{{ $settings->phone_primary ?? '' }}</li>
                            <li><i class="fa fa-envelope"></i> &nbsp;<a href="mailto:{{ $settings->email_primary ?? '' }}">{{ $settings->email_primary ?? '' }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-md-2">
                <div class="widget clearfix">
                    <h3 class="widget-title">{{ __('Foydali havolalar') }}</h3>
                    <div class="list-widget">
                        <ul>
                            @forelse ($footerPages ?? [] as $page)
                                <li><a href="{{ route('pages.show', $page->slug) }}">{{ $page->title }}</a></li>
                            @empty
                                <li><a href="#">Nizom</a></li>
                                <li><a href="#">Litsenziya</a></li>
                                <li><a href="#">Kadrlar bo'limi</a></li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="copyrights">
    <div class="container">
        <div class="clearfix">
            <div class="pull-left">
                <p style="color:#aaa;margin:0;padding-top:8px;">&copy; {{ now()->year }} {{ $settings->site_name ?? 'AKTVA Instituti' }}. {{ __('Barcha huquqlar himoyalangan.') }}</p>
            </div>
            <div class="pull-right">
                <div class="footer-links">
                    <ul class="list-inline">
                        <li class="{{ app()->getLocale() === 'uz' ? 'active' : '' }}"><a href="{{ route('locale.switch', 'uz') }}">UZ</a></li>
                        <li class="{{ app()->getLocale() === 'ru' ? 'active' : '' }}"><a href="{{ route('locale.switch', 'ru') }}">RU</a></li>
                        <li class="{{ app()->getLocale() === 'en' ? 'active' : '' }}"><a href="{{ route('locale.switch', 'en') }}">EN</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
