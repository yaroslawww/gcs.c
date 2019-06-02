<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @stack('head_meta')

    <title>{{config('app.name')}}</title>
    <link rel="icon" href="{{url('/images/default/logo-icon.svg')}}" type="image/svg+xml">
    <link rel="icon" href="{{url('/images/default/logo-icon.png')}}" type="image/png">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Main Css -->
    <link href="{{mix('/css/app.css')}}" rel="stylesheet">

    @stack('head_scripts')
</head>
<body class="relative min-h-screen font-body @yield('body_class', 'bg-blue-600 ')" @yield('body_attr')>
@stack('after_body')
<div class="min-h-screen h-full w-full flex flex-col">

    @section('header')
        <nav class="nav-wrapper w-full flex items-center justify-between flex-wrap p-6 border-solid  border-0 md:border-b border-white">
            <div class="z-30 flex items-center flex-shrink-0 text-white mr-6">
                <a href="/" class="font-semibold text-xl tracking-tight transition
        text-gray-100 hover:text-gray-400 font-normal no-underline">
                    {{config('app.name')}}
                </a>
            </div>
            <div class="z-20 block bg-blue-600 absolute w-full h-full top-0 left-0 border-solid  border-0 border-b border-white md:hidden"></div>
            <div class="collapsed-menu bg-gray-200 md:bg-transparent flex flex-col-reverse py-3 p-6 md:p-0 md:flex md:flex-row md:flex-grow md:items-center md:w-auto md:relative">
                <div class="text-sm md:flex-grow">
                    <a href="/documentation/api"
                       class="header-menu__item md:mr-4">
                        {{trans('strings/menu-main.documentation')}}
                    </a>
                    <a href="/credits"
                       class="header-menu__item  md:mr-4">
                        {{trans('strings/menu-main.credits')}}
                    </a>
                    <a href="/limits"
                       class="header-menu__item ">
                        {{trans('strings/menu-main.limits')}}
                    </a>
                </div>
            </div>
            <div class="z-30 block ml-auto flex items-center w-auto">
                @if(\Illuminate\Support\Facades\Auth::check())

                @else
                    <a href="{{route('login')}}"
                       class="inline-block btn mr-4 md:mr-0 md:ml-4 font-bold">
                        <span class="hidden sm:inline">
                            {{trans('strings/menu-main.login')}}
                        </span>
                        <svg class="fill-current align-top h-3 w-3" version="1.1" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink"
                             x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000"
                             xml:space="preserve">
                            <g>
                                <g transform="translate(0.000000,511.000000) scale(0.100000,-0.100000)">
                                    <path d="M4638.9,4995.2c-557-73.3-1100.2-339.2-1515.1-735.8c-403.4-387.4-630.3-779.3-783.9-1345.5c-52.7-199.4-57.3-261.3-57.3-644.1c0-382.8,4.6-444.7,57.3-644.1c110-405.7,245.3-694.5,476.8-1006.3c112.3-149,403.4-442.4,547.8-552.4l77.9-57.3l-146.7-52.7c-676.2-245.3-1400.5-756.4-1879.6-1329.4C717-2206.8,322.8-3229.1,311.3-4246.8c-4.6-252.1,0-288.8,45.8-359.9c27.5-45.8,91.7-105.4,142.1-132.9l89.4-50.4l4435.3,4.6l4437.6,6.9l61.9,48.1c133,98.6,158.2,155.9,165,389.7c11.5,254.5-43.5,717.5-121.5,1033.8c-210.9,866.4-692.2,1698.5-1334,2299C7841.1-641.2,7291-283.6,6811.9-86.5l-240.7,98.6l98.6,77.9c183.4,144.4,495.1,474.5,609.7,646.4c563.9,834.3,634.9,1870.4,188,2755.2c-254.4,504.3-735.8,981-1246.9,1237.8c-169.6,84.8-433.2,174.2-653.3,224.6C5338,5004.4,4868.1,5027.3,4638.9,4995.2z M5209.7,4218.2c859.6-98.6,1554.1-726.6,1721.4-1556.4c48.1-233.8,36.7-692.2-22.9-907.7c-100.8-359.9-348.4-754.1-623.5-985.6c-419.5-357.6-990.2-536.4-1494.5-472.2c-816,103.1-1423.4,628-1666.4,1434.9c-55,181.1-61.9,245.3-61.9,527.2c0,259,9.2,355.3,50.4,504.3c231.5,855,951.2,1432.6,1836,1476.1C4980.4,4238.8,5097.4,4229.6,5209.7,4218.2z M5764.4-558.7C7403.3-900.2,8581.4-2195.3,8829-3923.6l13.8-87.1H5003.4c-3697.2,0-3837.1,2.3-3837.1,41.3c0,107.7,80.2,499.7,151.3,738.1c100.8,332.4,369,877.9,575.3,1169c199.4,279.6,600.5,678.5,877.9,877.9c233.8,165,724.3,421.8,951.3,495.1c492.8,160.4,834.3,210.9,1363.8,197.1C5397.6-499.1,5548.9-515.1,5764.4-558.7z"></path>
                                </g>
                            </g>
                        </svg>
                    </a>
                    <a href="{{route('register')}}"
                       class="inline-block btn mr-4 md:mr-0 md:ml-4 font-bold">
                            <span class="hidden sm:inline">
                                {{trans('strings/menu-main.register')}}
                            </span>
                        <svg class="fill-current align-top h-3 w-3" version="1.1" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1000 1000"
                             enable-background="new 0 0 1000 1000" xml:space="preserve">
                            <g>
                                <g transform="translate(0.000000,511.000000) scale(0.100000,-0.100000)">
                                    <path d="M4196.6,4941.7c-1004.2-136.3-1843.3-867.9-2127.8-1855.3c-277.3-951.6,55-2032.2,815.3-2668.2c98-81.3,172.1-148.2,169.8-150.6c-2.4-2.4-90.9-38.3-196.1-78.9c-528.4-210.4-987.4-521.2-1448.8-982.6c-272.6-272.6-389.7-411.2-545.1-643.1c-449.5-674.2-681.4-1350.8-745.9-2182.9c-26.3-329.9-26.3-356.2,19.1-439.9c55-110,176.9-176.9,313.2-176.9c119.5,0,205.6,40.6,301.2,141.1c64.6,66.9,71.7,90.8,88.5,329.9c62.2,774.6,251,1353.2,638.3,1943.8c186.5,282.1,688.6,781.8,982.6,977.8c404,267.8,863.1,459,1365.2,566.6c160.2,35.9,306,45.4,693.3,45.4c425.6,0,523.6-7.2,738.8-55c604.9-136.3,1162-406.4,1585.1-772.2l133.9-117.1l31.1,88.4c50.2,160.2,157.8,351.5,260.6,468.6L7369.2-507l-64.6,55c-318,255.8-719.6,490.1-1118.9,650.3l-186.5,76.5l129.1,100.4c370.6,284.5,688.6,743.6,836.8,1209.8c98,308.4,122,459.1,122,800.9s-23.9,492.5-122,800.9c-277.3,870.3-1013.7,1527.7-1924.6,1721.4C4827.8,4953.6,4404.6,4970.4,4196.6,4941.7z M5093.1,4131.2c124.3-40.7,275-102.8,334.7-136.3c549.9-320.4,884.6-855.9,925.3-1489.5c50.2-817.7-416-1551.7-1164.3-1831.4c-1095-411.2-2259.3,241.5-2474.5,1389.1c-184.1,970.7,451.9,1905.5,1446.5,2127.8c105.2,23.9,246.3,33.5,430.4,26.3C4823,4210.1,4904.3,4195.8,5093.1,4131.2z"></path>
                                    <path d="M7895.2-1080.8c-43-26.3-98-81.3-124.3-124.3c-43-74.1-47.8-121.9-47.8-681.4v-604.9h-609.6c-478.2,0-626.4-7.2-676.6-33.5c-155.4-81.3-260.6-272.6-222.4-408.8c33.5-124.3,110-217.6,224.7-272.6c95.6-47.8,143.5-50.2,693.4-50.2h590.5v-619.2c0-602.5,2.4-619.2,55-698.1c145.8-220,461.4-215.2,609.6,9.5l64.6,95.6l7.2,604.9l7.2,604.9l595.3,7.2c559.5,7.2,597.7,9.6,662.3,57.4c239.1,179.3,234.3,480.5-14.4,647.9c-78.9,52.6-98,55-662.2,55h-583.4v545.1c0,298.9-12,581-23.9,626.4C8378.2-1092.8,8086.5-966.1,7895.2-1080.8z"></path>
                                </g>
                            </g>
                        </svg>
                    </a>
                @endif
            </div>
            <div class="z-30 block md:hidden">
                <a class="btn-toggle">
                    <svg class="fill-current align-top h-3 w-3" viewBox="0 0 17 17" xmlns="http://www.w3.org/2000/svg">
                        <title>Menu</title>
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
                    </svg>
                </a>
            </div>
        </nav>
    @show

    <div id="app" class="flex-grow flex justify-center items-center">
        @section('content')
            <section class="w-full p-6 flex justify-center items-center">

                <span class="text-white uppercase font-bold">Content</span>

            </section>
        @show
    </div>


    @section('footer')
        <footer class="text-center text-gray-300 p-6 text-sm border-0 border-t border-solid border-white">
            {{trans('strings/footer.copyright', [
                'date' => '2019'.((date('Y') > 2019)?'-'.date('Y'):''),
                'company' => config('app.name')
            ])}}
        </footer>
    @show
</div>

<script>
    window.appTranslations = @json([]);
</script>
@stack('footer_scripts')
</body>
</html>
