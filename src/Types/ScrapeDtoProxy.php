<?php

namespace Berrycrawl\Types;

enum ScrapeDtoProxy: string
{
    case None = "none";
    case Basic = "basic";
    case Datacenter = "datacenter";
    case Residential = "residential";
    case Stealth = "stealth";
    case Auto = "auto";
}
