<?php

namespace Berrycrawl\Types;

enum ScreenshotDtoDevice: string
{
    case Desktop = "desktop";
    case DesktopHd = "desktop-hd";
    case Tablet = "tablet";
    case Iphone15 = "iphone-15";
    case Pixel8 = "pixel-8";
}
