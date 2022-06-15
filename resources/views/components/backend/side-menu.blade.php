<li class="nav-header">MENU UTAMA</li>
<li class="nav-item
                                        {{ Request::is('admin/tersus/*') ? 'menu-open' : '' }}
                                        {{ Request::is('admin/bup/*') ? 'menu-open' : '' }}
                                        {{ Request::is('admin/pelnas/*') ? 'menu-open' : '' }}
                                        {{ Request::is('admin/keagenan_kapal/*') ? 'menu-open' : '' }}
                                        {{ Request::is('admin/pbm/*') ? 'menu-open' : '' }}
                                        {{ Request::is('admin/jpt/*') ? 'menu-open' : '' }}
                                        {{ Request::is('admin/pelra/*') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-book"></i>
        <p>
            Form Data
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    @if (auth()->user()->role == 'admin')
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('tersus.index') }}" class="nav-link {{ Request::is('admin/tersus/*') ? 'active' : '' }}">
                <i class="nav-icon far fa-circle"></i>
                <p>
                    Data TERSUS
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('bup.index') }}" class="nav-link {{ Request::is('admin/bup/*') ? 'active' : '' }}">
                <i class="nav-icon far fa-circle"></i>
                <p>
                    Data BUP
                </p>
            </a>
        </li>
        <li class="nav-item ">
            <a href="{{ route('pelnas.index') }}" class="nav-link {{ Request::is('admin/pelnas/*') ? 'active' : '' }}">
                <i class="nav-icon far fa-circle"></i>
                <p>
                    Data PELNAS
                </p>
            </a>
        </li>
        <li class="nav-item ">
            <a href="{{ route('keagenan_kapal.index') }}"
                class="nav-link {{ Request::is('admin/keagenan_kapal/*') ? 'active' : '' }}">
                <i class="nav-icon far fa-circle"></i>
                <p>
                    Data KEAGENAN KAPAL
                </p>
            </a>
        </li>
        <li class="nav-item ">
            <a href="{{ route('pbm.index') }}" class="nav-link {{ Request::is('admin/pbm/*') ? 'active' : '' }}">
                <i class="nav-icon far fa-circle"></i>
                <p>
                    Data PBM
                </p>
            </a>
        </li>
        <li class="nav-item ">
            <a href="{{ route('jpt.index') }}" class="nav-link {{ Request::is('admin/jpt/*') ? 'active' : '' }}">
                <i class="nav-icon far fa-circle"></i>
                <p>
                    Data JPT
                </p>
            </a>
        </li>
        <li class="nav-item ">
            <a href="{{ route('pelra.index') }}" class="nav-link {{ Request::is('admin/pelra/*') ? 'active' : '' }}">
                <i class="nav-icon far fa-circle"></i>
                <p>
                    Data PELRA
                </p>
            </a>
        </li>
    </ul>
</li>

@else


<ul class="nav nav-treeview">
    @if(in_array('form_tersus', $userPermissions))
    <li class="nav-item">
        <a href="{{ route('tersus.index') }}" class="nav-link {{ Request::is('admin/tersus/*') ? 'active' : '' }}">
            <i class="nav-icon far fa-circle"></i>
            <p>
                Data TERSUS
            </p>
        </a>
    </li>
    @endif
    @if(in_array('form_bup', $userPermissions))
    <li class="nav-item">
        <a href="{{ route('bup.index') }}" class="nav-link {{ Request::is('admin/bup/*') ? 'active' : '' }}">
            <i class="nav-icon far fa-circle"></i>
            <p>
                Data BUP
            </p>
        </a>
    </li>
    @endif
    @if(in_array('form_pelnas', $userPermissions))
    <li class="nav-item ">
        <a href="{{ route('pelnas.index') }}" class="nav-link {{ Request::is('admin/pelnas/*') ? 'active' : '' }}">
            <i class="nav-icon far fa-circle"></i>
            <p>
                Data PELNAS
            </p>
        </a>
    </li>
    @endif
    @if(in_array('form_keagenan_kapal', $userPermissions))
    <li class="nav-item ">
        <a href="{{ route('keagenan_kapal.index') }}"
            class="nav-link {{ Request::is('admin/keagenan_kapal/*') ? 'active' : '' }}">
            <i class="nav-icon far fa-circle"></i>
            <p>
                Data KEAGENAN KAPAL
            </p>
        </a>
    </li>
    @endif
    @if(in_array('form_pbm', $userPermissions))
    <li class="nav-item ">
        <a href="{{ route('pbm.index') }}" class="nav-link {{ Request::is('admin/pbm/*') ? 'active' : '' }}">
            <i class="nav-icon far fa-circle"></i>
            <p>
                Data PBM
            </p>
        </a>
    </li>
    @endif
    @if(in_array('form_jpt', $userPermissions))
    <li class="nav-item ">
        <a href="{{ route('jpt.index') }}" class="nav-link {{ Request::is('admin/jpt/*') ? 'active' : '' }}">
            <i class="nav-icon far fa-circle"></i>
            <p>
                Data JPT
            </p>
        </a>
    </li>
    @endif
    @if(in_array('form_pelra', $userPermissions))
    <li class="nav-item ">
        <a href="{{ route('pelra.index') }}" class="nav-link {{ Request::is('admin/pelra/*') ? 'active' : '' }}">
            <i class="nav-icon far fa-circle"></i>
            <p>
                Data PELRA
            </p>
        </a>
    </li>
    @endif
</ul>
</li>
@endif
