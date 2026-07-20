<?php

namespace Berrycrawl\Types;

enum ScrapeDtoFormatsItemZero: string
{
    case Markdown = "markdown";
    case Html = "html";
    case Rawhtml = "rawhtml";
    case Links = "links";
    case Images = "images";
    case Summary = "summary";
    case Json = "json";
    case ChangeTracking = "changeTracking";
}
