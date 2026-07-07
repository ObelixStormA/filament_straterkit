@props(['headerClass' => ''])

<header class="header {{ $headerClass }}">
    <div class="topbar clearfix">
        <div class="container">
            <div class="row-fluid">
                <div class="col-md-6 col-sm-6 text-left">
                    <p>
                        <strong><i class="fa fa-phone"></i></strong> {{ $settings->phone_primary ?? '' }} &nbsp;&nbsp;
                        <strong><i class="fa fa-envelope"></i></strong> <a href="mailto:{{ $settings->email_primary ?? '' }}">{{ $settings->email_primary ?? '' }}</a>
                    </p>
                </div>
                <div class="col-md-6 col-sm-6 hidden-xs text-right">
                    <div class="social">
                        @foreach ($topbarSocialLinks ?? [] as $link)
                            <a class="{{ $link->platform }}" href="{{ $link->url }}" target="_blank" rel="noopener" data-tooltip="tooltip" data-placement="bottom" title="{{ ucfirst($link->platform) }}"><i class="fa {{ $link->icon }}"></i></a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <nav class="navbar navbar-default yamm">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="logo-normal">
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <img src="{{ asset('template/images/ahi.png') }}" alt="Institut gerbi" class="navbar-gerb">
                    </a>
                </div>
            </div>

            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    @foreach (($headerMenus ?? []) as $item)
                        @continue(! $item->is_visible_to_user)

                        @if ($item->children->isNotEmpty())
                            @php
                                $visibleChildren = $item->children->filter->is_visible_to_user;
                                $isParentActive = $visibleChildren->contains(
                                    fn ($child) => $child->route_name && request()->routeIs($child->route_name)
                                );
                            @endphp
                            @continue($visibleChildren->isEmpty())
                            <li class="dropdown hassubmenu {{ $isParentActive ? 'active' : '' }}">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ $item->label }} <span class="fa fa-angle-down"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    @foreach ($visibleChildren as $child)
                                        <li><a href="{{ $child->resolved_url }}" @if ($child->open_in_new_tab) target="_blank" rel="noopener" @endif>{{ $child->label }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            <li class="{{ $item->route_name && ! $item->section_anchor && request()->routeIs($item->route_name) ? 'active' : '' }}">
                                <a href="{{ $item->resolved_url }}" @if ($item->open_in_new_tab) target="_blank" rel="noopener" @endif>{{ $item->label }}</a>
                            </li>
                        @endif
                    @endforeach
                    <li class="iconitem"><a href="#" data-toggle="modal" data-target="#login-modal"><i class="fa fa-search"></i></a></li>
                    <li class="iconitem dropdown hassubmenu lang-dropdown">
                        <a href="#" class="lang-switch dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="lang-current">{{ strtoupper(app()->getLocale()) }}</span> <span class="fa fa-angle-down"></span></a>
                        <ul class="dropdown-menu lang-menu" role="menu">
                            <li class="{{ app()->getLocale() === 'uz' ? 'active' : '' }}"><a href="{{ route('locale.switch', 'uz') }}">O'zbek</a></li>
                            <li class="{{ app()->getLocale() === 'ru' ? 'active' : '' }}"><a href="{{ route('locale.switch', 'ru') }}">Рус</a></li>
                            <li class="{{ app()->getLocale() === 'en' ? 'active' : '' }}"><a href="{{ route('locale.switch', 'en') }}">English</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
