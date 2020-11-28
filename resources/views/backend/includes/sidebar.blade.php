
<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">
                @lang('menus.backend.sidebar.general')
            </li>
            <li class="nav-item">
                <a class="nav-link {{
                    active_class(Active::checkUriPattern('admin/dashboard'))
                }}" href="{{ route('admin.dashboard') }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    @lang('menus.backend.sidebar.dashboard')
                </a>
            </li>

            <li class="nav-title">
                @lang('menus.backend.sidebar.system')
            </li>

            @if ($logged_in_user->isAdmin())
                <li class="nav-item nav-dropdown {{
                    active_class(Active::checkUriPattern('alert-dangermin/auth*'), 'open')
                }}">
                    <a class="nav-link nav-dropdown-toggle {{
                        active_class(Active::checkUriPattern('admin/auth*'))
                    }}" href="#">
                        <i class="nav-icon far fa-user"></i>
                        @lang('menus.backend.access.title')

                        @if ($pending_approval > 0)
                            <span class="badge badge-danger">{{ $pending_approval }}</span>
                        @endif
                    </a>

                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link {{
                                active_class(Active::checkUriPattern('admin/auth/user*'))
                            }}" href="{{ route('admin.auth.user.index') }}">
                                
                                @lang('labels.backend.access.users.management')

                                @if ($pending_approval > 0)
                                    <span class="badge badge-danger">{{ $pending_approval }}</span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{
                                active_class(Active::checkUriPattern('admin/auth/role*'))
                            }}" href="{{ route('admin.auth.role.index') }}">
                                
                                @lang('labels.backend.access.roles.management')
                            </a>
                        </li>
                    </ul>
                </li>

            @endif

            @can('clientes')
            <li class="nav-item">
                <a class="nav-link {{
                    active_class(Active::checkUriPattern('admin/customer'))
                }}" href="{{ route('admin.customer.index') }}">
                    <i class="nav-icon far fa-user-circle"> </i>
                    @lang('menus.backend.sidebar.customers')
                </a>
            </li>
            @endcan

            @canany(['productos', 'colores', 'mangas', 'telas', 'lineas', 'tallas', 'unidades de medida'])
            <li class="nav-item nav-dropdown {{
                active_class(Active::checkUriPattern('admin/product*'), 'open')
            }}">
                <a class="nav-link nav-dropdown-toggle {{
                    active_class(Active::checkUriPattern('admin/product*'))
                }}" href="#">
                    <i class="nav-icon fas fa-cubes"> </i>
                    @lang('menus.backend.sidebar.products')
                </a>

                <ul class="nav-dropdown-items">
                    @can('productos')
                    <li class="nav-item">
                        <a class="nav-link {{
                            active_class(Active::checkUriPattern('admin/product/product'))
                        }}" href="{{ route('admin.product.product.index') }}">
                            
                            @lang('menus.backend.sidebar.list_products')
                        </a>
                    </li>
                    @endcan
               </ul>

                <ul class="nav-dropdown-items">
                    @can('productos')
                    <li class="nav-item">
                        <a class="nav-link {{
                            active_class(Active::checkUriPattern('admin/product/list'))
                        }}" href="{{ route('admin.product.productlist.index') }}">
                            
                            @lang('menus.backend.sidebar.list_products_stock')
                        </a>
                    </li>
                    @endcan
               </ul>

                <ul class="nav-dropdown-items">
                    @can('productos')
                    <li class="nav-item">
                        <a class="nav-link {{
                            active_class(Active::checkUriPattern('admin/product/productconsumption'))
                        }}" href="{{ route('admin.product.productconsumption.consumption') }}">
                            
                            @lang('menus.backend.sidebar.consumption_products')
                        </a>
                    </li>
                    @endcan
               </ul>

                <ul class="nav-dropdown-items">
                    @can('productos')
                    <li class="nav-item">
                        <a class="nav-link {{
                            active_class(Active::checkUriPattern('admin/product/history'))
                        }}" href="{{ route('admin.product.producthistory.index') }}">
                            
                            @lang('menus.backend.sidebar.history_product')
                        </a>
                    </li>
                    @endcan
               </ul>

                <ul class="nav-dropdown-items">
                    @can('productos')
                    <li class="nav-item">
                        <a class="nav-link {{
                            active_class(Active::checkUriPattern('admin/product/historyout'))
                        }}" href="{{ route('admin.product.productouthistory.index') }}">
                            
                            @lang('menus.backend.sidebar.historyout_product')
                        </a>
                    </li>
                    @endcan
               </ul>


                <ul class="nav-dropdown-items">
                    @can('colores')
                    <li class="nav-item">
                        <a class="nav-link {{
                            active_class(Active::checkUriPattern('admin/product/color*'))
                        }}" href="{{ route('admin.product.color.index') }}">
                            
                            @lang('menus.backend.sidebar.colors')
                        </a>
                    </li>
                    @endcan
                </ul>

                <ul class="nav-dropdown-items">
                    @can('tallas')
                    <li class="nav-item">
                        <a class="nav-link {{
                            active_class(Active::checkUriPattern('admin/product/size*'))
                        }}" href="{{ route('admin.product.size.index') }}">
                            
                            @lang('menus.backend.sidebar.sizes')
                        </a>
                    </li>
                    @endcan
                </ul>

                <ul class="nav-dropdown-items">
                    @can('mangas')
                    <li class="nav-item">
                        <a class="nav-link {{
                            active_class(Active::checkUriPattern('admin/product/sleeve*'))
                        }}" href="{{ route('admin.product.sleeve.index') }}">
                            
                            @lang('menus.backend.sidebar.sleeves')
                        </a>
                    </li>
                    @endcan
               </ul>

                <ul class="nav-dropdown-items">
                    @can('telas')
                    <li class="nav-item">
                        <a class="nav-link {{
                            active_class(Active::checkUriPattern('admin/product/cloth*'))
                        }}" href="{{ route('admin.product.cloth.index') }}">
                            
                            @lang('menus.backend.sidebar.cloths')
                        </a>
                    </li>
                    @endcan
               </ul>

                <ul class="nav-dropdown-items">
                    @can('lineas')
                    <li class="nav-item">
                        <a class="nav-link {{
                            active_class(Active::checkUriPattern('admin/product/line*'))
                        }}" href="{{ route('admin.product.line.index') }}">
                            
                            @lang('menus.backend.sidebar.lines')
                        </a>
                    </li>
                    @endcan
               </ul>

                <ul class="nav-dropdown-items">
                    @can('unidades de medida')
                    <li class="nav-item">
                        <a class="nav-link {{
                            active_class(Active::checkUriPattern('admin/product/unit*'))
                        }}" href="{{ route('admin.product.unit.index') }}">
                            
                            @lang('menus.backend.sidebar.units')
                        </a>
                    </li>
                    @endcan
               </ul>

            </li>
            @endcanany

            @can('materia prima')
            <li class="nav-item nav-dropdown {{
                active_class(Active::checkUriPattern('admin/material*'), 'open')
            }}">

                <a class="nav-link nav-dropdown-toggle {{
                    active_class(Active::checkUriPattern('admin/material*'))
                }}" href="#">
                    <i class="nav-icon fa fa-fill-drip"> </i>
                    @lang('menus.backend.sidebar.material')
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link {{
                            active_class(Active::checkUriPattern('admin/material'))
                        }}" href="{{ route('admin.material.index') }}">
                            
                            @lang('menus.backend.sidebar.list_material')
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{
                            active_class(Active::checkUriPattern('admin/material/materialhistory'))
                        }}" href="{{ route('admin.materialhistory.index') }}">
                            
                            @lang('menus.backend.sidebar.history_material')
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{
                            active_class(Active::checkUriPattern('admin/material/materialhistoryout'))
                        }}" href="{{ route('admin.materialhistoryout.index') }}">
                            
                            @lang('menus.backend.sidebar.historyout_material')
                        </a>
                    </li>
                </ul>
            </li>
            @endcan


            @can('materia prima')
            <li class="nav-item">
                <a class="nav-link {{
                    active_class(Active::checkUriPattern('admin/order'))
                }}" href="{{ route('admin.order.index') }}">
                    <i class="nav-icon fa fa-building"> </i>
                    @lang('menus.backend.sidebar.orders')
                </a>
            </li>
            @endcan

            <li class="nav-item">
                <a class="nav-link {{
                    active_class(Active::checkUriPattern('admin/revision'))
                }}" href="{{ route('admin.revision.index') }}">
                    <i class="nav-icon fa fa-filter"> </i>
                    @lang('menus.backend.sidebar.warehouse_review')
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{
                    active_class(Active::checkUriPattern('admin/revisionlog'))
                }}" href="{{ route('admin.revisionlog.index') }}">
                    <i class="nav-icon fa fa-bars"> </i>
                    @lang('menus.backend.sidebar.warehouse_review_registry')
                </a>
            </li>

            @canany(['servicios', 'generar venta', 'ver ventas'])
            <li class="nav-item nav-dropdown {{
                active_class(Active::checkUriPattern('admin/inventory*'), 'open')
            }}">
                <a class="nav-link nav-dropdown-toggle {{
                    active_class(Active::checkUriPattern('admin/inventory*'))
                }}" href="#">
                    <i class="nav-icon fa fa-shopping-cart"> </i>
                    @lang('menus.backend.sidebar.inventory')
                </a>

                <ul class="nav-dropdown-items">

                    @can('servicios')
                    <li class="nav-item">
                        <a class="nav-link {{
                            active_class(Active::checkUriPattern('admin/inventory/service'))
                        }}" href="{{ route('admin.inventory.service.index') }}">
                            
                            @lang('menus.backend.sidebar.services')
                        </a>
                    </li>
                    @endcan
                    
                    @can('generar venta')
                    <li class="nav-item">
                        <a class="nav-link {{
                            active_class(Active::checkUriPattern('admin/inventory/sell*'))
                        }}" href="{{ route('admin.inventory.sell.index') }}">
                            
                            @lang('menus.backend.sidebar.sells')
                        </a>
                    </li>
                    @endcan
               </ul>
            </li>
            @endcanany


            @canany(['egresos', 'ingresos', 'caja chica', 'corte de caja'])
            <li class="nav-item nav-dropdown {{
                active_class(Active::checkUriPattern('admin/transaction*'), 'open')
            }}">
                <a class="nav-link nav-dropdown-toggle {{
                    active_class(Active::checkUriPattern('admin/transaction*'))
                }}" href="#">
                    <i class="nav-icon fa fa-dollar-sign"> </i>
                    @lang('menus.backend.sidebar.transactions')
                </a>

                <ul class="nav-dropdown-items">

                    @can('egresos')
                    <li class="nav-item">
                        <a class="nav-link {{
                            active_class(Active::checkUriPattern('admin/transaction/expense'))
                        }}" href="{{ route('admin.transaction.expense.index') }}">
                            
                            @lang('menus.backend.sidebar.expenses')
                        </a>
                    </li>
                    @endcan

                    @can('ingresos')
                    <li class="nav-item">
                        <a class="nav-link {{
                            active_class(Active::checkUriPattern('admin/transaction/income*'))
                        }}" href="{{ route('admin.transaction.income.index') }}">
                            
                            @lang('menus.backend.sidebar.incomes')
                        </a>
                    </li>
                    @endcan

                    @can('caja chica')
                    <li class="nav-item">
                        <a class="nav-link {{
                            active_class(Active::checkUriPattern('admin/transaction/small*'))
                        }}" href="{{ route('admin.transaction.small.index') }}">
                            
                            @lang('menus.backend.sidebar.small_box')
                        </a>
                    </li>
                    @endcan
               </ul>
            </li>
            @endcanany


            @canany(['configuraciones generales', 'metodos de pago'])
            <li class="nav-item nav-dropdown {{
                active_class(Active::checkUriPattern('admin/setting*'), 'open')
            }}">
                <a class="nav-link nav-dropdown-toggle {{
                    active_class(Active::checkUriPattern('admin/setting*'))
                }}" href="#">
                    <i class="nav-icon fa fa-cogs"> </i>
                    @lang('menus.backend.sidebar.settings')
                </a>

                <ul class="nav-dropdown-items">

                    @can('configuraciones generales')
                    <li class="nav-item">
                        <a class="nav-link {{
                            active_class(Active::checkUriPattern('admin/setting/general'))
                        }}" href="{{ route('admin.setting.general.index') }}">
                            
                            @lang('menus.backend.sidebar.general')
                        </a>
                    </li>
                    @endcan
                    @can('configuraciones generales')
                    <li class="nav-item">
                        <a class="nav-link {{
                            active_class(Active::checkUriPattern('admin/setting/status'))
                        }}" href="{{ route('admin.setting.status.index') }}">
                            
                            @lang('menus.backend.sidebar.status')
                        </a>
                    </li>
                    @endcan
                    @can('metodos de pago')
                    <li class="nav-item">
                        <a class="nav-link {{
                            active_class(Active::checkUriPattern('admin/setting/method*'))
                        }}" href="{{ route('admin.setting.method.index') }}">
                            
                            @lang('menus.backend.sidebar.payments_methods')
                        </a>
                    </li>
                    @endcan
               </ul>
            </li>
            @endcanany


            @if ($logged_in_user->isAdmin())

                <li class="divider"></li>

                <li class="nav-item nav-dropdown {{
                    active_class(Active::checkUriPattern('admin/log-viewer*'), 'open')
                }}">
                        <a class="nav-link nav-dropdown-toggle {{
                            active_class(Active::checkUriPattern('admin/log-viewer*'))
                        }}" href="#">
                        <i class="nav-icon fas fa-list"></i> 
                        @lang('menus.backend.log-viewer.main')
                    </a>

                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link {{
                            active_class(Active::checkUriPattern('admin/log-viewer'))
                        }}" href="{{ route('log-viewer::dashboard') }}">
                                
                                @lang('menus.backend.log-viewer.dashboard')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{
                            active_class(Active::checkUriPattern('admin/log-viewer/logs*'))
                        }}" href="{{ route('log-viewer::logs.list') }}">
                                
                                @lang('menus.backend.log-viewer.logs')
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
            <li class="divider"></li>
            <br>
        </ul>
    </nav>

    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div><!--sidebar-->