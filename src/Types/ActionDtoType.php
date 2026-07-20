<?php

namespace Berrycrawl\Types;

enum ActionDtoType: string
{
    case Wait = "wait";
    case Click = "click";
    case Write = "write";
    case Press = "press";
    case Scroll = "scroll";
    case Scrape = "scrape";
    case Screenshot = "screenshot";
    case Pdf = "pdf";
}
