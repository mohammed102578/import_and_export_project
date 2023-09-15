<!--  BEGIN SIDEBAR  -->
<div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">
        <div class="profile-info">
            <figure class="user-cover-image"></figure>
            <div class="user-info">
                <img src="{{auth()->user()->avatar_path}}" style="max-width: 100px;max-height: 90px;border: none;border-radius:5%">
                <h5>{{auth()->user()->name}}</h5>
                <p>{{__('site.'.auth()->user()->type)}} </p>


            </div>
        </div>
        <div class="shadow-bottom"></div>
        <ul class="list-unstyled menu-categories" id="accordionExample">
            <li class="menu ">
                <a href="{{route('dashboard')}}" aria-expanded="{{Request::is('dashboard') ?'true':'false'}}"
                   class="dropdown-toggle {{Request::is('dashboard*') ?'':'collapse '}}">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-home">
                            <path d="M3 9l9-7 9 avatar 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span>@lang('site.dashboard')</span>
                    </div>

                </a>
            </li>

            @if (auth()->user()->hasPermission('read_users'))
                <li class="menu ">
                    <a href="#cats" data-toggle="collapse"
                       aria-expanded="{{Request::is('dashboard/cats*') ?'true':'false'}}"
                       class="dropdown-toggle {{Request::is('dashboard/cats*') ?'':'collapse '}}">
                        <div class="">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-excel">
						  <path d="M5.18 4.616a.5.5 0 0 1 .704.064L8 7.219l2.116-2.54a.5.5 0 1 1 .768.641L8.651 8l2.233 2.68a.5.5 0 0 1-.768.64L8 8.781l-2.116 2.54a.5.5 0 0 1-.768-.641L7.349 8 5.116 5.32a.5.5 0 0 1 .064-.704z"/>
						  <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>
						</svg>
                            <span>@lang('site.kind_h')</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled {{Request::is('dashboard/cats*') ?'show':' '}}"
                        id="cats"
                        data-parent="#accordionExample">
                        <li class="{{Request::is('dashboard/cats*') ?'active':''}}">
                            <a href="{{route('cats.index')}}"> @lang('site.all') </a>
                            <a href="{{route('uploadFile.index')}}"> @lang('site.create') </a>

                        </li>

                    </ul>
                </li>


            <li class="menu ">
                <a href="#users" data-toggle="collapse"
                   aria-expanded="{{(Request::is('*users*')||Request::is('*roles*')||Request::is('*permission*'))?'true':'false'}}"
                   class="dropdown-toggle {{(Request::is('*users*')||Request::is('*roles*')||Request::is('*permission*'))?'':'collapse '}}">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        <span>@lang('site.users')</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled {{(Request::is('*users*')||Request::is('*roles*')||Request::is('*permission*')) ?'show':' '}}"
                    id="users"
                    data-parent="#accordionExample">
                    <li class="{{Request::is('users') ?'active':''}}">
                        {{--                            <a href="{{route('requests.index')}}"> @lang('site.all') </a>--}}
                        <a href="{{route('users.index')}}"> @lang('site.users') </a>
                        <a href="{{route('roles.index')}}"> @lang('site.roles') </a>
                        <a href="{{route('permissions.index')}}"> @lang('site.permissions') </a>
                    </li>

                </ul>
            </li>
            @endif

            @if (auth()->user()->hasPermission('read_categories'))
                <li class="menu ">
                    <a href="#categories" data-toggle="collapse"
                       aria-expanded="{{Request::is('*categories*') ?'true':'false'}}"
                       class="dropdown-toggle {{Request::is('*categories*') ?'':'collapse '}}">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list">
                                <line x1="8" y1="6" x2="21" y2="6"></line>
                                <line x1="8" y1="12" x2="21" y2="12"></line>
                                <line x1="8" y1="18" x2="21" y2="18"></line>
                                <line x1="3" y1="6" x2="3" y2="6"></line>
                                <line x1="3" y1="12" x2="3" y2="12"></line>
                                <line x1="3" y1="18" x2="3" y2="18"></line>
                            </svg>
                            <span>@lang('site.categories')</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled {{Request::is('*categories*') ?'show':' '}}"
                        id="categories"
                        data-parent="#accordionExample">
                        <li class="{{Request::is('categories') ?'active':''}}">
                            {{--                            <a href="{{route('categories.index')}}"> @lang('site.all') </a>--}}
                            <a href="{{route('categories.index')}}"> @lang('site.all') </a>
                            <a href="{{route('categories.create')}}"> @lang('site.create') </a>

                        </li>

                    </ul>
                </li>
            @endif
            @if (auth()->user()->hasPermission('read_categories'))
                <li class="menu ">
                    <a href="#suppliers" data-toggle="collapse"
                       aria-expanded="{{Request::is('*suppliers*') ?'true':'false'}}"
                       class="dropdown-toggle {{Request::is('*suppliers*') ?'':'collapse '}}">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list">
                                <line x1="8" y1="6" x2="21" y2="6"></line>
                                <line x1="8" y1="12" x2="21" y2="12"></line>
                                <line x1="8" y1="18" x2="21" y2="18"></line>
                                <line x1="3" y1="6" x2="3" y2="6"></line>
                                <line x1="3" y1="12" x2="3" y2="12"></line>
                                <line x1="3" y1="18" x2="3" y2="18"></line>
                            </svg>
                            <span>@lang('site.suppliers')</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled {{Request::is('*suppliers*') ?'show':' '}}"
                        id="suppliers"
                        data-parent="#accordionExample">
                        <li class="{{Request::is('*suppliers*') ?'active':''}}">
                            {{--                            <a href="{{route('categories.index')}}"> @lang('site.all') </a>--}}
                            <a href="{{route('suppliers.index')}}"> @lang('site.all') </a>
                            <a href="{{route('suppliers.create')}}"> @lang('site.create') </a>

                        </li>

                    </ul>
                </li>
            @endif
            @if (auth()->user()->hasPermission('read_categories'))
                <li class="menu ">
                    <a href="#contractors" data-toggle="collapse"
                       aria-expanded="{{Request::is('*contractors*') ?'true':'false'}}"
                       class="dropdown-toggle {{Request::is('*contractors*') ?'':'collapse '}}">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list">
                                <line x1="8" y1="6" x2="21" y2="6"></line>
                                <line x1="8" y1="12" x2="21" y2="12"></line>
                                <line x1="8" y1="18" x2="21" y2="18"></line>
                                <line x1="3" y1="6" x2="3" y2="6"></line>
                                <line x1="3" y1="12" x2="3" y2="12"></line>
                                <line x1="3" y1="18" x2="3" y2="18"></line>
                            </svg>
                            <span>@lang('site.contractors')</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled {{Request::is('*contractors*') ?'show':' '}}"
                        id="contractors"
                        data-parent="#accordionExample">
                        <li class="{{Request::is('*contractors*') ?'active':''}}">
                            {{--                            <a href="{{route('categories.index')}}"> @lang('site.all') </a>--}}
                            <a href="{{route('contractors.index')}}"> @lang('site.all') </a>
                            <a href="{{route('contractors.create')}}"> @lang('site.create') </a>

                        </li>

                    </ul>
                </li>
            @endif
            @if (auth()->user()->hasPermission('read_requests'))
              @foreach(\App\Models\Category::get() as $category)
                  <?php
                    $found=false;
                    $requests=\App\Models\Request::where('category_id',$category->id)->pluck('id')->toArray();
//                    dd($requests);
                    if(Request::is('*items*')&& in_array( Request::segment(4),$requests)){
                        $found=true;


                    }
                    ?>
                    <li class="menu ">
                        <a href="{{route('requests.index',$category->id)}}" aria-expanded="{{(Request::is('*requests/'.$category->id.'*') ||$found)?'true':'false'}}"
                           class="dropdown-toggle {{Request::is('*requests*') ?'':'collapse '}}">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                </svg>
                                <span>{{$category->name}}</span>
                            </div>

                        </a>
                    </li>
            @endforeach
            @endif
            <li class="menu ">
                <a href="{{route('settings.index')}}" aria-expanded="{{Request::is('*settings*') ?'true':'false'}}"
                   class="dropdown-toggle {{Request::is('*settings*') ?'':'collapse '}}">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings">
                            <circle cx="12" cy="12" r="3"></circle>
                            <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                        </svg>
                        <span>@lang('site.settings')</span>
                    </div>

                </a>
            </li>
        </ul>
    </nav>

</div>
<!--  END SIDEBAR  -->
