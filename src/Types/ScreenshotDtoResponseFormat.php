<?php

namespace Berrycrawl\Types;

enum ScreenshotDtoResponseFormat: string
{
    case Url = "url";
    case Base64 = "base64";
}
