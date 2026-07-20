<?php

namespace Berrycrawl\Types;

enum ScreenshotDtoFullPageAlgorithm: string
{
    case Auto = "auto";
    case Native = "native";
    case Stitch = "stitch";
}
