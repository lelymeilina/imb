<!doctype html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><html lang="en" class="no-js"> <![endif]-->
<html lang="en">

@include('/layouts/front-header')

  <body>    
  <!-- Full Body Container -->
  <div id="container">
    @include('/layouts/front-menu')

    @yield('content')

    @include('/layouts/front-footer')

  </div>
  <!-- End Full Body Container -->

        <!-- Go To Top Link -->
    <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

    <div id="loader">
        <div class="spinner">
            <div class="dot1"></div>
            <div class="dot2"></div>
        </div>
    </div>

    <!-- Style Switcher -->
    <div class="switcher-box">
        <a href="#" class="open-switcher show-switcher"><i class="fa fa-cog fa-2x"></i></a>
        <h4>Style Switcher</h4>
        <span>12 Predefined Color Skins</span>
        <ul class="colors-list">
            <li>
                <a onClick="setActiveStyleSheet('blue'); return false;" title="Blue" class="blue"></a>
            </li>
            <li>
                <a onClick="setActiveStyleSheet('sky-blue'); return false;" title="Sky Blue" class="sky-blue"></a>
            </li>
            <li>
                <a onClick="setActiveStyleSheet('cyan'); return false;" title="Cyan" class="cyan"></a>
            </li>
            <li>
                <a onClick="setActiveStyleSheet('jade'); return false;" title="Jade" class="jade"></a>
            </li>
            <li>
                <a onClick="setActiveStyleSheet('green'); return false;" title="Green" class="green"></a>
            </li>
            <li>
                <a onClick="setActiveStyleSheet('purple'); return false;" title="Purple" class="purple"></a>
            </li>
            <li>
                <a onClick="setActiveStyleSheet('pink'); return false;" title="Pink" class="pink"></a>
            </li>
            <li>
                <a onClick="setActiveStyleSheet('red'); return false;" title="Red" class="red"></a>
            </li>
            <li>
                <a onClick="setActiveStyleSheet('orange'); return false;" title="Orange" class="orange"></a>
            </li>
            <li>
                <a onClick="setActiveStyleSheet('yellow'); return false;" title="Yellow" class="yellow"></a>
            </li>
            <li>
                <a onClick="setActiveStyleSheet('peach'); return false;" title="Peach" class="peach"></a>
            </li>
            <li>
                <a onClick="setActiveStyleSheet('beige'); return false;" title="Biege" class="beige"></a>
            </li>
        </ul>
        <span>Top Bar Color</span>
        <select id="topbar-style" class="topbar-style">
            <option value="1">Light (Default)</option>
            <option value="2">Dark</option>
            <option value="3">Color</option>
        </select>
        <span>Layout Style</span>
        <select id="layout-style" class="layout-style">
            <option value="1">Wide</option>
            <option value="2">Boxed</option>
        </select>
        <span>Patterns for Boxed Version</span>
        <ul class="bg-list">
            <li>
                <a href="#" class="bg1"></a>
            </li>
            <li>
                <a href="#" class="bg2"></a>
            </li>
            <li>
                <a href="#" class="bg3"></a>
            </li>
            <li>
                <a href="#" class="bg4"></a>
            </li>
            <li>
                <a href="#" class="bg5"></a>
            </li>
            <li>
                <a href="#" class="bg6"></a>
            </li>
            <li>
                <a href="#" class="bg7"></a>
            </li>
            <li>
                <a href="#" class="bg8"></a>
            </li>
            <li>
                <a href="#" class="bg9"></a>
            </li>
            <li>
                <a href="#" class="bg10"></a>
            </li>
            <li>
                <a href="#" class="bg11"></a>
            </li>
            <li>
                <a href="#" class="bg12"></a>
            </li>
            <li>
                <a href="#" class="bg13"></a>
            </li>
            <li>
                <a href="#" class="bg14"></a>
            </li>
        </ul>
    </div>
  </body>

</html>