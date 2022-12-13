<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ __('') }}</a>
            <a href="#" class="simple-text logo-normal">{{ __('KataStore') }}</a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li>
                <a data-toggle="collapse" href="#user" aria-expanded="true">
                    <i class="tim-icons icon-badge" ></i>
                    <span class="nav-link-text" >{{ __('Manage users') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse " id="user">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'profile') class="active " @endif>
                            <a href="{{ route('profile.edit') }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ __('User Profile') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'users') class="active " @endif>
                            <a href="{{ route('homeusers') }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ __('User Management') }}</p>
                            </a>
                        </li>
                        
                    </ul>
                </div>
            </li>            
            <li>
                <a data-toggle="collapse" href="#prod" aria-expanded="true">
                    <i class="tim-icons icon-satisfied" ></i>
                    <span class="nav-link-text" >{{ __('Manage store') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse " id="prod">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'categories') class="active " @endif>
                            <a href="{{ route('categories') }}">
                                <i class="tim-icons icon-molecule-40"></i>
                                <p>{{ __('Categorias') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'products') class="active " @endif>
                            <a href="{{ route('products') }}">
                                <i class="tim-icons icon-basket-simple"></i>
                                <p>{{ __('Products') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'services') class="active " @endif>
                            <a href="{{ route('services') }}">
                                <i class="tim-icons icon-puzzle-10"></i>
                                <p>{{ __('Services') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'misorders') class="active " @endif>
                            <a href="{{ route('misorders') }}">
                                <i class="tim-icons icon-puzzle-10"></i>
                                <p>{{ __('Mis Orders') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'pedidos') class="active " @endif>
                            <a href="{{ route('pedidos') }}">
                                <i class="tim-icons icon-puzzle-10"></i>
                                <p>{{ __('Orders') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>            
            <li @if ($pageSlug == 'icons') class="active " @endif>
                <a href="{{ route('pages.icons') }}">
                    <i class="tim-icons icon-atom"></i>
                    <p>{{ __('Icons') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'maps') class="active " @endif>
                <a href="{{ route('pages.maps') }}">
                    <i class="tim-icons icon-pin"></i>
                    <p>{{ __('Maps') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'notifications') class="active " @endif>
                <a href="{{ route('pages.notifications') }}">
                    <i class="tim-icons icon-bell-55"></i>
                    <p>{{ __('Notifications') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'tables') class="active " @endif>
                <a href="{{ route('pages.tables') }}">
                    <i class="tim-icons icon-puzzle-10"></i>
                    <p>{{ __('Table List') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'typography') class="active " @endif>
                <a href="{{ route('pages.typography') }}">
                    <i class="tim-icons icon-align-center"></i>
                    <p>{{ __('Typography') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'rtl') class="active " @endif>
                <a href="{{ route('pages.rtl') }}">
                    <i class="tim-icons icon-world"></i>
                    <p>{{ __('RTL Support') }}</p>
                </a>
            </li>
            <li class=" {{ $pageSlug == 'upgrade' ? 'active' : '' }} bg-info">
                <a href="{{ route('pages.upgrade') }}">
                    <i class="tim-icons icon-spaceship"></i>
                    <p>{{ __('Upgrade to PRO') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
