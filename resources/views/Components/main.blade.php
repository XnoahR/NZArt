<!DOCTYPE html>
<html lang="en">
<head>
  @include('Components.head')
</head>
<body class="dark:bg-gray-900">
    @include('Components.navbar')

    @yield('content')

    @include('Components.script')
</body>
</html>
