<?php

namespace Berrycrawl\Types;

enum CrawlDtoSitemap: string
{
    case Include_ = "include";
    case Skip = "skip";
    case Only = "only";
}
