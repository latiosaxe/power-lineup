<header>
    <nav>
        <ul>
            <li  {{{ (Request::is('/') ? 'class=active' : '') }}}><a href="/">Home</a></li>
            <li  {{{ (Request::is('blog') ? 'class=active' : '') }}}><a href="/blog">Blog</a></li>
            <li  {{{ (Request::is('whitepaper') ? 'class=active' : '') }}}><a href="/whitepaper">Whitepaper</a></li>
            <li><a href="https://github.com" target="_blank">Github</a></li>
            <li  {{{ (Request::is('etherscan') ? 'class=active' : '') }}}><a href="/etherscan">Etherscan</a></li>
            <li  {{{ (Request::is('faqs') ? 'class=active' : '') }}}><a href="/faqs">Faqs</a></li>
            <li  {{{ (Request::is('contact') ? 'class=active' : '') }}}><a href="/contact">Contact</a></li>
        </ul>
    </nav>
</header>