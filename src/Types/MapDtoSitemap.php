<?php

namespace Berrycrawl\Types;

enum MapDtoSitemap: string
{
    case Include_ = "include";
    case Skip = "skip";
    case Only = "only";
}
