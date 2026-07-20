<?php

namespace Berrycrawl\Types;

enum ScreenshotDtoWaitUntil: string
{
    case Domcontentloaded = "domcontentloaded";
    case Load = "load";
    case Networkidle = "networkidle";
}
