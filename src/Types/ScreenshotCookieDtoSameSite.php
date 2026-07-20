<?php

namespace Berrycrawl\Types;

enum ScreenshotCookieDtoSameSite: string
{
    case Strict = "Strict";
    case Lax = "Lax";
    case None = "None";
}
