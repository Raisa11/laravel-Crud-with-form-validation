<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
   @include('front.includes.meta')

    @include('front.includes.link')
</head>
<body>

@include('front.includes.menu')
<!-- END nav -->
@yield('body')
@yield('case')
@yield('acnt')

@yield('ftco1')
@yield('acnt2')


@yield('ftco')

@yield('counter')
@yield('testimony')

@yield('faq')

@yield('blog')

@yield('priceser')

@include('front.includes.signup')
@yield('price')


@include('front.includes.footer')



@include('front.includes.load')

@include('front.includes.script')

</body>
</html>

