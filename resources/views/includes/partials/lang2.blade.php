@foreach(array_keys(config('locale.languages')) as $lang)
    @if($lang != app()->getLocale())

        <ul>
            <li><a href="{{ '/lang/'.$lang }}"><img src="{{ asset('/porto/assets/images/flags/'.$lang.'.png') }}" alt="England flag">@lang('menus.language-picker.langs.'.$lang)</a></li>
        </ul>

    @endif
@endforeach
