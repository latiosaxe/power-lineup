<header>
    <nav>
        <ul>
            <li  {{ (Request::is( \AppHelper::instance()->URL('home') )       ? 'class=active' : '') }}><a href="/">Home</a></li>
            <li  {{ (Request::is( \AppHelper::instance()->URL('blog') )       ? 'class=active' : '') }}><a href="/blog">Blog</a></li>
            <li  {{ (Request::is( \AppHelper::instance()->URL('whitepaper') ) ? 'class=active' : '') }}><a href="/whitepaper">Whitepaper</a></li>
            <li><a href="https://github.com" target="_blank">Github</a></li>
            <li  {{ (Request::is( \AppHelper::instance()->URL('etherscan') )  ? 'class=active' : '') }}><a href="/etherscan">Etherscan</a></li>
            <li  {{ (Request::is( \AppHelper::instance()->URL('faqs') )       ? 'class=active' : '') }}><a href="/faqs">Faqs</a></li>
            <li  {{ (Request::is( \AppHelper::instance()->URL('contact') )    ? 'class=active' : '') }}><a href="/contact">Contact</a></li>
        </ul>
        <ul class="lang">
            <?php $lang = LaravelLocalization::getCurrentLocale() ?>
            <li><a href="/de" class="{{($lang === 'de')?'active':''}}">DE</a></li>
            <li><a href="/en" class="{{($lang === 'en')?'active':''}}">EN</a></li>
            <li><a href="/fi" class="{{($lang === 'fi')?'active':''}}">FI</a></li>
            <li><a href="/fr" class="{{($lang === 'fr')?'active':''}}">FR</a></li>
        </ul>
    </nav>
</header>